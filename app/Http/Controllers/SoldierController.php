<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SoldierController extends Controller
{
    public function show(): View
	{
		return view("layouts.participants", [
			'soldiers' => Soldier::all()
		]);
	}
}
