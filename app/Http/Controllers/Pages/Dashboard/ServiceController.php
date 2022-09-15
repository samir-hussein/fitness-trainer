<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => Service::orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'desc' => 'required'
        ]);

        Service::create($request->all());

        return back()->withSuccess('Service has been added successfully.');
    }

    public function delete(Service $service)
    {
        $service->delete();

        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
    }
}
