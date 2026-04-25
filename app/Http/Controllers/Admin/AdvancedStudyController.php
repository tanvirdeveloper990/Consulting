<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AdvancedStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvancedStudyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view we-are')->only('index');
        $this->middleware('permission:create we-are')->only(['create', 'store']);
        $this->middleware('permission:edit we-are')->only(['edit', 'update']);
        $this->middleware('permission:delete we-are')->only('destroy');
    }

    public function index()
    {
        $data = AdvancedStudy::first();
        return view('admin.advanced-study.index',compact('data'));
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
        $data = AdvancedStudy::findOrFail($id);
        
        // Validation
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120', // 5MB max
                'application_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
                'experience_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
                'satisfied_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
                'university_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            ]);
    
    
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        $application_image = $request->hasFile('application_image') ? ImageHelper::uploadImage($request->file('application_image')) : null;
        $experience_image = $request->hasFile('experience_image') ? ImageHelper::uploadImage($request->file('experience_image')) : null;
        $satisfied_image = $request->hasFile('satisfied_image') ? ImageHelper::uploadImage($request->file('satisfied_image')) : null;
        $university_image = $request->hasFile('university_image') ? ImageHelper::uploadImage($request->file('university_image')) : null;
        
        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }
        if ($request->hasFile('application_image') && $data->application_image) {
            Storage::disk('public')->delete($data->application_image);
        }
        if ($request->hasFile('experience_image') && $data->experience_image) {
            Storage::disk('public')->delete($data->experience_image);
        }
        if ($request->hasFile('satisfied_image') && $data->satisfied_image) {
            Storage::disk('public')->delete($data->satisfied_image);
        }
        if ($request->hasFile('university_image') && $data->university_image) {
            Storage::disk('public')->delete($data->university_image);
        }

        $input =$request->all();

        if($image){
            $input['image'] = $image;
        }
        if($application_image){
            $input['application_image'] = $application_image;
        }
        if($experience_image){
            $input['experience_image'] = $experience_image;
        }
        if($satisfied_image){
            $input['satisfied_image'] = $satisfied_image;
        }
        if($university_image){
            $input['university_image'] = $university_image;
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
