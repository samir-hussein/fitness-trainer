<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\YoutubeResource;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);

        Youtube::create($request->all());

        return back()->withSuccess('Recored has been added successfully.');
    }

    public function read()
    {
        return response()->json([
            'data' => YoutubeResource::collection(Youtube::orderBy('id', 'desc')->get()),
        ]);
    }

    public function delete(Youtube $youtube)
    {
        $youtube->delete();

        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
    }
}
