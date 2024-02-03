@extends('layouts.app')
@section('content')
    <section class="detail_news" id="news">
        <div class="container">
                @if($news->status == 'approved')
                    <div class="news-card">
                        <img src="{{ asset('storage/images/news/' . $news->path_image) }}" alt="News Image">
                        <div class="news-card-content">
                            <div class="news-card-title">{{ $news->title }}</div>
                            <div class="news" >{!! htmlspecialchars_decode($news->description) !!}</div>
                            <div class="news-card-date">{{ $news->created_at }}</div>
                        </div>
                    </div>
                @endif
        </div>
    </section>
@endsection
