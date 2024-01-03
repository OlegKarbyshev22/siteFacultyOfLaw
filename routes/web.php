<?php

use App\Http\Controllers\ChallengesNewAge;
use App\Http\Controllers\MemorialBookController;
use App\Http\Controllers\NamesOfGloryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SoldierController;
use App\Models\FacesVictory;
use App\Models\Leadership;
use App\Models\News;
use App\Models\OutstandingPeople;
use App\Models\Soldier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [NewsController::class, "show"]);

Route::get('/legalEducation', function () {
    return view('layouts.legal_education', [
		"heroes" => OutstandingPeople::where('category', 'FacesVictory')->latest()->paginate(10),
		"personel" => OutstandingPeople::where('category', 'leaderships')->latest()->paginate(10)
	]);
});

Route::get('/gallery_glorious_names', [NamesOfGloryController::class, "show"]);
Route::get('/participants_SVO', [SoldierController::class, "show"]);
Route::get('/memorial_book', [MemorialBookController::class, "show"]);
Route::get('/challenges_new_age', [ChallengesNewAge::class, "show"]);

Route::get('/send_news', [NewsController::class, 'send'])->name('news.create');
Route::post('/send_news/store', [NewsController::class, 'store'])->name('news.store');

