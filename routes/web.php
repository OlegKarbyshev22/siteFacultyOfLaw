<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengesNewAge;
use App\Http\Controllers\FaceOfVictoryController;
use App\Http\Controllers\LeadershipsController;
use App\Http\Controllers\MemorialBookController;
use App\Http\Controllers\NamesOfGloryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SoldierController;
use App\Models\LawInTime;
use App\Models\legalEducationContent;
use App\Models\OutstandingPeople;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Orchid\Platform\Http\Controllers\LoginController;

Route::get('/', [NewsController::class, "show"])->name('news.main');

Route::get('/legalEducation', function () {
    return view('layouts.legal_education', [
        "lawEducation" => LawInTime::all(),
        "posts_list" => Post::latest()->paginate(10)
	]);
});

Route::get('/gallery_glorious_names', [NamesOfGloryController::class, "show"]);
Route::get('/participants_SVO', [SoldierController::class, "show"]);
Route::get('/memorial_book', [MemorialBookController::class, "show"]);
Route::get('/challenges_new_age', [ChallengesNewAge::class, "show"]);
Route::get('/leaderships', [LeadershipsController::class, "show"]);
Route::get('/facesVictory', [FaceOfVictoryController::class, "show"]);
Route::get('/send_news', [NewsController::class, 'send'])->name('news.create');
Route::post('/send_news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('/news_detail/{id}', [NewsController::class, 'detail'])->name('news.detail');

Route::get('/memorial_book/{letter}', [MemorialBookController::class, 'sortingShow'])->name('sort.memorial_book');
Route::get('/participants_SVO/{letter}', [SoldierController::class, 'sortingShow'])->name('sort.soldiers');
Route::get('/gallery_glorious_names/{letter}', [NamesOfGloryController::class, 'sortingShow'])->name('sort.gallery_glorious_names');
Route::get('/leaderships/{letter}', [LeadershipsController::class, "sortingShow"])->name('sort.leaderships');
Route::get('/facesVictory/{letter}', [FaceOfVictoryController::class, "sortingShow"])->name('sort.facesVictory');
