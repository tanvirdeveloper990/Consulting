<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Study;
use App\Models\StudyItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = StudyItem::latest()->get();
        return view('admin.study-item.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $study= study::where('status',1)->get();
        return view('admin.study-item.create',compact('study'));
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
        StudyItem::create($data);
        return redirect()->route('admin.study-item.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StudyItem::findOrFail($id);
        return view('admin.study-item.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = StudyItem::findOrFail($id);
        $study= Study::where('status',1)->get();
        return view('admin.study-item.edit',compact('data','study'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StudyItem::findOrFail($id);
         $icon = $request->hasFile('icon') ? ImageHelper::uploadImage($request->file('icon')) : null;
        
        if ($request->hasFile('icon') && $data->icon) {
            Storage::disk('public')->delete($data->icon);
        }

        $input =$request->all();

         if($icon){
            $input['icon'] = $icon;
        }
        $data->update($input);
        return redirect()->route('admin.study-item.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StudyItem::findOrFail($id);
        if ($data->icon) {
            Storage::disk('public')->delete($data->icon);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
