<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index','store']]);
        $this->middleware('permission:gallery-create', ['only' => ['create','store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $galleries = Gallery::orderBy('id','DESC')->paginate(10);
        return view('modules.admin.pages.gallery.index', compact('galleries'));
    }


    public function show($id){
        $gallery = Gallery::findOrFail($id);
        return view('modules.admin.pages.gallery.show', compact('gallery'));
    }

    public function create(){
        return view('modules.admin.pages.gallery.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $gallery = new Gallery();
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        if(!file_exists('uploads/gallery')){
            mkdir('uploads/gallery', 0777, true);
        }
        $image = $request->image;
        $randomString = uniqid();
        $filepath = 'uploads/gallery/';
        $fileName = $randomString .$image->getClientOriginalName();
        $image->move($filepath, $fileName);
        $gallery->image_path = $filepath . $fileName;
        $gallery->save();
        return redirect()->route('gallery.index')
            ->with('success','Gallery Item created successfully');
    }

    public function edit($id){
        $gallery = Gallery::findOrFail($id);
        return view('modules.admin.pages.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $gallery = Gallery::findOrFail($id);
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $image = $request->image;
        if($image){
            unlink($gallery->image_path);
            if(!file_exists('uploads/gallery')){
                mkdir('uploads/gallery', 0777, true);
            }

            $randomString = uniqid();
            $filepath = 'uploads/gallery/';
            $fileName = $randomString .$image->getClientOriginalName();
            $image->move($filepath, $fileName);
            $gallery->image_path = $filepath . $fileName;
        }
        $gallery->update();
        return redirect()->route('gallery.index')
            ->with('success','Gallery Item updated successfully');
    }

    public function destroy($id){
        $gallery = Gallery::findOrFail($id);
        unlink($gallery->image_path);
        $gallery->delete();
        return redirect()->route('gallery.index')
            ->with('success','Gallery Item deleted successfully');
    }

}
