<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VisitCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $country_visits = VisitCountry::all();
        $visits = DB::table('visits')->first();

        return view('dashboard.index', [
            'countries' => $country_visits,
            'total' => $visits->total,
            'today' => $visits->today
        ]);
    }
}
