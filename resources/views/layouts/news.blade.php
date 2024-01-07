@extends('layouts.app')
@section('content')
	<section id="news">
		<div class="container">
			<h1>Новости</h1>
			@foreach ($news_list as $news)
				@if($news->status == 'approved')
					<div class="news-card">
						<img src="{{ asset('storage/images/news/' . $news->path_image) }}" alt="News Image">
						<div class="news-card-content">
							<div class="news-card-title">{{ $news->title }}</div>
							<div class="news-card-date">{{ $news->created_at }}</div>
							<div class="news-card-text">{!! htmlspecialchars_decode($news->description) !!}</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</section>
@endsection
