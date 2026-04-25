<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Dompdf\FrameDecorator\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Pages::all();
        return view('admin.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        Pages::create($data);
        return redirect()->route('admin.pages.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pages::findOrFail($id);
        return view('admin.pages.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = Pages::findOrFail($id);
        return view('admin.pages.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pages::findOrFail($id);

        $input =$request->all();
        $data->update($input);
        return redirect()->route('admin.pages.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pages::findOrFail($id);
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
