@extends('layouts.app')
@section('content')
    <section id="memorialBook">
        <div class="container">
            <h2>Книга памяти</h2>
            <div class="wrapper">
			@foreach ($memorial_book as $honorable_name)
				<div>
                    <img src = "{{ asset('storage/images/memorial_book/' . $honorable_name->path_image )}}" alt="">
                    <p>{{ $honorable_name->last_name . " " . $honorable_name->first_name . " " . $honorable_name->patronymic }}</p>
                </div>
			@endforeach
        </div>
            <div style="text-align: center; padding: 10px; color: blue; text-decoration: none; font-size: 20px">
                {{ $memorial_book->links('vendor.pagination.semantic-ui') }}
            </div>
        </div>
    </section>
@endsection
