<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class BuyFormController extends Controller
{
    public function index($service = null)
    {
        $services = Service::get(['name', 'price']);
        $packages = Package::get(['name', 'price']);
        $all = $services->concat($packages);

        return view('buy-form', [
            'services' => $all,
            'selected_service' => $service
        ]);
    }
}
