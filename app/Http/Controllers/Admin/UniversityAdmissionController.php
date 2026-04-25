<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\UniversityAdmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityAdmissionController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:view university-admission')->only('index');
        $this->middleware('permission:create university-admission')->only(['create', 'store']);
        $this->middleware('permission:edit university-admission')->only(['edit', 'update']);
        $this->middleware('permission:delete university-admission')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = UniversityAdmission::latest()->get();
        return view('admin.university-admission.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.university-admission.create');
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
    
        UniversityAdmission::create($data);
        return redirect()->route('admin.university-admission.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = UniversityAdmission::findOrFail($id);
        return view('admin.university-admission.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = UniversityAdmission::findOrFail($id);
        return view('admin.university-admission.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = UniversityAdmission::findOrFail($id);
          
        $icon = $request->hasFile('icon') ? ImageHelper::uploadImage($request->file('icon')) : null;
        
        if ($request->hasFile('icon') && $data->icon) {
            Storage::disk('public')->delete($data->icon);
        }
        
        $input =$request->all();
        
        if($icon){
            $input['icon'] = $icon;
        }

        $data->update($input);
        return redirect()->route('admin.university-admission.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UniversityAdmission::findOrFail($id);
        
         if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
       
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}