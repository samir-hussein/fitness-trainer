<?php

namespace App\Http\Controllers;

use App\Models\VisitCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class VisitController extends Controller
{
    public static function EventNewVisit()
    {
        self::increment_total_visits();

        self::increment_today_visits();

        self::increment_country_visits();
    }

    private static function increment_total_visits()
    {
        DB::table('visits')->increment('total');
    }

    private static function increment_today_visits()
    {
        $date = DB::table('visits')->first()->today_date;
        $today_date = date('Y-m-d');

        if ($today_date > $date) {
            DB::table('visits')->update([
                'today' => '1',
                'today_date' => $today_date,
            ]);
        } else {
            DB::table('visits')->increment('today');
        }
    }

    private static function increment_country_visits()
    {
        $clientIp = self::clientIp();
        $data = null;

        if ($clientIp) {
            $data = Location::get($clientIp);
        }
        if ($data) {
            $country = $data->countryName;

            $result = VisitCountry::where('country', $country)->first();

            if ($result) {
                $result->increment('visits');
            } else {
                VisitCountry::create([
                    'country' => $country,
                    'visits' => 1,
                ]);
            }
        }
    }

    private static function clientIp()
    {
        return $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;
    }
}
