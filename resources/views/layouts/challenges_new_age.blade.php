@extends('layouts.app')
@section('content')
    <section id="challengesNewAge">
        <div class="container">

            <h2 class="title">Вызовы нового времени</h2>

            @foreach($sections as $section)
                <div class="cards">
                    <h4 class="card-title">{{$section->section->title}}</h4>
                    <img src="{{ asset('storage/images/challenges/' . $section->path_image )}}" style="max-height: 150px" alt="">

                    {!! htmlspecialchars_decode($section->description) !!}

                </div>
            @endforeach


        </div>
    </section>
@endsection
