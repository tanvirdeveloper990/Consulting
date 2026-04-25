<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Country;
use App\Models\TopRated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopRatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TopRated::latest()->get();
        return view('admin.top-university.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries= Country::where('status',1)->get();
        return view('admin.top-university.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $flag = $request->hasFile('flag') ? ImageHelper::uploadImage($request->file('flag')) : null;
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if ($flag) {
            $data['flag'] = $flag;
        }

        if ($image) {
            $data['image'] = $image;
        }
        TopRated::create($data);
        return redirect()->route('admin.top-university.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TopRated::findOrFail($id);
        return view('admin.top-university.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = TopRated::findOrFail($id);
        $countries= Country::where('status',1)->get();
        return view('admin.top-university.edit', compact('data','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TopRated::findOrFail($id);
        $flag = $request->hasFile('flag') ? ImageHelper::uploadImage($request->file('flag')) : null;
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }
        if ($request->hasFile('flag') && $data->flag) {
            Storage::disk('public')->delete($data->flag);
        }

        $input = $request->all();

        if ($flag) {
            $input['flag'] = $flag;
        }
        if ($image) {
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.top-university.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TopRated::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        if ($data->flag) {
            Storage::disk('public')->delete($data->flag);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
