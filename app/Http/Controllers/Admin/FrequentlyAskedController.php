<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyAsked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrequentlyAskedController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view frequently')->only('index');
        $this->middleware('permission:create frequently')->only(['create', 'store']);
        $this->middleware('permission:edit frequently')->only(['edit', 'update']);
        $this->middleware('permission:delete frequently')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FrequentlyAsked::latest()->get();
        return view('admin.freequently.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.freequently.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
    
        FrequentlyAsked::create($data);
        return redirect()->route('admin.frequently-asked.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = FrequentlyAsked::findOrFail($id);
        return view('admin.freequently.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $data = FrequentlyAsked::findOrFail($id);
        return view('admin.freequently.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = FrequentlyAsked::findOrFail($id);
        $input =$request->all();

        $data->update($input);
        return redirect()->route('admin.frequently-asked.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = FrequentlyAsked::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
