<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookClient;

class BookClientController extends Controller
{
    public function read()
    {
        return response()->json([
            'data' => BookClient::orderBy('id', 'desc')->get()
        ]);
    }

    public function handle(BookClient $bookClient)
    {
        Book::where('id', $bookClient->book_id)->increment('sold');

        $bookClient->update([
            'status' => 'old'
        ]);

        // return 
        return response()->json([
            'success' => 'The client has been handled successfully.'
        ]);
    }

    public function delete(BookClient $bookClient)
    {
        //delete image
        $this->delete_img($bookClient->bill);

        // delete recored from db
        $bookClient->delete();

        // return 
        return response()->json([
            'success' => 'Recored has been deleted successfully.'
        ]);
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
