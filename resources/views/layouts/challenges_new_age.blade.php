@extends('layouts.app')
@section('content')
    <section id="challengesNewAge">
        <div class="container">

            <h2 class="title">Вызовы нового времени</h2>

            @foreach($sections as $section)
                <div class="cards" style="color: white">
                    <h4 class="card-title">{{$section->section->title}}</h4>
                    @if($section->path_image != NULL)
                    <img src="{{ asset('storage/images/challenges/' . $section->path_image )}}" style="max-height: 150px" alt="">
                    @endif
                    <div class="cards_text">{!! htmlspecialchars_decode($section->description) !!}</div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
