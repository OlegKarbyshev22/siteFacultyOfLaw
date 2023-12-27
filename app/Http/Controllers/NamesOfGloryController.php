<?php

namespace App\Http\Controllers;

use App\Models\Glorious_name;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NamesOfGloryController extends Controller
{
    public function show(): View 
	{
		return view("layouts.gallery_glorious_names", [
			"names_of_glory" => Glorious_name::all()
		]);
	}
}
