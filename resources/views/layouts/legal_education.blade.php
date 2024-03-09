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
            {{--<div class="legalEd">
                @foreach($legalEducationContent as $content)
                    <p>{!! htmlspecialchars_decode($content->description) !!}</p>
                @endforeach
            </div>--}}
            @foreach($posts_list as $post)
            <div class="news-card">
                <div class="news-card-content">
                    <div class="news-card-title" style="text-align: center">{{ $post->title }}</div>
                    <div style="text-align: justify;">{!! htmlspecialchars_decode($post->description) !!}</div>
                </div>
            </div>
            @endforeach
            <div style="text-align: center; padding: 10px; color: blue; text-decoration: none; font-size: 20px">
                {{ $posts_list->links('vendor.pagination.semantic-ui') }}
            </div>
        </div>
    </section>
@endsection
