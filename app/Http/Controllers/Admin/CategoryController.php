<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view category')->only('index');
        $this->middleware('permission:create category')->only(['create', 'store']);
        $this->middleware('permission:edit category')->only(['edit', 'update']);
        $this->middleware('permission:delete category')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::latest()->get();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

         if($image){
            $data['image'] = $image;
        }
        Category::create($data);
        return redirect()->route('admin.category.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = Category::findOrFail($id);
        return view('admin.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::findOrFail($id);
         $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        
        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $input =$request->all();

         if($image){
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.category.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
         if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}