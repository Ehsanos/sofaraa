<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Campaign;
use App\Models\Office;
use App\Models\Post;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        $sliders=Slider::all();
        $posts=Post::pluck('title')->all();
        $testimonials=Testimonial::inRandomOrder()->limit(4)->get();
        $count_office=Office::count();
        $count_camp=Campaign::count();
        $areas=Area::count();
        $count_projects=Project::count();
        $comps=Campaign::where('status',1)->get();
        // $posts=Post::inRandomOrder()->limit(4)->get();
        // $posts=Post::where('is_archive',0)->get();
                $posts=Post::where('is_archive',0)->latest()->get();
        return view('theme1.index',compact('sliders','posts','comps','posts','testimonials','count_office','count_camp','areas','count_projects'));
    }

    public function campaigns(){

    }

}
