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

    public function index()
    {
        $data = StudentSupport::paginate(10);
        return view('admin.student-support.index', compact('data'));
    }

    public function create()
    {
        return view('admin.student-support.create');
    }

    public function store(Request $request)
    {
       

        $input = $request->only(['title', 'description','status']);

        if ($request->hasFile('image')) {
            $input['image'] = ImageHelper::uploadImage($request->file('image'));
        }

        StudentSupport::create($input);

        return redirect()->route('admin.journey-steps.index')
            ->with('success', 'Record created successfully.');
    }

    public function edit(string $id)
    {
        $data = StudentSupport::findOrFail($id);
        return view('admin.student-support.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
       
        $data  = StudentSupport::findOrFail($id);
        $input = $request->only(['title', 'description','status']);

        if ($request->hasFile('image')) {
            // পুরনো image delete করো
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
            $input['image'] = ImageHelper::uploadImage($request->file('image'));
        }

        $data->update($input);

        return redirect()->route('admin.journey-steps.index')
            ->with('success', 'Record updated successfully.');
    }

    public function destroy(string $id)
    {
        $data = StudentSupport::findOrFail($id);

        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();

        return redirect()->route('admin.journey-steps.index')
            ->with('success', 'Record deleted successfully.');
    }
}