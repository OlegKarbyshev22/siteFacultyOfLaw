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
            $file->storeAs('public/images/news/', $filename);

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

        return redirect()->route('news.create')->with('success', 'Новость успешно добавлена!');
    }

    public function accept(News $news)
    {

        $news->update(['status' => 'approved']);

        // Редирект или другая логика в зависимости от вашего случая
        return redirect()->route('platform.get_news', $news);
    }
}
