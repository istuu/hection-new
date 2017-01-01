<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\About;
use App\Models\Contest;
use App\Models\Day;
use App\Models\Sponsor;
use App\Models\Winner;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\Prize;
use App\Models\Venue;

class HomeController extends Controller
{
  public function index()
  {
      $sliders        = Slider::orderBy('order')->get();
      $about          = About::firstOrFail();
      $prize          = Prize::firstOrFail();
      $venue          = Venue::firstOrFail();
      $contests       = Contest::orderBy('order')->get();
      $count_contest  = Contest::count();
      $days           = Day::orderBy('date')->get();
      $sponsors       = Sponsor::orderBy('id')->get();
      $winners         = Winner::orderBy('order')->get();
      $testimonials   = Testimonial::orderBy('id')->get();
      $galleries      = Gallery::orderBy('id')->get();
      return view('frontend.content', [
        'sliders'       => $sliders,
        'about'         => $about,
        'contests'      => $contests,
        'count_contest' => $count_contest,
        'days'          => $days,
        'testimonials'  => $testimonials,
        'sponsors'      => $sponsors,
        'winners'       => $winners,
        'galleries'     => $galleries,
        'prize'         => $prize,
        'venue'         => $venue
      ]);
  }
}
