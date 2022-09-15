<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => Slider::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|mimes:jpeg,jpg,png,webp|max:10000',
        ]);

        // upload the image
        $file = $request->file('img');
        $newName = "slider_" . Str::random(8) . "." . $file->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $file->move($destinationPath, $newName);

        Slider::create([
            'img' => $newName
        ]);

        return back()->withSuccess('Image has been added successfully.');
    }

    public function delete(Slider $slider)
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
