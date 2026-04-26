<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\MyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyChooseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view mychoose-us')->only('index');
        $this->middleware('permission:create mychoose-us')->only(['create', 'store']);
        $this->middleware('permission:edit mychoose-us')->only(['edit', 'update']);
        $this->middleware('permission:delete mychoose-us')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = MyChoose::latest()->get();
        return view('admin.my-choose.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.my-choose.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        
        $icon = $request->hasFile('icon') ? ImageHelper::uploadImage($request->file('icon')) : null;

         if($icon){
            $data['icon'] = $icon;
        }
    
        MyChoose::create($data);
        return redirect()->route('admin.service.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MyChoose::findOrFail($id);
        return view('admin.my-choose.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = MyChoose::findOrFail($id);
        return view('admin.my-choose.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = MyChoose::findOrFail($id);
          
        $icon = $request->hasFile('icon') ? ImageHelper::uploadImage($request->file('icon')) : null;
        
        if ($request->hasFile('icon') && $data->icon) {
            Storage::disk('public')->delete($data->icon);
        }
        
        $input =$request->all();
        
        if($icon){
            $input['icon'] = $icon;
        }

        $data->update($input);
        return redirect()->route('admin.service.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = MyChoose::findOrFail($id);
        
         if ($data->icon) {
            Storage::disk('public')->delete($data->icon);
        }
       
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}