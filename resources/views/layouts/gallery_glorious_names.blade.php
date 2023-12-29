@extends('layouts.app')
@section('content')
    <section id="gallery_glorious_names">
        <div class="container">
            <h2>Галерея славных имен</h2>
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
                </div> -->

				@foreach ($names_of_glory as $name)
					<div>
                        <img src = "{{ asset('storage/images/glorious_names/' . $name->path_image )}}" alt="">
						<p>{{ $name->last_name . " " . $name->first_name . " " . $name->patronymic }}</p>
					</div>
				@endforeach
            </div>
        </div>
    </section>
@endsection
