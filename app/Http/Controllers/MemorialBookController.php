<?php

namespace App\Http\Controllers;

use App\Models\MemorialBook;
use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemorialBookController extends Controller
{

    public function show(): View
    {
        $outstandingPeople = new OutstandingPeople();

        return view("layouts.memorial_book", [
            "memorial_book" => OutstandingPeople::where('category', 'memorialBooks')->latest()->paginate(12),
            'alphabet' => $outstandingPeople->alphabet(),
        ]);
    }

    public function sortingShow($letter): View
    {
        $outstandingPeople = new OutstandingPeople();
        $memorialBooksResult = $outstandingPeople->gettingCategoryAndSearchingAlphabetically('memorialBooks', $letter);
        $alphabet = $outstandingPeople->alphabet();
        return view('layouts.memorial_book', [
            'memorial_book' => $memorialBooksResult,
            'alphabet' => $alphabet,
        ]);
    }



}
