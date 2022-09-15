<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VisitController;
use App\Models\About;
use App\Models\Package;
use App\Models\ResultSlider;
use App\Models\Service;
use App\Models\Slider;

class IndexPageController extends Controller
{
    public function index()
    {
        VisitController::EventNewVisit();
        return view('index', [
            'slider' => Slider::orderBy('id', 'desc')->get(),
            'services' => Service::orderBy('price')->get(),
            'result_slider' => ResultSlider::orderBy('id', 'desc')->take(10)->get(),
            'packages' => Package::orderBy('duration')->get(),
            'about' => About::first(),
        ]);
    }
}
