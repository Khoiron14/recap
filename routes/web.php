<?php

use App\Models\Recap;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        $todayRecapNotAvailable = Recap::isTodayRecapNotAvailable();
        return view('dashboard', compact('todayRecapNotAvailable'));
    });

    Route::get('/recaps/{recap}', function (Recap $recap) {
        return view('show-recap', compact('recap'));
    })->name('recap.show');
});
