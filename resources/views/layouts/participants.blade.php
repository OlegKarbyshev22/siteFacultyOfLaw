@extends('layouts.app')
@section('content')
    <section id="gallery_SVO">
        <div class="container">
            <h2>Участники СВО</h2>
            <div class="wrapper">
			@foreach ($soldiers as $soldier)
				<div>
                    <img src = "{{ asset('storage/images/soldiers/' . $soldier->path_image )}}" alt="">
                    <p>{{ $soldier->last_name . " " . $soldier->first_name . " " . $soldier->patronymic }}</p>
                </div>
			@endforeach
            </div>
            <div style="text-align: center; padding: 10px; color: blue; text-decoration: none; font-size: 20px">
                {{ $soldiers->links('vendor.pagination.semantic-ui') }}
            </div>
        </div>
    </section>
@endsection
