<?php

namespace App\Http\Controllers;

use App\Models\BookClient;
use App\Models\Client;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function number_of_new_clients()
    {
        $number = Client::where('status', 'new')->count();
        $book_clients = BookClient::where('status', 'new')->count();
        return response()->json([
            'data' => [
                'clients' => ($number > 0) ? $number : '',
                'books_clients' => ($book_clients > 0) ? $book_clients : ''
            ]
        ]);
    }

    public function new()
    {
        return view('dashboard.clients.new-clients', [
            'clients' => Client::where('status', 'new')->orderBy('id', 'desc')->get(['id', 'name', 'gender', 'phone', 'service'])
        ]);
    }

    public function current()
    {
        return response()->json([
            'data' => Client::where('start', '<=', date('Y-m-d'))->where('end', '>=', date('Y-m-d'))->get(['id', 'name', 'gender', 'phone', 'service', 'start', 'end']),
        ]);
    }

    public function old()
    {
        return response()->json([
            'data' => Client::where('end', '<', date('Y-m-d'))->orWhere(function ($query) {
                $query->orWhere('status', 'old')->whereNull('start');
            })->get(['id', 'name', 'gender', 'phone', 'service', 'start', 'end']),
        ]);
    }

    public function future()
    {
        return response()->json([
            'data' => Client::where('start', '>', date('Y-m-d'))->get(['id', 'name', 'gender', 'phone', 'service', 'start', 'end']),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'height' => 'required',
            'weight' => 'required',
            'sleep' => 'required',
            'wake_up' => 'required',
            'go_work' => 'required',
            'go_home' => 'required',
            'training_at' => 'required',
            'goal' => 'required|string',
            'supplement' => 'required|string',
            'another_sport' => 'required|string',
            'problems' => 'required|string',
            'front_img' => 'mimes:jpeg,jpg,png,webp|max:10000',
            'back_img' => 'mimes:jpeg,jpg,png,webp|max:10000',
            'bill_img' => 'required|mimes:jpeg,jpg,png,webp|max:10000',
            'service' => 'required',
        ], [
            'required' => 'يجب ادخال هذا الحقل',
            'numeric' => 'مسموح بادخال ارقام فقط'
        ]);

        $service = Service::where('name', $request->service)->first();

        if (!$service) {
            $service = Package::where('name', $request->service)->first();
        }

        if (!$service) {
            return back()->withError('هذه الخدمة غير متوفرة.');
        }

        if ($request->has('front_img')) {
            // upload images
            $request->request->add([
                'front_body' => $this->upload_img($request->file('front_img'), 'front_body'),
            ]);
        }
        if ($request->has('back_img')) {
            // upload images
            $request->request->add([
                'back_body' => $this->upload_img($request->file('back_img'), 'back_body'),
            ]);
        }
        // upload images
        $request->request->add([
            'bill' => $this->upload_img($request->file('bill_img'), 'bill'),
            'status' => 'new',
            'service' => $service->name
        ]);

        Client::create($request->all());

        return back()->withSuccess('تم ارسال بياناتك انتظر التواصل عن طريق الواتساب خلال 48 ساعه.');
    }

    private function upload_img($file, $prefix)
    {
        // upload the image
        $newName = $prefix . "_" . Str::random(12) . "." . $file->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $file->move($destinationPath, $newName);

        return $newName;
    }

    private function delete_img($file)
    {
        // remove image
        $image_path = public_path("/images/") . $file;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    public function delete(Client $client)
    {
        // delete images
        if ($client->front_body) {
            $this->delete_img($client->front_body);
        }

        if ($client->back_body) {
            $this->delete_img($client->back_body);
        }

        $this->delete_img($client->bill);

        // delete recored from db
        $client->delete();

        // return 
        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
    }

    public function handle(Request $request, Client $client)
    {
        $request->validate([
            'start' => 'required_with:follow',
            'service' => 'required'
        ]);

        if ($request->has('sell')) {
            $client->update([
                'status' => 'old',
                'service' => $request->service
            ]);

            return back()->withSuccess('تم التعامل مع طلب بيع البرنامج بنجاح.');
        }

        if ($request->has('follow')) {

            $service_duration = Package::where('name', $request->service)->first()->duration;

            $end_date = date('Y-m-d', strtotime("+$service_duration months", strtotime($request->start)));

            $client->update([
                'status' => 'old',
                'start' => $request->start,
                'end' => $end_date,
                'service' => $request->service
            ]);

            return back()->withSuccess('تم التعامل مع طلب بدء المتابعة بنجاح.');
        }
    }
}
