@extends('layouts.app')
@section('content')
    <section id="gallery_SVO">
        <div class="container">
            <h2>Участники СВО</h2>
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

			@foreach ($soldiers as $soldier)
				<div>
                    <img src = "{{ asset('storage/images/soldiers/' . $soldier->path_image )}}" alt="">
                    <p>{{ $soldier->last_name . " " . $soldier->first_name . " " . $soldier->patronymic }}</p>
                </div>
			@endforeach
        </div>
    </section>
@endsection
