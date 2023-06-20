<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('admin.categories.create');
    }

    public function edit() {

    }

    public function destroy(Category $category) {

        $post = Post::find($category->id);
        $post->delete();
        $category->delete();
        //$post = Post::find($cat[$category->id]);
       // $post->categories()->sync($attributes['cat']);

        return back()->with('success', 'Kategorija obrisana');
    }

    public function request()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('admin.categories.request');
    }
   /* public function store()
    {
        $attributes = $this->validateCategory();

       //$attributes['name'] = $attributes['slug'];

        Category::create($attributes);

        return view('admin.categories.index');
    }
*/

    protected function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();
        return request()->validate([
            'name' => 'required',
        ]);
    }
}
