<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:view category-gallery')->only('index');
        $this->middleware('permission:create category-gallery')->only(['create', 'store']);
        $this->middleware('permission:edit category-gallery')->only(['edit', 'update']);
        $this->middleware('permission:delete category-gallery')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = GalleryCategory::latest()->get();
        return view('admin.category-gallery.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        
        GalleryCategory::create($data);
        return redirect()->route('admin.category-gallery.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = GalleryCategory::findOrFail($id);
        return view('admin.category-gallery.edit',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $team = GalleryCategory::findOrFail($id);
        return view('admin.category-gallery.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = GalleryCategory::findOrFail($id);
  
        $input =$request->all();

        $data->update($input);
        return redirect()->route('admin.category-gallery.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = GalleryCategory::findOrFail($id);
       
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}