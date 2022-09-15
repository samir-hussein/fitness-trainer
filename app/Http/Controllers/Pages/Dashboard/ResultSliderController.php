<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Illuminate\Support\Str;
use App\Models\ResultSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultSliderController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => ResultSlider::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|mimes:jpeg,jpg,png,webp|max:10000',
        ]);

        // upload the image
        $file = $request->file('img');
        $newName = "result_" . Str::random(8) . "." . $file->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $file->move($destinationPath, $newName);

        ResultSlider::create([
            'img' => $newName
        ]);

        return back()->withSuccess('Image has been added successfully.');
    }

    public function delete(ResultSlider $slider)
    {
        // remove image
        $image_path = public_path("/images/") . $slider->img;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $slider->delete();

        return response()->json([
            'success' => 'Recored deleted successfully.'
        ]);
    }
}
