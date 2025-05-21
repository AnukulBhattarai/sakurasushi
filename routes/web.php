<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WebpageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactVideoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PageTitleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebpageController::class, 'home'])->name('home');
Route::get('/about', [WebpageController::class, 'about'])->name('about');

Route::get('/print', function () {
    return view('pages.print');
})->name('print');



Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::post('/newsletter/store', [ContactController::class, 'newsletter'])->name('newsletter');


Route::get('/category-courses/{id}', [WebpageController::class, 'categoryCourses'])->name('category.courses');


Route::get('/courses', [WebpageController::class, 'courses'])->name('courses');
Route::get('/course-detail/{id?}', [WebpageController::class, 'courseDetail'])->name('course.detail');

Route::get('/team', [WebpageController::class, 'teachers'])->name('teachers');

Route::get('/blogs', [WebpageController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{id?}', [WebpageController::class, 'blogDetail'])->name('blog.detail');

Route::get('/gallery', [WebpageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{id?}', [WebpageController::class, 'galleryDetail'])->name('gallery.detail');

Route::get('/partners', [WebpageController::class, 'schools'])->name('schools');
// Route::get('/school/{id?}', [WebpageController::class, 'schoolDetail'])->name('school.detail');

Route::get('/events', [WebpageController::class, 'events'])->name('event');
Route::get('/event-detail/{id?}', [WebpageController::class, 'eventDetail'])->name('event.detail');

// Route::get('/service/{id?}', [WebpageController::class, 'service'])->name('service');

Route::get('/publications', [WebpageController::class, 'publication'])->name('publication');

Route::get('/videos', [WebpageController::class, 'video'])->name('video');


Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');

// Route::get('/search', [WebpageController::class, 'searchResult'])->name('search');
// Route::post('/search', [WebpageController::class, 'search'])->name('search.post');


Route::middleware('auth')->group(function () {
    Route::get('dashboard',  [AdminPanelController::class, 'dashboard'])->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/update-password', [UserController::class, 'changepassword'])->name('update.password');

    //blog
    Route::get('/admin/news', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/admin/news/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/admin/news/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/admin/news/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('/admin/news/delete/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/admin/news/status-change', [BlogController::class, 'change_status'])->name('blog.status');

    //organization
    Route::get('/admin/organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::get('/admin/organization/add', [OrganizationController::class, 'create'])->name('organization.create');
    Route::post('/admin/organization/store', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('/admin/organization/show/{organization}', [OrganizationController::class, 'show'])->name('organization.show');
    Route::get('/admin/organization/edit/{organization}', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::post('/admin/organization/update/{organization}', [OrganizationController::class, 'update'])->name('organization.update');


    //about
    Route::get('/admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/admin/about/add', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/show/{about}', [AboutController::class, 'show'])->name('about.show');
    Route::get('/admin/about/edit/{about}', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/admin/about/update/{about}', [AboutController::class, 'update'])->name('about.update');


    //team
    Route::get('/admin/teachers', [TeamController::class, 'index'])->name('team.index');
    Route::post('/admin/teachers/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('/admin/teachers/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/admin/teachers/update/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::post('/admin/teachers/delete/{team}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::get('/admin/teachers/status-change', [TeamController::class, 'change_status'])->name('team.status');


    //services
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/admin/services/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/admin/services/update/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::post('/admin/services/delete/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::get('/admin/services/status-change', [ServiceController::class, 'change_status'])->name('service.status');


    //events
    Route::get('/admin/events', [EventController::class, 'index'])->name('event.index');
    Route::post('/admin/events/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/admin/events/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/admin/events/update/{event}', [EventController::class, 'update'])->name('event.update');
    Route::post('/admin/events/delete/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/admin/events/status-change', [EventController::class, 'change_status'])->name('event.status');


    //schools
    Route::get('/admin/partners', [SchoolController::class, 'index'])->name('school.index');
    Route::post('/admin/partners/store', [SchoolController::class, 'store'])->name('school.store');
    Route::get('/admin/partners/edit/{school}', [SchoolController::class, 'edit'])->name('school.edit');
    Route::post('/admin/partners/update/{school}', [SchoolController::class, 'update'])->name('school.update');
    Route::post('/admin/partners/delete/{school}', [SchoolController::class, 'destroy'])->name('school.destroy');
    Route::get('/admin/partners/status-change', [SchoolController::class, 'change_status'])->name('school.status');


    //programs
    Route::get('/admin/courses', [ProgramController::class, 'index'])->name('program.index');
    Route::post('/admin/courses/store', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/admin/courses/edit/{program}', [ProgramController::class, 'edit'])->name('program.edit');
    Route::post('/admin/courses/update/{program}', [ProgramController::class, 'update'])->name('program.update');
    Route::post('/admin/courses/delete/{program}', [ProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('/admin/courses/status-change', [ProgramController::class, 'change_status'])->name('program.status');

    //Home Banner
    Route::get('/admin/home-banner', [HomeBannerController::class, 'index'])->name('banner.index');
    Route::post('/admin/home-banner/store', [HomeBannerController::class, 'store'])->name('banner.store');
    Route::get('/admin/home-banner/edit/{banner}', [HomeBannerController::class, 'edit'])->name('banner.edit');
    Route::post('/admin/home-banner/update/{banner}', [HomeBannerController::class, 'update'])->name('banner.update');
    Route::post('/admin/home-banner/delete/{banner}', [HomeBannerController::class, 'destroy'])->name('banner.destroy');


    //settings
    Route::get('/admin/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/admin/setting/store', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/admin/setting/edit/{setting}', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/admin/setting/update/{setting}', [SettingController::class, 'update'])->name('setting.update');
    Route::post('/admin/setting/delete/{setting}', [SettingController::class, 'destroy'])->name('setting.destroy');

    //video
    Route::get('/admin/video', [ContactVideoController::class, 'index'])->name('video.index');
    Route::post('/admin/video/store', [ContactVideoController::class, 'store'])->name('video.store');
    Route::get('/admin/video/edit/{video}', [ContactVideoController::class, 'edit'])->name('video.edit');
    Route::post('/admin/video/update/{video}', [ContactVideoController::class, 'update'])->name('video.update');
    Route::post('/admin/video/delete/{video}', [ContactVideoController::class, 'destroy'])->name('video.destroy');

    //Newsletter
    Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');

    //Category
    Route::get('/admin/course-categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/admin/course-categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/course-categories/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/course-categories/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/admin/course-categories/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Homepage Header
    Route::get('/admin/home-headers', [HeaderController::class, 'index'])->name('header.index');
    Route::post('/admin/home-headers/store', [HeaderController::class, 'store'])->name('header.store');
    Route::get('/admin/home-headers/edit/{header}', [HeaderController::class, 'edit'])->name('header.edit');
    Route::post('/admin/home-headers/update/{header}', [HeaderController::class, 'update'])->name('header.update');
    Route::post('/admin/home-headers/delete/{header}', [HeaderController::class, 'destroy'])->name('header.destroy');

    //Page Title
    Route::get('/admin/page-title', [PageTitleController::class, 'index'])->name('pageTitle.index');
    Route::post('/admin/page-title/store', [PageTitleController::class, 'store'])->name('pageTitle.store');
    Route::get('/admin/page-title/edit/{pageTitle}', [PageTitleController::class, 'edit'])->name('pageTitle.edit');
    Route::post('/admin/page-title/update/{pageTitle}', [PageTitleController::class, 'update'])->name('pageTitle.update');
    Route::post('/admin/page-title/delete/{pageTitle}', [PageTitleController::class, 'destroy'])->name('pageTitle.destroy');

    //gallery
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/admin/gallery/edit/{gallery}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/admin/gallery/update/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/admin/gallery/delete/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('/admin/gallery/status-change', [GalleryController::class, 'change_status'])->name('gallery.status');

    //testimonials
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/admin/testimonials/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/admin/testimonials/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/admin/testimonials/update/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::post('/admin/testimonials/delete/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::get('/admin/testimonials/status-change', [TestimonialController::class, 'change_status'])->name('testimonial.status');

    // //Resource
    // Route::get('/admin/resources', [ResourceController::class, 'index'])->name('resource.index');
    // Route::post('/admin/resources/store', [ResourceController::class, 'store'])->name('resource.store');
    // Route::get('/admin/resources/edit/{id}', [ResourceController::class, 'edit'])->name('resource.edit');
    // Route::post('/admin/resources/update/{resource}', [ResourceController::class, 'update'])->name('resource.update');
    // Route::post('/admin/resources/delete/{resource}', [ResourceController::class, 'destroy'])->name('resource.destroy');
    // Route::get('/admin/resources/status-change', [ResourceController::class, 'change_status'])->name('resource.status');





    Route::get('/admin/messages', [AdminPanelController::class, 'messages'])->name('message.index');
    Route::get('/detach-image', [AdminPanelController::class, 'detach_image'])->name('detach.image');
});
Route::middleware('auth')->group(function () {

    Route::get('/student-management/leads', [LeadController::class, 'index'])->name('lead.index');
    Route::get('/student-management/leads/create', [LeadController::class, 'create'])->name('lead.create');
    Route::post('/student-management/leads/store', [LeadController::class, 'store'])->name('lead.store');
    Route::get('/student-management/leads/edit/{lead}', [LeadController::class, 'edit'])->name('lead.edit');
    Route::post('/student-management/leads/update/{lead}', [LeadController::class, 'update'])->name('lead.update');
    Route::post('/student-management/leads/delete/{lead}', [LeadController::class, 'destroy'])->name('lead.destroy');
    Route::get('/student-management/leads/status-change/{lead}', [LeadController::class, 'change_status'])->name('lead.status');



    Route::get('/student-management/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student-management/students/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student-management/students/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student-management/students/show/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student-management/students/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/student-management/students/update/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::post('/student-management/students/delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

    Route::get('/student-management/students/search', [StudentController::class, 'search'])->name('student.search');


    Route::post('/student-management/payments/store/{student}', [PaymentController::class, 'store'])->name('payments.store');
});


Route::get('/students/search', function (Request $request) {
    $query = $request->get('q');

    return response()->json(
        Student::where('name', 'like', "%{$query}%")
            ->select('id', 'name', 'email')
            ->limit(10)
            ->get()
    );
});
