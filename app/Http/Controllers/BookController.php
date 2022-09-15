<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => Book::orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,webp|max:10000'
        ]);

        // upload image
        $request->request->add([
            'img' => $this->upload_img($request->file('image'), 'eBook'),
        ]);

        Book::create($request->all());

        return back()->withSuccess('Book has been added successfully.');
    }

    public function buy(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'bill_img' => 'required|mimes:jpeg,jpg,png,webp|max:10000'
        ], [
            'required' => 'يجب ادخال هذا الحقل',
            'numeric' => 'مسموح بادخال ارقام فقط'
        ]);

        // upload image
        $bill = $this->upload_img($request->file('bill_img'), 'eBook_bill');

        BookClient::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'bill' => $bill,
            'book_name' => $book->title,
            'book_price' => $book->price,
            'book_id' => $book->id
        ]);

        return back()->withSuccess('تم ارسال بياناتك انتظر التواصل عن طريق الواتساب خلال 48 ساعه.');
    }

    public function delete(Book $book)
    {
        //delete image
        $this->delete_img($book->img);

        // delete recored from db
        $book->delete();

        // return 
        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
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
}
