<?php

namespace App\Http\Controllers;

use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaceOfVictoryController extends Controller
{
    public function show(): View
    {
        $outstandingPeople = new OutstandingPeople();
        return view("layouts.facesVictory", [
            "facesVictory" => OutstandingPeople::where('category', 'facesVictory')->latest()->paginate(12),
            'alphabet' => $outstandingPeople->alphabet(),
        ]);
    }

    public function sortingShow($letter): View
    {
        $outstandingPeople = new OutstandingPeople();
        $facesVictoryResult = $outstandingPeople->gettingCategoryAndSearchingAlphabetically('facesVictory', $letter);
        $alphabet = $outstandingPeople->alphabet();
        return view('layouts.facesVictory', [
            'facesVictory' => $facesVictoryResult,
            'alphabet' => $alphabet,
        ]);
    }
}
