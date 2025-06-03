<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Categories;
use App\Models\ContactVideo;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Header;
use App\Models\HomeBanner;
use App\Models\Images;
use App\Models\PageTitle;
use App\Models\Program;
use App\Models\Publication;
use App\Models\School;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\Testimonial;
use App\Models\Video;
use App\Services\SearchService;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    protected $searchService;

    public function home()
    {
        $about = About::first();
        $partners = School::where('status', true)->take(6)->get();
        $courses = Program::where('status', true)->take(3)->get();
        $testimonials = Testimonial::where('status', true)->take(5)->get();
        $team = Team::where('status', true)->take(4)->get();
        $blogs = Blog::where('status', true)->take(3)->get();
        $choose = Setting::where('key', 'why-choose-us')->first();
        $homeBanner = HomeBanner::get();
        $categories = Categories::with('program')->get();
        $homepageVideo = ContactVideo::latest()->first();
        // dd($choose);
        return view('pages.home', compact('about', 'partners', 'courses', 'testimonials', 'team', 'blogs', 'choose', 'homeBanner', 'categories', 'homepageVideo'));
    }
    public function about()
    {
        $about = About::first();
        $testimonials = Testimonial::where('status', true)->take(5)->get();
        $team = Team::where('status', true)->take(4)->get();
        $choose = Setting::where('key', 'why-choose-us')->first();
        return view('pages.about', compact('about', 'testimonials', 'team', 'choose'));
    }

    public function teachers()
    {
        $teams = Team::where('status', true)->latest()->simplePaginate(15);
        return view('pages.teachers.list', compact('teams'));
    }

    public function blogs()
    {
        $blogs = Blog::where('status', true)->latest()->simplePaginate(12);
        return view('pages.blogs.list', compact('blogs'));
    }
    public function blogDetail($id)
    {
        $blog = Blog::where('status', true)->findOrFail($id);
        $blogs = Blog::where('status', true)->latest()->take(3)->get();
        return view('pages.blogs.detail', compact('blog', 'blogs'));
    }

    public function gallery()
    {
        $albums = Gallery::where('status', true)->latest()->simplePaginate(15);
        return view('pages.gallery', compact('albums'));
    }
    public function galleryDetail($id)
    {
        $album = Gallery::where('status', true)->with('image')->findOrFail($id);
        return view('pages.gallery-detail', compact('album'));
    }
    public function schools()
    {
        return view('pages.schools.list');
    }
    public function schoolDetail($id)
    {
        return view('pages.schools.detail');
    }


    public function events()
    {
        $events = Event::where('status', true)->latest()->simplePaginate(15);
        return view('pages.events.list', compact('events'));
    }

    public function eventDetail($id)
    {
        $event = Event::where('status', true)->findOrFail($id);
        return view('pages.events.detail', compact('event'));
    }

    public function service($id)
    {
        return view('pages.service-details');
    }

    public function video()
    {
        $videos = Video::latest()->simplePaginate(15);
        return view('pages.videos', compact('videos'));
    }


    public function categoryCourses($id)
    {
        $category = Categories::with('program')->findOrFail($id);
        return view('pages.courses.category-list', compact('category'));
    }

    public function courses()
    {
        $courses = Program::where('status', true)->latest()->simplePaginate(15);
        return view('pages.courses.list', compact('courses'));
    }
    public function courseDetail($id)
    {
        $course = Program::where('status', true)->findOrFail($id);
        return view('pages.courses.detail', compact('course'));
    }

    public function publication()
    {
        $publications = Publication::where('status', true)->latest()->simplePaginate(15);
        return view('pages.publication', compact('publications'));
    }


    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $searchText = $request->input('search');
        return redirect()->route('search', ['query' => $searchText]);
    }

    public function searchResult(Request $request, SearchService $searchService)
    {
        $results = [];
        $searchText = $request->query('query');
        $results = $searchService->search($searchText);
        return view('pages.search', compact('results', 'searchText'));
    }
}
