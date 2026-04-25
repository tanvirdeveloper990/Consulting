<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AdmissionRequirement;
use App\Models\Country;
use App\Models\Question;
use App\Models\Study;
use App\Models\StudyItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TopRated;
use Illuminate\Support\Facades\DB;


class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view study')->only('index');
        $this->middleware('permission:create study')->only(['create', 'store']);
        $this->middleware('permission:edit study')->only(['edit', 'update']);
        $this->middleware('permission:delete study')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $data = Study::latest()->get();
    return view('admin.study.index', compact('data'));
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    $countries = Country::where('status', 1)->get();
    return view('admin.study.create', compact('countries'));
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'country_id' => 'nullable|string',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',

        'study_items.*.icon' => 'nullable|image',
        'study_items.*.title' => 'nullable|string|max:255',
        'study_items.*.description' => 'nullable|string',

        'top_rateds.*.title' => 'nullable|string|max:255',
        'top_rateds.*.image' => 'nullable|image',
        'top_rateds.*.description' => 'nullable|string',

        'questions.*.title' => 'nullable|string|max:255',
        'questions.*.description' => 'nullable|string',

        'admission_requirements.*.icon' => 'nullable|image',
        'admission_requirements.*.text' => 'nullable|string',
    ]);

    DB::beginTransaction();

    try {
        // Banner image upload
        $banner_image = $request->hasFile('banner_image') ? ImageHelper::uploadImage($request->file('banner_image')) : null;

        // Study create
        $study = Study::create([
            'country_id' => $request->country_id,
            'short_description' => $request->short_description,
            'banner_image' => $banner_image,
            'title' => $request->title,
            'description' => $request->description,
            'partner_university_title' => $request->partner_university_title,
            'partner_university_count' => $request->partner_university_count,
            'students_enrolled_title' => $request->students_enrolled_title,
            'students_enrolled_count' => $request->students_enrolled_count,
            'success_rate_title' => $request->success_rate_title,
            'success_rate_count' => $request->success_rate_count,
            'status' => $request->status ?? 0,
        ]);

        // Study Items create
        if ($request->has('study_items')) {
            foreach ($request->study_items as $index => $item) {
                if (empty($item['title']) && empty($item['description']) && !$request->hasFile("study_items.$index.icon")) continue;

                $iconPath = $request->hasFile("study_items.$index.icon") ? $request->file("study_items.$index.icon")->store('studies/icons', 'public') : null;

                StudyItem::create([
                    'study_id' => $study->id,
                    'icon' => $iconPath,
                    'title' => $item['title'] ?? null,
                    'description' => $item['description'] ?? null,
                ]);
            }
        }

        // Top Rated create
        if ($request->has('top_rateds')) {
            foreach ($request->top_rateds as $index => $topRated) {
                if (empty($topRated['title']) && empty($topRated['description']) && !$request->hasFile("top_rateds.$index.image")) continue;

                $imagePath = $request->hasFile("top_rateds.$index.image") ? $request->file("top_rateds.$index.image")->store('studies/top-rated', 'public') : null;

                TopRated::create([
                    'study_id' => $study->id,
                    'title' => $topRated['title'] ?? null,
                    'image' => $imagePath,
                    'description' => $topRated['description'] ?? null,
                ]);
            }
        }

        // Questions create
        if ($request->has('questions')) {
            foreach ($request->questions as $q) {
                if (empty($q['title']) && empty($q['description'])) continue;

                Question::create([
                    'study_id' => $study->id,
                    'title' => $q['title'] ?? null,
                    'description' => $q['description'] ?? null,
                ]);
            }
        }

          // Admission Requirements create (Questions er pore add koro)
        if ($request->has('admission_requirements')) {
            foreach ($request->admission_requirements as $index => $requirement) {
                if (empty($requirement['text']) && !$request->hasFile("admission_requirements.$index.icon")) continue;

                $iconPath = $request->hasFile("admission_requirements.$index.icon") 
                    ? $request->file("admission_requirements.$index.icon")->store('studies/admission-requirements', 'public') 
                    : null;

                AdmissionRequirement::create([
                    'study_id' => $study->id,
                    'icon' => $iconPath,
                    'text' => $requirement['text'] ?? null,
                ]);
            }
        }

        DB::commit();
        return redirect()->route('admin.study.index')->with('success', 'Study successfully created!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
    }
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $data = Study::with(['studyItems', 'topRateds', 'questions','admissionRequirements'])->findOrFail($id);
    $countries = Country::where('status', 1)->get();
    return view('admin.study.edit', compact('data', 'countries'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'country_id' => 'nullable|string',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',

        'study_items.*.icon' => 'nullable|image',
        'study_items.*.title' => 'nullable|string|max:255',
        'study_items.*.description' => 'nullable|string',

        'top_rateds.*.title' => 'nullable|string|max:255',
        'top_rateds.*.image' => 'nullable|image',
        'top_rateds.*.description' => 'nullable|string',

        'questions.*.title' => 'nullable|string|max:255',
        'questions.*.description' => 'nullable|string',

        'admission_requirements.*.icon' => 'nullable|image',
        'admission_requirements.*.text' => 'nullable|string',
    ]);

    DB::beginTransaction();

    try {
        $study = Study::findOrFail($id);

        // Banner image
        $banner_image = $study->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($study->banner_image && Storage::disk('public')->exists($study->banner_image)) {
                Storage::disk('public')->delete($study->banner_image);
            }
            $banner_image = ImageHelper::uploadImage($request->file('banner_image'));
        }

        // Update Study
        $study->update([
            'country_id' => $request->country_id,
            'short_description' => $request->short_description,
            'banner_image' => $banner_image,
            'title' => $request->title,
            'description' => $request->description,
            'partner_university_title' => $request->partner_university_title,
            'partner_university_count' => $request->partner_university_count,
            'students_enrolled_title' => $request->students_enrolled_title,
            'students_enrolled_count' => $request->students_enrolled_count,
            'success_rate_title' => $request->success_rate_title,
            'success_rate_count' => $request->success_rate_count,
            'status' => $request->status ?? 0,
        ]);

        // Delete removed Study Items
        if ($request->filled('deleted_study_items')) {
            $deletedIds = explode(',', $request->deleted_study_items);
            foreach ($deletedIds as $deletedId) {
                $item = StudyItem::find($deletedId);
                if ($item) {
                    if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                        Storage::disk('public')->delete($item->icon);
                    }
                    $item->delete();
                }
            }
        }

        // Update/Create Study Items
        if ($request->has('study_items')) {
            foreach ($request->study_items as $index => $itemData) {
                if (empty($itemData['title']) && empty($itemData['description']) && !$request->hasFile("study_items.$index.icon")) continue;

                if (isset($itemData['id']) && !empty($itemData['id'])) {
                    $item = StudyItem::find($itemData['id']);
                    if ($item) {
                        $iconPath = $item->icon;
                        if ($request->hasFile("study_items.$index.icon")) {
                            if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                                Storage::disk('public')->delete($item->icon);
                            }
                            $iconPath = $request->file("study_items.$index.icon")->store('studies/icons', 'public');
                        }
                        $item->update([
                            'icon' => $iconPath,
                            'title' => $itemData['title'] ?? null,
                            'description' => $itemData['description'] ?? null,
                        ]);
                    }
                } else {
                    $iconPath = $request->hasFile("study_items.$index.icon") ? $request->file("study_items.$index.icon")->store('studies/icons', 'public') : null;
                    StudyItem::create([
                        'study_id' => $study->id,
                        'icon' => $iconPath,
                        'title' => $itemData['title'] ?? null,
                        'description' => $itemData['description'] ?? null,
                    ]);
                }
            }
        }

        // Delete removed Top Rateds
        if ($request->filled('deleted_top_rateds')) {
            $deletedIds = explode(',', $request->deleted_top_rateds);
            foreach ($deletedIds as $deletedId) {
                $topRated = TopRated::find($deletedId);
                if ($topRated) {
                    if ($topRated->image && Storage::disk('public')->exists($topRated->image)) {
                        Storage::disk('public')->delete($topRated->image);
                    }
                    $topRated->delete();
                }
            }
        }

        // Update/Create Top Rateds
        if ($request->has('top_rateds')) {
            foreach ($request->top_rateds as $index => $topRatedData) {
                if (empty($topRatedData['title']) && empty($topRatedData['description']) && !$request->hasFile("top_rateds.$index.image")) continue;

                if (isset($topRatedData['id']) && !empty($topRatedData['id'])) {
                    $topRated = TopRated::find($topRatedData['id']);
                    if ($topRated) {
                        $imagePath = $topRated->image;
                        if ($request->hasFile("top_rateds.$index.image")) {
                            if ($topRated->image && Storage::disk('public')->exists($topRated->image)) {
                                Storage::disk('public')->delete($topRated->image);
                            }
                            $imagePath = $request->file("top_rateds.$index.image")->store('studies/top-rated', 'public');
                        }
                        $topRated->update([
                            'image' => $imagePath,
                            'title' => $topRatedData['title'] ?? null,
                            'description' => $topRatedData['description'] ?? null,
                        ]);
                    }
                } else {
                    $imagePath = $request->hasFile("top_rateds.$index.image") ? $request->file("top_rateds.$index.image")->store('studies/top-rated', 'public') : null;
                    TopRated::create([
                        'study_id' => $study->id,
                        'title' => $topRatedData['title'] ?? null,
                        'image' => $imagePath,
                        'description' => $topRatedData['description'] ?? null,
                    ]);
                }
            }
        }

        // Delete removed Questions
        if ($request->filled('deleted_questions')) {
            $deletedIds = explode(',', $request->deleted_questions);
            foreach ($deletedIds as $deletedId) {
                $question = Question::find($deletedId);
                if ($question) $question->delete();
            }
        }

        // Update/Create Questions
        if ($request->has('questions')) {
            foreach ($request->questions as $q) {
                if (empty($q['title']) && empty($q['description'])) continue;

                if (isset($q['id']) && !empty($q['id'])) {
                    $question = Question::find($q['id']);
                    if ($question) {
                        $question->update([
                            'title' => $q['title'] ?? null,
                            'description' => $q['description'] ?? null,
                        ]);
                    }
                } else {
                    Question::create([
                        'study_id' => $study->id,
                        'title' => $q['title'] ?? null,
                        'description' => $q['description'] ?? null,
                    ]);
                }
            }
        }


         // Update/Create Admission Requirements
        if ($request->has('admission_requirements')) {
            foreach ($request->admission_requirements as $index => $requirementData) {
                if (empty($requirementData['text']) && !$request->hasFile("admission_requirements.$index.icon")) continue;

                if (isset($requirementData['id']) && !empty($requirementData['id'])) {
                    // Update existing
                    $requirement = AdmissionRequirement::find($requirementData['id']);
                    if ($requirement) {
                        $iconPath = $requirement->icon;
                        if ($request->hasFile("admission_requirements.$index.icon")) {
                            if ($requirement->icon && Storage::disk('public')->exists($requirement->icon)) {
                                Storage::disk('public')->delete($requirement->icon);
                            }
                            $iconPath = $request->file("admission_requirements.$index.icon")->store('studies/admission-requirements', 'public');
                        }
                        $requirement->update([
                            'icon' => $iconPath,
                            'text' => $requirementData['text'] ?? null,
                        ]);
                    }
                } else {
                    // Create new
                    $iconPath = $request->hasFile("admission_requirements.$index.icon") 
                        ? $request->file("admission_requirements.$index.icon")->store('studies/admission-requirements', 'public') 
                        : null;
                    
                    AdmissionRequirement::create([
                        'study_id' => $study->id,
                        'icon' => $iconPath,
                        'text' => $requirementData['text'] ?? null,
                    ]);
                }
            }
        }

        DB::commit();
        return redirect()->route('admin.study.index')->with('success', 'Study successfully updated!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
    }
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    DB::beginTransaction();

    try {
        $study = Study::with(['studyItems', 'topRateds', 'questions'])->findOrFail($id);

        // Banner
        if ($study->banner_image && Storage::disk('public')->exists($study->banner_image)) {
            Storage::disk('public')->delete($study->banner_image);
        }

        // Study Items
        foreach ($study->studyItems as $item) {
            if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }
            $item->delete();
        }

        // Top Rateds
        foreach ($study->topRateds as $topRated) {
            if ($topRated->image && Storage::disk('public')->exists($topRated->image)) {
                Storage::disk('public')->delete($topRated->image);
            }
            $topRated->delete();
        }

        // Questions
        foreach ($study->questions as $question) {
            $question->delete();
        }

          // Admission Requirements add koro
        foreach ($study->admissionRequirements as $requirement) {
            if ($requirement->icon && Storage::disk('public')->exists($requirement->icon)) {
                Storage::disk('public')->delete($requirement->icon);
            }
            $requirement->delete();
        }

        // Delete Study
        $study->delete();

        DB::commit();
        return redirect()->route('admin.study.index')->with('success', 'Study and all related data deleted successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}
}
