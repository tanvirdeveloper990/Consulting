<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view country')->only('index');
        $this->middleware('permission:create country')->only(['create', 'store']);
        $this->middleware('permission:edit country')->only(['edit', 'update']);
        $this->middleware('permission:delete country')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Country::latest()->get();
        return view('admin.country.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validated = $request->validate([
            'country' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'flag' => 'nullable',
            'thumbnail' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
           
        ]);

        // Flag upload
        if ($request->hasFile('flag')) {
            $validated['flag'] = ImageHelper::uploadImage($request->file('flag'));
        }
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = ImageHelper::uploadImage($request->file('thumbnail'));
        }

        Country::create($validated);

        return redirect()->route('admin.country.index')->with('success', 'Data Store Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Country::findOrFail($id);
        return view('admin.country.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Country::findOrFail($id);
        return view('admin.country.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Country::findOrFail($id);
        $flag = $request->hasFile('flag') ? ImageHelper::uploadImage($request->file('flag')) : null;
        $thumbnail = $request->hasFile('thumbnail') ? ImageHelper::uploadImage($request->file('thumbnail')) : null;

        if ($request->hasFile('flag') && $data->flag) {
            Storage::disk('public')->delete($data->flag);
        }
        if ($request->hasFile('thumbnail') && $data->thumbnail) {
            Storage::disk('public')->delete($data->thumbnail);
        }

        $input = $request->all();

        if ($flag) {
            $input['flag'] = $flag;
        }
        if ($thumbnail) {
            $input['thumbnail'] = $thumbnail;
        }

        $data->update($input);
        return redirect()->route('admin.country.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Country::findOrFail($id);

        if ($data->flag) {
            Storage::disk('public')->delete($data->flag);
        }
        if ($data->thumbnail) {
            Storage::disk('public')->delete($data->thumbnail);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
