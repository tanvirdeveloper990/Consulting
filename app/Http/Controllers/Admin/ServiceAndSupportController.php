<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\ServiceAndSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceAndSupportController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view service-support')->only('index');
        $this->middleware('permission:create service-support')->only(['create', 'store']);
        $this->middleware('permission:edit service-support')->only(['edit', 'update']);
        $this->middleware('permission:delete service-support')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $data = ServiceAndSupport::latest()->get();
        return view('admin.service-and-support.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-and-support.create');
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
        ServiceAndSupport::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ServiceAndSupport::findOrFail($id);
        return view('admin.service-and-support.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = ServiceAndSupport::findOrFail($id);
        return view('admin.service-and-support.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ServiceAndSupport::findOrFail($id);
         $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        
        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $input =$request->all();

         if($image){
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.services.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ServiceAndSupport::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
