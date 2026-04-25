<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\TopStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopStudyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view top-study')->only('index');
        $this->middleware('permission:create top-study')->only(['create', 'store']);
        $this->middleware('permission:edit top-study')->only(['edit', 'update']);
        $this->middleware('permission:delete top-study')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = TopStudy::latest()->get();
        return view('admin.top-study.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.top-study.create');
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
        TopStudy::create($data);
        return redirect()->route('admin.top-study.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TopStudy::findOrFail($id);
        return view('admin.top-study.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = TopStudy::findOrFail($id);
        return view('admin.top-study.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TopStudy::findOrFail($id);
         $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        
        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $input =$request->all();

         if($image){
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.top-study.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TopStudy::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
