<?php

namespace App\Http\Controllers;

use App\Models\OutstandingPeople;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SoldierController extends Controller
{
    public function show(): View
	{
        $outstandingPeople = new OutstandingPeople();
		return view("layouts.participants", [
			'soldiers' => OutstandingPeople::where('category', 'soldiers')->latest()->paginate(12),
            'alphabet' => $outstandingPeople->alphabet(),
		]);
	}

    public function sortingShow($letter): View
    {
        $outstandingPeople = new OutstandingPeople();
        $soldiersResult = $outstandingPeople->gettingCategoryAndSearchingAlphabetically('soldiers', $letter);
        $alphabet = $outstandingPeople->alphabet();
        return view('layouts.participants', [
            'soldiers' => $soldiersResult,
            'alphabet' => $alphabet,
        ]);
    }
}
