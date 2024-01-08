<?php

use App\Http\Controllers\ChallengesNewAge;
use App\Http\Controllers\MemorialBookController;
use App\Http\Controllers\NamesOfGloryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SoldierController;
use App\Models\LawInTime;
use App\Models\OutstandingPeople;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, "show"])->name('news.main');

Route::get('/legalEducation', function () {
    return view('layouts.legal_education', [
		"heroes" => OutstandingPeople::where('category', 'FacesVictory')->latest()->paginate(10),
		"personel" => OutstandingPeople::where('category', 'leaderships')->latest()->paginate(10),
        "lawEducation" => LawInTime::all(),
	]);
});

Route::get('/gallery_glorious_names', [NamesOfGloryController::class, "show"]);
Route::get('/participants_SVO', [SoldierController::class, "show"]);
Route::get('/memorial_book', [MemorialBookController::class, "show"]);
Route::get('/challenges_new_age', [ChallengesNewAge::class, "show"]);
Route::get('/send_news', [NewsController::class, 'send'])->name('news.create');
Route::post('/send_news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('/news_detail/{id}', [NewsController::class, 'detail'])->name('news.detail');

