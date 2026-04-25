<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:view career')->only('index');
        $this->middleware('permission:create career')->only(['create', 'store']);
        $this->middleware('permission:edit career')->only(['edit', 'update']);
        $this->middleware('permission:delete career')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $career = Career::first();
        return view('admin.career.index',compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Career::findOrFail($id);
          
        $box1_icon = $request->hasFile('box1_icon') ? ImageHelper::uploadImage($request->file('box1_icon')) : null;
        $box2_icon = $request->hasFile('box2_icon') ? ImageHelper::uploadImage($request->file('box2_icon')) : null;
        $box3_icon = $request->hasFile('box3_icon') ? ImageHelper::uploadImage($request->file('box3_icon')) : null;
        $box4_icon = $request->hasFile('box4_icon') ? ImageHelper::uploadImage($request->file('box4_icon')) : null;
        $box5_icon = $request->hasFile('box5_icon') ? ImageHelper::uploadImage($request->file('box5_icon')) : null;
        $box6_icon = $request->hasFile('box6_icon') ? ImageHelper::uploadImage($request->file('box6_icon')) : null;
        
        if ($request->hasFile('box1_icon') && $data->box1_icon) {
            Storage::disk('public')->delete($data->box1_icon);
        }
        if ($request->hasFile('box2_icon') && $data->box2_icon) {
            Storage::disk('public')->delete($data->box2_icon);
        }
        if ($request->hasFile('box3_icon') && $data->box3_icon) {
            Storage::disk('public')->delete($data->box3_icon);
        }
        if ($request->hasFile('box4_icon') && $data->box4_icon) {
            Storage::disk('public')->delete($data->box4_icon);
        }
        if ($request->hasFile('box5_icon') && $data->box5_icon) {
            Storage::disk('public')->delete($data->box5_icon);
        }
        if ($request->hasFile('box6_icon') && $data->box6_icon) {
            Storage::disk('public')->delete($data->box6_icon);
        }
        
        $input =$request->all();
        
        if($box1_icon){
            $input['box1_icon'] = $box1_icon;
        }
        if($box2_icon){
            $input['box2_icon'] = $box2_icon;
        }
        if($box3_icon){
            $input['box3_icon'] = $box3_icon;
        }
        if($box4_icon){
            $input['box4_icon'] = $box4_icon;
        }
        if($box5_icon){
            $input['box5_icon'] = $box5_icon;
        }
        if($box6_icon){
            $input['box6_icon'] = $box6_icon;
        }

        $data->update($input);
        return redirect()->back()->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}