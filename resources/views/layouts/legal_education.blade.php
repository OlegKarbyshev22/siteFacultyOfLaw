@extends('layouts.app')
@section('content')
    <section id="law">
        <div class="container">
            <h2>Юридическое образование Ульяновской области в контексте времени</h2>
            <div class="law_wrapper">
                @foreach($lawEducation as $law)
                    <div class="law_in_context_time">
                        <img src="{{ asset('storage/images/lawInTime/' . $law->path_image )}}" alt="">
                        <p>{{$law->title}}</p>
                    </div>
                @endforeach
            </div>
            <div class="legalEd">
                @foreach($legalEducationContent as $content)
                    <p>{!! htmlspecialchars_decode($content->description) !!}</p>
                @endforeach
            </div>
        </div>
    </section>
@endsection
