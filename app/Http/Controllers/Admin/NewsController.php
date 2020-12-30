<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','store']]);
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $news = News::with('user')->paginate(10);
        return view('modules.admin.pages.news.index', compact('news'));
    }


    public function show($id){
        $news = News::with('user')->findOrFail($id);
        return view('modules.admin.pages.news.show', compact('news'));
    }

    public function create(){
        return view('modules.admin.pages.news.create');
    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->description;
        $news->created_by = Auth::id();
        if(!file_exists('uploads/news')){
            mkdir('uploads/news', 0777, true);
        }
        $image = $request->image;
        $randomString = uniqid();
        $filepath = 'uploads/news/';
        $fileName = $randomString .$image->getClientOriginalName();
        $image->move($filepath, $fileName);
        $news->image_path = $filepath . $fileName;
        $news->save();
        return redirect()->route('news.index')
            ->with('success','News created successfully');
    }

    public function edit($id){
        $news = News::with('user')->findOrFail($id);
        return view('modules.admin.pages.news.edit', compact('news'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:20480',
        ]);
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->description;
        $news->created_by = Auth::id();
        $image = $request->image;
        if($image){
            unlink($news->image_path);
            if(!file_exists('uploads/news')){
                mkdir('uploads/news', 0777, true);
            }

            $randomString = uniqid();
            $filepath = 'uploads/news/';
            $fileName = $randomString .$image->getClientOriginalName();
            $image->move($filepath, $fileName);
            $news->image_path = $filepath . $fileName;
        }
        $news->update();
        return redirect()->route('news.index')
            ->with('success','News updated successfully');
    }

    public function destroy($id){
        $news = News::findOrFail($id);
        unlink($news->image_path);
        $news->delete();
        return redirect()->route('news.index')
            ->with('success','News deleted successfully');
    }


}
