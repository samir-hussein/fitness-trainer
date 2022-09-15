<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::first();

        $body = ($data) ? $data->body : null;
        $img = ($data) ? $data->img : null;
        $video = ($data) ? $data->video : null;
        $poster = ($data) ? $data->video_poster : null;
        $phone = ($data) ? $data->phone : null;
        $email = ($data) ? $data->email : null;

        return view('dashboard.about', [
            'body' => $body,
            'img' => $img,
            'video' => $video,
            'poster' => $poster,
            'phone' => $phone,
            'email' => $email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email:filter',
            'image' => 'mimes:jpeg,jpg,png,webp|max:10000',
            'poster' => 'mimes:jpeg,jpg,png,webp|max:10000',
            'vid' => 'mimes:mp4,avi,mov,mkv|max:100000',
        ]);

        $data = About::first();

        if ($request->has('image')) {
            if ($data && $data->img) {
                // remove image
                $image_path = public_path("/images/") . $data->img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            // upload the image
            $file = $request->file('image');
            $newName = "about_" . Str::random(8) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $newName);

            $request->request->add([
                'img' => $newName
            ]);
        }

        if ($request->has('poster')) {
            if ($data && $data->video_poster) {
                // remove image
                $image_path = public_path("/images/") . $data->video_poster;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            // upload the image
            $file = $request->file('poster');
            $newName = "about_" . Str::random(8) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $newName);

            $request->request->add([
                'video_poster' => $newName
            ]);
        }

        if ($request->has('vid')) {
            if ($data && $data->video) {
                // remove video
                $image_path = public_path("/videos/") . $data->video;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            // upload the video
            $file = $request->file('vid');
            $newName = "about_" . Str::random(8) . "." . $file->getClientOriginalExtension();
            $destinationPath = public_path('/videos');
            $file->move($destinationPath, $newName);

            $request->request->add([
                'video' => $newName
            ]);
        }

        if ($data) {
            $data->update($request->all());
        } else {
            About::create($request->all());
        }

        return back()->withSuccess('Changed successfully.');
    }
}
