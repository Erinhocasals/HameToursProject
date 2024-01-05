<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Status;
use App\Models\UserEditableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $status = Status::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $status = Status::where('title', 'LIKE', "%$keyword%");
            }
            $status->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->orWhere('color', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $status = Status::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->paginate($perPage);
            }
            else {
                $status = Status::latest()->paginate($perPage);
            }
        }

        return view('admin.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $definitions = Category::all();
        }

        return view('admin.status.create', compact('definitions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $count = Status::all()->count();
        $requestData['status'] = $count;

        $status = Status::create($requestData);

        $this->syncEditorsWithMe($status);

        if (!isset($requestData['definitions_id']))
            $requestData['definitions_id'] = array();

        $status->definitions()->sync($requestData['definitions_id']);

        return redirect('admin/status/' . $status->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $status = Status::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$status->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        return view('admin.status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$status->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $definitions = Category::all();
        }

        return view('admin.status.edit', compact('status', 'definitions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $status = Status::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$status->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        $status->update($requestData);

        $this->syncEditorsWithMe($status);

        if (!isset($requestData['definitions_id']))
            $requestData['definitions_id'] = array();

        if (isset($requestData['definitions_id']))
            $status->definitions()->sync($requestData['definitions_id']);

        return redirect('admin/status/' . $status->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$status->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if ($status->editors)
            $status->editors()->delete();

        Status::destroy($id);

        return redirect('admin/status')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($status) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $status->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $status->id;
            $content->editable_type = 'App\\Models\\Status';
            $content->save();
        }
    }
}
