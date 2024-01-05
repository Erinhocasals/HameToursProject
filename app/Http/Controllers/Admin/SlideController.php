<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Entity;
use App\Models\Image;
use App\Models\Package;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
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
            $slide = Slide::where('title', 'LIKE', "%$keyword%")
                ->orWhere('subtitle', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('slideable_id', 'LIKE', "%$keyword%")
                ->orWhere('slideable_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $slide = Slide::latest()->paginate($perPage);
        }

        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $definitions = Category::all();
        $entities = Entity::all();
        $packages = Package::all();

        return view('admin.slide.create', compact('definitions', 'entities', 'packages'));
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
			// 'title' => 'required|max:256',
			'enabled' => 'required'
		]);

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $linkable = $requestData['elements_id'];
        if ($linkable && $linkable != -1) {
            $data = explode('-', $linkable);

            if ($data[0] == 'def') {
                $requestData['slideable_type'] = 'App\\Models\\Category';
            }
            elseif ($data[0] == 'ent') {
                $requestData['slideable_type'] = 'App\\Models\\Entity';
            }
            elseif ($data[0] == 'pkg') {
                $requestData['slideable_type'] = 'App\\Models\\Package';
            }

            $requestData['slideable_id'] = $data[1];
        }

        $slide = Slide::create($requestData);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Slide::class, $slide->id);
        }

        return redirect('admin/slide/' . $slide->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $slide = Slide::findOrFail($id);

        return view('admin.slide.show', compact('slide'));
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
        $slide = Slide::findOrFail($id);

        $definitions = Category::all();
        $entities = Entity::all();
        $packages = Package::all();

        return view('admin.slide.edit', compact('slide', 'definitions', 'entities', 'packages'));
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
			// 'title' => 'required|max:256',
			'enabled' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $slide = Slide::findOrFail($id);

        $linkable = $requestData['elements_id'];
        if (isset($linkable) && $linkable != -1) {
            $data = explode('-', $linkable);

            if ($data[0] == 'def') {
                $requestData['slideable_type'] = 'App\\Models\\Category';
            }
            elseif ($data[0] == 'ent') {
                $requestData['slideable_type'] = 'App\\Models\\Entity';
            }
            elseif ($data[0] == 'pkg') {
                $requestData['slideable_type'] = 'App\\Models\\Package';
            }

            $requestData['slideable_id'] = $data[1];
        }

        $slide->update($requestData);

        if ($request->hasFile('image')) {
            if ($slide->image) {
                $slide->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Slide::class, $slide->id);
        }

        return redirect('admin/slide/' . $slide->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $slide = Slide::findOrFail($id);

        if ($slide->image)
            $slide->image->deleteImage(true);

        Slide::destroy($id);

        return redirect('admin/slide')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
