<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Entity;
use App\Models\Experience;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperiencesController extends Controller
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
            $experiences = Experience::where('title', 'LIKE', "%$keyword%")
                ->orWhere('summary', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('friendly', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $experiences = Experience::latest()->paginate($perPage);
        }

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $entities = Auth::user()->ownedEntities();
        }
        else {
            $entities = Entity::all();
        }

        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path();
        array_unshift($links, $currentLink);
        session(['links' => $links]);

        return view('admin.experiences.create', compact('entities'));
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
        $this->validate($request, [
			'title' => 'required|max:256',
			'enabled' => 'required',
			'image' => 'required'
		]);

        $requestData = $request->all();
        $experience = Experience::create($requestData);
        $experience->entities()->sync($requestData['entities_id']);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Experience::class, $experience->id);
        }

        return redirect(strval(session(('links')[1])));
        //return redirect('admin/experiences/' . $experience->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $experience = Experience::findOrFail($id);

        return view('admin.experiences.show', compact('experience'));
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
        $experience = Experience::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $entities = Auth::user()->ownedEntities();
        }
        else {
            $entities = Entity::all();
        }

        return view('admin.experiences.edit', compact('experience', 'entities'));
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
        $this->validate($request, [
			'title' => 'required|max:256',
			'enabled' => 'required',
		]);

        $requestData = $request->all();

        $experience = Experience::findOrFail($id);
        $experience->update($requestData);
        $experience->entities()->sync($requestData['entities_id']);

        if ($request->hasFile('image')) {
            if ($experience->image) {
                $experience->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Experience::class, $experience->id);
        }

        return redirect('admin/experiences/' . $experience->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $experience = Experience::findOrFail($id);

        if ($experience->image)
            $experience->image->deleteImage(true);

        Experience::destroy($id);

        return redirect()->back()->with('success', 'Se ha eliminado el elemento exitosamente!');
        //return redirect('admin/experiences')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
