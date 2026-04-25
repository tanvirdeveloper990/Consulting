<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view blog')->only('index');
        $this->middleware('permission:create blog')->only(['create', 'store']);
        $this->middleware('permission:edit blog')->only(['edit', 'update']);
        $this->middleware('permission:delete blog')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::latest()->get();
        return view('admin.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::where('status', 1)->get();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $thumbnail_one = $request->hasFile('thumbnail_one') ? ImageHelper::uploadImage($request->file('thumbnail_one')) : null;
        $thumbnail_two = $request->hasFile('thumbnail_two') ? ImageHelper::uploadImage($request->file('thumbnail_two')) : null;

         if($thumbnail_one){
            $data['thumbnail_one'] = $thumbnail_one;
        }
         if($thumbnail_two){
            $data['thumbnail_two'] = $thumbnail_two;
        }
        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = Blog::findOrFail($id);
        $categories =Category::where('status', 1)->get();
        return view('admin.blogs.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Blog::findOrFail($id);
        
        $thumbnail_one = $request->hasFile('thumbnail_one') ? ImageHelper::uploadImage($request->file('thumbnail_one')) : null;
        $thumbnail_two = $request->hasFile('thumbnail_two') ? ImageHelper::uploadImage($request->file('thumbnail_two')) : null;
        
        if ($request->hasFile('thumbnail_one') && $data->thumbnail_one) {
            Storage::disk('public')->delete($data->thumbnail_one);
        }
        
        if ($request->hasFile('thumbnail_two') && $data->thumbnail_two) {
            Storage::disk('public')->delete($data->thumbnail_two);
        }

        $input =$request->all();

         if($thumbnail_one){
            $input['thumbnail_one'] = $thumbnail_one;
        }
         if($thumbnail_two){
            $input['thumbnail_two'] = $thumbnail_two;
        }
        $data->update($input);
        return redirect()->route('admin.blogs.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Blog::findOrFail($id);
         if ($data->thumbnail_one) {
            Storage::disk('public')->delete($data->thumbnail_one);
        }
         if ($data->thumbnail_two) {
            Storage::disk('public')->delete($data->thumbnail_two);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
