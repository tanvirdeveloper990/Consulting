<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\AdvancedStudy;
use App\Models\Apply;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Certificates;
use App\Models\Country;
use App\Models\FrequentlyAsked;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Message;
use App\Models\MyChoose;
use App\Models\OurParents;
use App\Models\Pages;
use App\Models\Notice;
use App\Models\ProjectOverview;
use App\Models\ReviewStories;
use App\Models\ServiceAndSupport;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StudentSupport;
use App\Models\Team;
use App\Models\TopRated;
use App\Models\TopStudy;
use App\Models\UniversityAdmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function home()
    {
        $setting = Setting::first();
        $slider = Slider::where('status',1)->get();
        $advanced = AdvancedStudy::first();
        $student = StudentSupport::first();
        $overview = ProjectOverview::first();
        $steps = StudentSupport::where('status',1)->get();
        $services = MyChoose::where('status', 1)->orderBy('id', 'asc')->get();
        $stories = TopStudy::where('status',1)->orderBy('id', 'asc')->get()->map(function($s) {
            $s->image_url = $s->image ? Storage::url($s->image) : '';
            return $s;
        })->values();
        $toprated = TopRated::where('status',1)->get();
        $partners = OurParents::where('status',1)->get();
        $frequently = FrequentlyAsked::where('status',1)->get();
        $blogs = Blog::where('status',1)->get();
        $photoreview = ReviewStories::where('type', 'Veryfied Stories')->where('status', 1)->get();
        $videoreview = ReviewStories::where('type', 'Success Stories')->where('status', 1)->get();
        $country = Country::where('status',1)->get();
        $certificates = Certificates::where('status',1)->latest()->get();
        $galleries = Gallery::where('status',1)->latest()->get();
        $notice = Notice::where('status',1)->latest()->get();


        return view('frontend.index', compact('galleries','steps','country','blogs','setting','slider','advanced','student','overview','services','stories','toprated','partners','frequently','photoreview','videoreview','certificates','notice'));
    }

    public function alldestination()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $country = Country::where('status',1)->get();
        return view('frontend.all-destination', compact('setting','overview','country'));
    }

    public function allservices()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $services = MyChoose::where('status', 1)->orderBy('id', 'asc')->get();
        return view('frontend.services', compact('setting','overview','services'));
    }

    public function testimonial()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $stories = TopStudy::where('status',1)->orderBy('id', 'asc')->get()->map(function($s) {
            $s->image_url = $s->image ? Storage::url($s->image) : '';
            return $s;
        })->values();
        return view('frontend.testimonial', compact('setting','overview','stories'));
    }

    public function singleBlog($slug)
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $data = Blog::where('slug',$slug)->first();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();

        return view('frontend.single-blog', compact('setting','overview','data','blogs'));
    }


    public function destination($id)
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $country = Country::with('study')->where('status',1)->findOrFail($id);
        $firstStudy = $country->study->first(); // get first study
        $frequently = FrequentlyAsked::where('status',1)->get();
        return view('frontend.study-destination', compact('country','setting','overview','frequently','firstStudy'));
    }

    public function services()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $student = StudentSupport::first();
        $support = ServiceAndSupport::where('status',1)->get();
        return view('frontend.service-support', compact('setting','overview','student','support'));
    }

    public function abouts()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $mychoose = MyChoose::where('status',1)->get();
        $advanced = AdvancedStudy::first();
        $frequently = FrequentlyAsked::where('status',1)->get();
        return view('frontend.who-we-are', compact('setting','overview','mychoose','advanced','frequently'));
    }
    
    public function notice()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $notice = Notice::where('status',1)->get();
        return view('frontend.notice', compact('setting','overview','notice'));
    }

    public function review()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $photoreview = ReviewStories::where('type', 'Veryfied Stories')->where('status', 1)->get();
        $videoreview = ReviewStories::where('type', 'Success Stories')->where('status', 1)->get();
        return view('frontend.reviews', compact('setting','overview','photoreview','videoreview'));
    }
    
    public function stories()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $photoreview = ReviewStories::where('type', 'Veryfied Stories')->where('status', 1)->get();
        $videoreview = ReviewStories::where('type', 'Success Stories')->where('status', 1)->get();
        return view('frontend.stories', compact('setting','overview','photoreview','videoreview'));
    }
    
    public function newsupdates()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $blogs = Blog::where('status',1)->get();
        return view('frontend.news-updates', compact('setting','overview','blogs'));
    }

    public function faq()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $frequently = FrequentlyAsked::where('status',1)->get();
        return view('frontend.faq', compact('setting','overview','frequently'));
    }

    public function contact()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        return view('frontend.contact', compact('setting','overview'));
    }

  public function universityAdmission($type = null)
    {
        $setting  = Setting::first();
        $overview = ProjectOverview::first();

        $query = UniversityAdmission::query();

        $typeMap = [
            'university-admission' => 'University Admission',
            'work-permit'          => 'Work Permit',
            'language-program'     => 'Language Program',
            'others'               => 'Others',
        ];

        $typeTitle = 'Admission Requirements'; // default title

        if ($type && isset($typeMap[$type])) {
            $query->where('type', $typeMap[$type]);
            $typeTitle = $typeMap[$type];
        }

        if ($type && !isset($typeMap[$type])) {
            $query->whereRaw('1 = 0');
        }

        $admission = $query->get();

        return view('frontend.university-admission', compact(
            'setting',
            'overview',
            'admission',
            'type',
            'typeTitle'
        ));
    }




    public function applynow()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $country = Country::where('status',1)->get();
        return view('frontend.apply-now', compact('setting','overview','country'));
    }

    public function applynowstore(Request $request)
    {
        $data = $request->all();
        Apply::create($data);
        return redirect()->back()->with('success', 'Application submitted successfully.')->withFragment('apply-form');
    }


    public function privacyPolicy($slug)
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $page = Pages::where('slug',$slug)->first();
        // $pages = Pages::where('status',1)->get();
        return view('frontend.privacy-policy', compact('setting','overview','page'));
    }

    public function termsCondition()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        return view('frontend.terms-condition', compact('setting','overview'));
    }

    public function license($license_number)
    {
     
        $data = User::where('license_number',$license_number)->first();
        return view('license',compact('data'));
    }



     public function gallery()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $categories = GalleryCategory::where('status',1)->get();
        $galleries = Gallery::where('status',1)->get();
        return view('frontend.gallery', compact('setting','overview','categories','galleries'));
    }
     public function career()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $career = Career::first();
        return view('frontend.career', compact('setting','overview','career'));
    }

     public function team(Request $request)
    {
       $data = $request->all();
        
        $file = $request->hasFile('file') ? ImageHelper::uploadImage($request->file('file')) : null;

         if($file){
            $data['file'] = $file;
        }
    
        Team::create($data);
        return redirect()->back()->with('success', 'Data Store Successfully');
    }
     public function certificate()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $certificates = Certificates::where('status',1)->latest()->get();
        return view('frontend.certificate', compact('setting','overview','certificates'));
    }

     public function message()
    {
        $setting = Setting::first();
        $overview = ProjectOverview::first();
        $message = Message::where('status',1)->get();
        return view('frontend.message', compact('setting','overview','message'));
    }


}
