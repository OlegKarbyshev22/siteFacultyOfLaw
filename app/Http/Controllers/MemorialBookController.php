<?php

namespace App\Http\Controllers;

use App\Models\MemorialBook;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemorialBookController extends Controller
{
    public function show(): View 
	{
		return view("layouts.memorial_book", [
			"memorial_book" => MemorialBook::all()
		]);
	}
}
