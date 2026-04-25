<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Country;
use Illuminate\Http\Request;

class ApplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view applied')->only('index');
        $this->middleware('permission:create applied')->only(['create', 'store']);
        $this->middleware('permission:edit applied')->only(['edit', 'update']);
        $this->middleware('permission:delete applied')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $query = Apply::query();
    
        // Single search input for name, email, phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }
    
        // Start date filter
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
    
        // End date filter
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
    
        $data = $query->latest()->paginate(10)->withQueryString();
        
        return view('admin.applied.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status',1)->get();
        return view('admin.applied.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $data = $request->all();
        Apply::create($data);
        return redirect()->route('admin.applied.index')->with('success', 'Data Store Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Apply::findOrFail($id);
        $countries = Country::where('status',1)->get();
        return view('admin.applied.edit', compact('data','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Apply::findOrFail($id);
        $countries = Country::where('status',1)->get();
        return view('admin.applied.edit', compact('data','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Apply::findOrFail($id);
        
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.applied.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Apply::findOrFail($id);

        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }
}
