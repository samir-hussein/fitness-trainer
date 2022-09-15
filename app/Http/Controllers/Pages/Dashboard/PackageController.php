<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => Package::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|numeric'
        ]);

        Package::create($request->all());

        return back()->withSuccess('Package has been added successfully.');
    }

    public function delete(Package $package)
    {
        $package->delete();

        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
    }
}
