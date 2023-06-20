<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::all();

        return view('admin.categories.index',compact('categories','allCategories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'Uspešno dodata nova kategorija.');

    }
}
