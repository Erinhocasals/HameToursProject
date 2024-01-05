<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Menu;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class BlogController extends Controller
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
            $blog = Blog::where('title', 'LIKE', "%$keyword%")
                ->orWhere('summary', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('friendly', 'LIKE', "%$keyword%")
                ->orWhere('author', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $blog = Blog::latest()->paginate($perPage);
        }

        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.blog.create', compact('menus'));
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
			'image' => 'required',
			// 'friendly' => 'required'
		]);

        $requestData = $request->all();
        $blog = Blog::create($requestData);

        if ($requestData['menu_id']) {
            (new MenuLink())->setLink($requestData['menu_id'], Blog::class, $blog->id, route('front.blog', ['friendly' => $blog->friendly]));
        }

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Blog::class, $blog->id);
        }

        return redirect('admin/blog/' . $blog->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $blog = Blog::findOrFail($id);

        return view('admin.blog.show', compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $menus = Menu::all();

        return view('admin.blog.edit', compact('blog', 'menus'));
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
			// 'image' => 'required',
			// 'friendly' => 'required'
		]);

        $requestData = $request->all();
        $blog = Blog::findOrFail($id);

        if ($requestData['menu_id']) {
            if ($blog->menu) {
                $blog->menu->setLink($requestData['menu_id'], Blog::class, $blog->id, route('front.blog', ['friendly' => $blog->friendly]));
            }
            else {
                (new MenuLink())->setLink($requestData['menu_id'], Blog::class, $blog->id, route('front.blog', ['friendly' => $blog->friendly]));
            }
        }

        $blog->update($requestData);

        if ($request->hasFile('image')) {
            if ($blog->image && isset($blog->image->url)) {
                $blog->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Blog::class, $blog->id);
        }

        return redirect('admin/blog/' . $blog->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $blog = Blog::findOrFail($id);

        if ($blog->image)
            $blog->image->deleteImage(true);

        Blog::destroy($id);

        return redirect('admin/infos')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
