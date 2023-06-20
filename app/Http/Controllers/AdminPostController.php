<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {

        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('admin.posts.create');
    }

    public function getCategoryParent(Request $request){


    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes = $this->validatePost();
        $attributes['category_id'] = $attributes['cat'][0];
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');


        /*$attributes = array_merge($this->validatePost(), [
            'user_id' => request()->user()->id
        ]);*/

        $categories = Category::all();
        $data = [];
        foreach($attributes['cat'] as $cat) {
            foreach ($categories as $parent) {
                if ($cat == $parent->id) {
                    if ($parent->parent_id != 0) {
                       // $arr = array($parent->parent_id);
                       if(!in_array((string)$parent->parent_id, $data, true)){
                            array_push($data, (string)$parent->parent_id);
                       }

                    }
                }
            }
        }

        $categoriesArray = array_merge($data, $attributes['cat']);
        $attributes['cat'] = $categoriesArray;
        Post::create($attributes);

        $itemId = DB::getPdo()->lastInsertId();
        $post = Post::find($itemId);
        $post->categories()->attach($categoriesArray);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {

        $attributes = $this->validatePost($post);
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post->update($attributes);

        $category = Post::find($post->id);
        $category->categories()->sync($attributes['cat']);


        return back()->with('success', 'Članak ažuriran');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Članak obrisan');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'cat' => 'required',
            'category_id' => [ Rule::exists('categories', 'id')]
        ]);
    }

}
