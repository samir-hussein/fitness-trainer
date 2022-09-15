<?php

use App\Models\Client;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Pages\BuyFormController;
use App\Http\Controllers\Pages\IndexPageController;
use App\Http\Controllers\Mails\ForgotPasswordController;
use App\Http\Controllers\Pages\Dashboard\HomeController;
use App\Http\Controllers\Pages\Dashboard\AboutController;
use App\Http\Controllers\Pages\Dashboard\BookClientController;
use App\Http\Controllers\Pages\Dashboard\SliderController;
use App\Http\Controllers\Pages\Dashboard\PackageController;
use App\Http\Controllers\Pages\Dashboard\ServiceController;
use App\Http\Controllers\Pages\Dashboard\ResultSliderController;
use App\Models\Book;
use App\Models\ResultSlider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexPageController::class, 'index'])->name('home');

Route::get('/buy-form/{id?}', [BuyFormController::class, 'index'])->name('buy.form');

Route::get('/results', function () {
    return view('results', [
        'results' => ResultSlider::paginate(9)
    ]);
})->name('results');

Route::get('/books', function () {
    return view('ebooks', [
        'books' => Book::paginate(9)
    ]);
})->name('e-books');

Route::get('/books/{book}/buy', function (Book $book) {
    return view('buy-book', [
        'book' => $book
    ]);
})->name('book.buy')->missing(function () {
    return response()->json([
        'error' => 'Not Found.'
    ]);
});

Route::post('/books/{book}/buy', [BookController::class, 'buy'])->name('book.buy.submit')->missing(function () {
    return response()->json([
        'error' => 'Not Found.'
    ]);
});

Route::post('/buy-form', [ClientController::class, 'store'])->name('buy.form.submit');


//------------------------- Dashboard -------------------------------



// ------------------------ Auth routes -----------------------------

// --------- login ------------------ 
Route::get('/dashboard/login', function () {
    return view('dashboard.login');
})->name('login')->middleware('guest');

Route::post('/dashboard/login', [UserAuthController::class, 'login'])->middleware('guest')->name('login.submit');

// --------- login ------------------ 

