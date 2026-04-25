<?php


use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdvancedStudyController;
use App\Http\Controllers\Admin\ApplyController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificatController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FrequentlyAskedController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\MomentController;
use App\Http\Controllers\Admin\MyChooseController;
use App\Http\Controllers\Admin\OurParentsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ProjectOverviewController;
use App\Http\Controllers\Admin\ReviewStoriesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceAndSupportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentSupportController;
use App\Http\Controllers\Admin\StudyController;
use App\Http\Controllers\Admin\StudyItemController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TopStudyController;
use App\Http\Controllers\Admin\UniversityAdmissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopRatedController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


Route::get('/cmd', function () {
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Done';
});



Route::get('/', [WebsiteController::class, 'home'])->name('index');

Route::get('study-destination/{id}', [WebsiteController::class, 'destination'])->name('study.destination');


Route::get('service-and-support', [WebsiteController::class, 'services'])->name('service-support');
Route::get('/who-we-are', [WebsiteController::class, 'whoweare'])->name('who-we-are');

Route::get('/notice', [WebsiteController::class, 'notice'])->name('notice');

Route::get('galleries', [WebsiteController::class, 'gallery'])->name('galleries');

Route::get('career', [WebsiteController::class, 'career'])->name('career');
Route::get('join_our_team_store', [WebsiteController::class, 'team'])->name('team');

Route::get('certificates', [WebsiteController::class, 'certificate'])->name('certificates');
Route::get('message', [WebsiteController::class, 'message'])->name('message');

// Route::get('/stories-and-reviews', [WebsiteController::class, 'review'])->name('stories-and-reviews');

Route::get('/verified-reviews', [WebsiteController::class, 'review'])->name('verified-reviews');

Route::get('/success-stories', [WebsiteController::class, 'stories'])->name('success-stories');




Route::get('/news-updates', [WebsiteController::class, 'newsupdates'])->name('news-updates');
Route::get('/faqs', [WebsiteController::class, 'faq'])->name('faqs');
Route::get('/contacts', [WebsiteController::class, 'contact'])->name('contacts');
Route::get('/services/{type?}', [WebsiteController::class, 'universityAdmission'])->name('services');

Route::get('apply-now', [WebsiteController::class, 'applynow'])->name('apply-now');
Route::post('apply-now/store', [WebsiteController::class, 'applynowstore'])->name('apply-store');
Route::get('blogs/{slug}', [WebsiteController::class, 'singleBlog'])->name('blog.single');

Route::get('pages/{slug}', [WebsiteController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('/terms-and-condition', [WebsiteController::class, 'termsCondition'])->name('terms-and-condition');

// Route::get('/', function(){
//     return redirect()->route('admin.login.form');
// });


Route::get('health/issue/PrintedLicenses/{license_number}', [WebsiteController::class, 'license'])->name('license');





Route::post('/set-locale', function () {
    session(['locale' => request('locale')]);
    return back();
})->name('setLocale');

Auth::routes(['verify' => true]);




Route::middleware(['auth', 'no.admin'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('settings', [HomeController::class, 'settings'])->name('user.settings');
    Route::get('profile', [HomeController::class, 'profile'])->name('user.profile');
    Route::get('profile/edit', [HomeController::class, 'profileEdit'])->name('user.profile.edit');
    Route::put('/profile/update', [HomeController::class, 'update'])->name('user.profile.update');
    Route::get('password/edit', [HomeController::class, 'passwordEdit'])->name('user.password.edit');
    Route::post('/password-update', [HomeController::class, 'updatePassword'])->name('user.password.update');
});



// Admin Auth
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    // ->middleware(['auth:admin', 'admin.only', 'role:super-admin'])
    ->middleware(['auth:admin', 'admin.only', 'admin.has.role'])
    ->name('admin.')
    ->group(function () {


        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard');

        Route::get('/dashboard', [AdminProfileController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile/settings', [AdminProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/profile/settings', [AdminProfileController::class, 'updateSettings'])->name('profile.settings.update');

        Route::get('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');
        Route::put('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change.password.update');


        Route::resource('settings', SettingController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        Route::resource('customers', CustomerController::class);
        Route::get('customers/{id}/print', [CustomerController::class, 'print'])->name('customers.print');


        Route::resource('project-overview', ProjectOverviewController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('advanced-study', AdvancedStudyController::class);
        Route::resource('student_support', StudentSupportController::class);
        Route::resource('my-choose', MyChooseController::class);
        Route::resource('top-study', TopStudyController::class);
        Route::resource('country', CountryController::class);
        Route::resource('top-university', TopRatedController::class);
        Route::resource('frequently-asked', FrequentlyAskedController::class);
        Route::resource('our-partners', OurParentsController::class);
        Route::resource('reviews', ReviewStoriesController::class);

        Route::resource('category', CategoryController::class);
        Route::resource('blogs', BlogController::class);

        Route::resource('study', StudyController::class);
        Route::resource('study-item', StudyItemController::class);

        Route::resource('applied', ApplyController::class);
        Route::resource('services', ServiceAndSupportController::class);
        Route::resource('pages', PagesController::class);
        Route::resource('certificates', CertificatController::class);
        Route::resource('university-admission', UniversityAdmissionController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('career', CareerController::class);
        Route::resource('message', MessageController::class);
        Route::resource('category-gallery', GalleryCategoryController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('notice', NoticeController::class);
    });


// php artisan migrate:refresh --path=database/migrations/2025_11_27_144538_create_blogs_table.php
