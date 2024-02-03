<?php

namespace App\Http\Controllers;

use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadershipsController extends Controller
{
    public function show(): View
    {
        $outstandingPeople = new OutstandingPeople();
        return view("layouts.leaderships", [
            "leaderships" => OutstandingPeople::where('category', 'leaderships')->latest()->paginate(12),
            'alphabet' => $outstandingPeople->alphabet(),
        ]);
    }

    public function sortingShow($letter): View
    {
        $outstandingPeople = new OutstandingPeople();
        $leadershipsResult = $outstandingPeople->gettingCategoryAndSearchingAlphabetically('leaderships', $letter);
        $alphabet = $outstandingPeople->alphabet();
        return view('layouts.leaderships', [
            'leaderships' => $leadershipsResult,
            'alphabet' => $alphabet,
        ]);
    }
}
