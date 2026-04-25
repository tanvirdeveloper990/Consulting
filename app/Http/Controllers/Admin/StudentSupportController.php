<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\StudentSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentSupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view student-support')->only('index');
        $this->middleware('permission:create student-support')->only(['create', 'store']);
        $this->middleware('permission:edit student-support')->only(['edit', 'update']);
        $this->middleware('permission:delete student-support')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentSupport::first();
        return view('admin.student-support.index',compact('data'));
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
        $data = StudentSupport::findOrFail($id);
        $personalized_icon = $request->hasFile('personalized_icon') ? ImageHelper::uploadImage($request->file('personalized_icon')) : null;
        $personalized_image = $request->hasFile('personalized_image') ? ImageHelper::uploadImage($request->file('personalized_image')) : null;

        $university_icon = $request->hasFile('university_icon') ? ImageHelper::uploadImage($request->file('university_icon')) : null;
        $university_image = $request->hasFile('university_image') ? ImageHelper::uploadImage($request->file('university_image')) : null;

        $admission_icon = $request->hasFile('admission_icon') ? ImageHelper::uploadImage($request->file('admission_icon')) : null;
        $admission_image = $request->hasFile('admission_image') ? ImageHelper::uploadImage($request->file('admission_image')) : null;
        
        $admission_icon1 = $request->hasFile('admission_icon1') ? ImageHelper::uploadImage($request->file('admission_icon1')) : null;
        $admission_image1 = $request->hasFile('admission_image1') ? ImageHelper::uploadImage($request->file('admission_image1')) : null;

        $financial_icon = $request->hasFile('financial_icon') ? ImageHelper::uploadImage($request->file('financial_icon')) : null;
        $financial_image = $request->hasFile('financial_image') ? ImageHelper::uploadImage($request->file('financial_image')) : null;

        $visa_icon = $request->hasFile('visa_icon') ? ImageHelper::uploadImage($request->file('visa_icon')) : null;
        $visa_image = $request->hasFile('visa_image') ? ImageHelper::uploadImage($request->file('visa_image')) : null;
        
        if ($request->hasFile('personalized_icon') && $data->personalized_icon) {
            Storage::disk('public')->delete($data->personalized_icon);
        }
        if ($request->hasFile('personalized_image') && $data->personalized_image) {
            Storage::disk('public')->delete($data->personalized_image);
        }

        if ($request->hasFile('university_icon') && $data->university_icon) {
            Storage::disk('public')->delete($data->university_icon);
        }
        if ($request->hasFile('university_image') && $data->university_image) {
            Storage::disk('public')->delete($data->university_image);
        }

        if ($request->hasFile('admission_icon') && $data->admission_icon) {
            Storage::disk('public')->delete($data->admission_icon);
        }
        if ($request->hasFile('admission_image') && $data->admission_image) {
            Storage::disk('public')->delete($data->admission_image);
        }
        
        if ($request->hasFile('admission_icon1') && $data->admission_icon1) {
            Storage::disk('public')->delete($data->admission_icon1);
        }
        if ($request->hasFile('admission_image') && $data->admission_image) {
            Storage::disk('public')->delete($data->admission_image);
        }

        if ($request->hasFile('financial_icon') && $data->financial_icon) {
            Storage::disk('public')->delete($data->financial_icon);
        }
        if ($request->hasFile('financial_image') && $data->financial_image) {
            Storage::disk('public')->delete($data->financial_image);
        }

        if ($request->hasFile('visa_icon') && $data->visa_icon) {
            Storage::disk('public')->delete($data->visa_icon);
        }
        if ($request->hasFile('visa_image') && $data->visa_image) {
            Storage::disk('public')->delete($data->visa_image);
        }

       

        $input =$request->all();

        if($personalized_icon){
            $input['personalized_icon'] = $personalized_icon;
        }
        if($personalized_image){
            $input['personalized_image'] = $personalized_image;
        }

        if($university_icon){
            $input['university_icon'] = $university_icon;
        }
        if($university_image){
            $input['university_image'] = $university_image;
        }
      

        if($admission_icon){
            $input['admission_icon'] = $admission_icon;
        }
        if($admission_image){
            $input['admission_image'] = $admission_image;
        }
        

        if($admission_icon1){
            $input['admission_icon1'] = $admission_icon1;
        }
        if($admission_image1){
            $input['admission_image1'] = $admission_image1;
        }

        if($financial_icon){
            $input['financial_icon'] = $financial_icon;
        }
        if($financial_image){
            $input['financial_image'] = $financial_image;
        }

        if($visa_icon){
            $input['visa_icon'] = $visa_icon;
        }
        if($visa_image){
            $input['visa_image'] = $visa_image;
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
