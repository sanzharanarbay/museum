<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ItemController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:item-list|item-create|item-edit|item-delete', ['only' => ['index','store']]);
        $this->middleware('permission:item-create', ['only' => ['create','store']]);
        $this->middleware('permission:item-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:item-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $items = Item::with('category')->paginate(10);
        return view('modules.admin.pages.items.index', compact('items'));
    }


    public function show($id){
        $item = Item::with('category')->findOrFail($id);
        return view('modules.admin.pages.items.show', compact('item'));
    }

    public function create(){
     $categories = Category::pluck('name','id')->all();
     return view('modules.admin.pages.items.create', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'price'=>'required|integer',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        if(!file_exists('uploads/items')){
            mkdir('uploads/items', 0777, true);
        }
        $image = $request->image;
        $randomString = uniqid();
        $filepath = 'uploads/items/';
        $fileName = $randomString .$image->getClientOriginalName();
        $image->move($filepath, $fileName);
        $item->image = $filepath . $fileName;
        $item->save();
        return redirect()->route('items.index')
            ->with('success','Item created successfully');
    }

    public function edit($id){
        $categories = Category::pluck('name','id')->all();
        $item = Item::with('category')->findOrFail($id);
        return view('modules.admin.pages.items.edit', compact('item','categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'price'=>'required|integer',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $image = $request->image;
        if($image){
            unlink($item->image);
            if(!file_exists('uploads/items')){
                mkdir('uploads/items', 0777, true);
            }

            $randomString = uniqid();
            $filepath = 'uploads/items/';
            $fileName = $randomString .$image->getClientOriginalName();
            $image->move($filepath, $fileName);
            $item->image = $filepath . $fileName;
        }
        $item->update();
        return redirect()->route('items.index')
            ->with('success','Item created successfully');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        unlink($item->image);
        $item->delete();
        return redirect()->route('items.index')
            ->with('success','Item deleted successfully');
    }
}
