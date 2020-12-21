<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('modules.admin.pages.categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('modules.admin.pages.categories.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success','Category created successfully.');
    }


    public function show(Category $category)
    {
        return view('modules.admin.pages.categories.show',compact('category'));
    }


    public function edit(Category $category)
    {
        return view('modules.admin.pages.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success','Category updated successfully');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success','Category deleted successfully');
    }


}
