<?php

namespace App\Http\Controllers;

use App\Models\OutstandingPeople;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SoldierController extends Controller
{
    public function show(): View
	{
		return view("layouts.participants", [
			'soldiers' => OutstandingPeople::where('category', 'soldiers')->latest()->paginate(10)
		]);
	}
}
