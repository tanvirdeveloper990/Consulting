<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:view teams')->only('index');
        $this->middleware('permission:create teams')->only(['create', 'store']);
        $this->middleware('permission:edit teams')->only(['edit', 'update']);
        $this->middleware('permission:delete teams')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $data = Team::latest()->get();
        return view('admin.teams.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        
        $file = $request->hasFile('file') ? ImageHelper::uploadImage($request->file('file')) : null;

         if($file){
            $data['file'] = $file;
        }
    
        Team::create($data);
        return redirect()->route('admin.teams.index')->with('success', 'Data Store Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $team = Team::findOrFail($id);
        return view('admin.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Team::findOrFail($id);
          
        $file = $request->hasFile('file') ? ImageHelper::uploadImage($request->file('file')) : null;
        
        if ($request->hasFile('file') && $data->file) {
            Storage::disk('public')->delete($data->file);
        }
        
        $input =$request->all();
        
        if($file){
            $input['file'] = $file;
        }

        $data->update($input);
        return redirect()->route('admin.teams.index')->with('success', 'Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Team::findOrFail($id);
        
         if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
       
        $data->delete();
         return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}