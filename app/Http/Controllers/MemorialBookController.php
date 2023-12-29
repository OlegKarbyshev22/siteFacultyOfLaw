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
		return view("layouts.memorial_book", [
			"memorial_book" => OutstandingPeople::where('category', 'memorialBooks')->latest()->paginate(10)
		]);
	}
}
