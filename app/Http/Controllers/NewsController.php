<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function send()
    {
        return view('layouts.offer_news');
    }

    public function store(Request $request)
    {

        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/faces_of_victory/', $filename);

            News::create([
                'author' => $request->input('author'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'path_image' => $filename,
                'status' => 'consideration'
            ]);
        } else {
            News::create([
                'author' => $request->input('author'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'path_image' => ' ',
                'status' => 'consideration',
            ]);
        }




            //dd($request);



        return redirect()->route('news.create')->with('success', 'Новость успешно добавлена!');
    }
}
