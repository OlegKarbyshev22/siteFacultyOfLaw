<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengesNewAge extends Controller
{
    public function show(): View
    {
        return view("layouts.challenges_new_age", [
            "sections" => Content::all(),
        ]);
    }
}
