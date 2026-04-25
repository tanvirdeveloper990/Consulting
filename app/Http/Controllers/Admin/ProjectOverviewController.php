<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectOverviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view project-overview')->only('index');
        $this->middleware('permission:create project-overview')->only(['create', 'store']);
        $this->middleware('permission:edit project-overview')->only(['edit', 'update']);
        $this->middleware('permission:delete project-overview')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProjectOverview::first();
        return view('admin.project-overview.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ProjectOverview::findOrFail($id);

        $service_support_image = $request->hasFile('service_support_image') ? ImageHelper::uploadImage($request->file('service_support_image')) : null;
        
        if ($request->hasFile('service_support_image') && $data->service_support_image) {
            Storage::disk('public')->delete($data->service_support_image);
        }
       
        $input =$request->all();
        if($service_support_image){
            $input['service_support_image'] = $service_support_image;
        }

        $data->update($input);
        return redirect()->back( )->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
