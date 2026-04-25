<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::latest()->get();
        return view('admin.customers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if($image){
            $data['image']=$image;
        }
        $data['password'] = bcrypt('password');

        User::create($data);
        return redirect()->route('admin.customers.index')->with('success', 'Data created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.customers.show',compact('user'));
    }

    public function print($id)
    {
        $item = User::findOrFail($id);
        // Generate QR URL
        $url = route('license', $item->license_number);
        $setting = Setting::first();
        return view('admin.customers.print', compact('item','url','setting'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('admin.customers.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=User::findOrFail($id);

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if($request->hasFile('image') && $data->image){
            Storage::disk('public')->delete($data->image);
        }

        $input = $request->all();
        if($image){
            $input['image']=$image;
        }

        $data->update($input);
        return redirect()->route('admin.customers.index')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Data deleted successfully!');
    }
}
