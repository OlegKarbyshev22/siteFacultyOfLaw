@extends('layouts.app')
@section('content')
    <section id="memorialBook">
        <div class="container">
            <h2>Книга памяти</h2>
            <div class="wrapper">
                <!-- <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <a href=""><p>Разник Абрам Маркович</p></a>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
                <div>
                    <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                    <p>Разник Абрам Маркович</p>
                </div>
            </div> -->

			@foreach ($memorial_book as $honorable_name)
				<div>
                    <img src = "{{ $honorable_name->path_image }}" alt="">
                    <p>{{ $honorable_name->last_name . " " . $honorable_name->first_name . " " . $honorable_name->patronymic }}</p>
                </div>
			@endforeach
        </div>
    </section>
@endsection