// ---------- logout ----------------
Route::get('/dashboard/logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('auth');
// ---------- logout ----------------

// ------------ forgot password ----------------
Route::get('/dashboard/forgot-password', function () {
    return view('dashboard.forgot-password');
})->name('forgot.password')->middleware('guest');

Route::post('/dashboard/forgot-password', [ForgotPasswordController::class, 'request_reset'])->middleware('guest')->name('forgot.password.submit');

// ------------ forgot password ----------------


// ---------------- reset password -----------------
Route::get('dashboard/reset-password', function () {
    return view('dashboard.reset-password');
})->middleware('guest')->name('reset.password');

Route::post('dashboard/reset-password', [UserAuthController::class, 'reset_password'])->middleware('guest')->name('reset.password.submit');
// ---------------- reset password -----------------


// ------------------------ Auth routes -----------------------------



Route::middleware('auth')->name('dashboard.')->group(function () {

    // ----------------- home page --------------------------
    Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');

    // ------------------- slider page -------------------------------
    Route::get('/dashboard/slider', function () {
        return view('dashboard.slider');
    })->name('slider');

    Route::post('/dashboard/slider', [SliderController::class, 'store'])->name('slider.submit');

    Route::get('/dashboard/slider/read', [SliderController::class, 'read'])->name('slider.read');

    Route::delete('/dashboard/slider/{slider}', [SliderController::class, 'delete'])->name('slider.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });


    // ------------------ result slider page -------------------------------
    Route::get('/dashboard/result-slider', function () {
        return view('dashboard.result-slider');
    })->name('result.slider');

    Route::post('/dashboard/result-slider', [ResultSliderController::class, 'store'])->name('result.slider.submit');

    Route::get('/dashboard/result-slider/read', [ResultSliderController::class, 'read'])->name('result.slider.read');

    Route::delete('/dashboard/result-slider/{slider}', [ResultSliderController::class, 'delete'])->name('result.slider.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });


    // ------------------ about page --------------------------------
    Route::get('/dashboard/about', [AboutController::class, 'index'])->name('about');

    Route::post('/dashboard/about', [AboutController::class, 'store'])->name('about.submit');


    // ---------------------- services page ----------------------------
    Route::get('/dashboard/services', function () {
        return view('dashboard.services');
    })->name('services');

    Route::post('/dashboard/services', [ServiceController::class, 'store'])->name('services.submit');

    Route::get('/dashboard/services/read', [ServiceController::class, 'read'])->name('services.read');

    Route::delete('/dashboard/services/{service}', [ServiceController::class, 'delete'])->name('services.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });

    // ---------------------- books page ----------------------------
    Route::get('/dashboard/books', function () {
        return view('dashboard.books');
    })->name('books');

    Route::post('/dashboard/books', [BookController::class, 'store'])->name('books.submit');

    Route::get('/dashboard/books/read', [BookController::class, 'read'])->name('books.read');

    Route::delete('/dashboard/books/{book}', [BookController::class, 'delete'])->name('books.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });


    // ---------------- packages page ------------------------
    Route::get('/dashboard/packages', function () {
        return view('dashboard.packages');
    })->name('packages');

    Route::post('/dashboard/packages', [PackageController::class, 'store'])->name('packages.submit');

    Route::get('/dashboard/packages/read', [PackageController::class, 'read'])->name('packages.read');

    Route::delete('/dashboard/packages/{package}', [PackageController::class, 'delete'])->name('packages.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });

    // --------------- clients --------------------------
    Route::get('/dashboard/new-clients', [ClientController::class, 'new'])->name('clients.new');

    Route::get('/dashboard/current-clients', function () {
        return view('dashboard.clients.current-clients');
    })->name('clients.current');

    Route::get('/dashboard/books-clients', function () {
        return view('dashboard.clients.books-clients');
    })->name('clients.books');

    Route::get('/dashboard/old-clients', function () {
        return view('dashboard.clients.old-clients');
    })->name('clients.old');

    Route::get('/dashboard/future-clients', function () {
        return view('dashboard.clients.future-clients');
    })->name('clients.future');

    Route::get('/dashboard/new-clients/number', [ClientController::class, 'number_of_new_clients']);

    Route::get('/dashboard/current-clients/read', [ClientController::class, 'current'])->name('clients.current.read');

    Route::get('/dashboard/books-clients/read', [BookClientController::class, 'read'])->name('clients.books.read');

    Route::get('/dashboard/old-clients/read', [ClientController::class, 'old'])->name('clients.old.read');

    Route::get('/dashboard/future-clients/read', [ClientController::class, 'future'])->name('clients.future.read');

    Route::get('/dashboard/clients-info/{client}', function (Client $client) {
        $services = Service::get(['name', 'price']);
        $packages = Package::get(['name', 'price']);
        $all = $services->concat($packages);
        return view('dashboard.clients.client-info', [
            'client' => $client,
            'services' => $all
        ]);
    })->name('clients.info')->missing(function () {
        return response()->json([
            'error' => 'not found.'
        ]);
    });

    Route::delete('/dashboard/clients/{client}', [ClientController::class, 'delete'])->name('clients.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });

    Route::delete('/dashboard/books-clients/{bookClient}', [BookClientController::class, 'delete'])->name('booksclients.delete')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });

    Route::post('/dashboard/books-clients/{bookClient}/handle', [BookClientController::class, 'handle'])->name('booksclients.handle')->missing(function () {
        return response()->json([
            'error' => 'Recored Not Found.'
        ]);
    });

    Route::post('/dashboard/clients/{client}/handle', [ClientController::class, 'handle'])->name('clients.handle')->missing(function () {
        return response()->json([
            'error' => 'not found.'
        ]);
    });
});

//------------------------- Dashboard -------------------------------
