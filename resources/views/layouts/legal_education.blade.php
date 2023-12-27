@extends('layouts.app')
@section('content')
    <section id="law">
        <div class="container">
            <h2>Юридическое образование Ульяновской области в контексте времени</h2>
            <div class="law_wrapper">
                <div class="law_in_context_time">
                    <img src="/images/Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg" alt="">
                    <p>1974-1999 годы: УКП ВЮЗИ</p>
                </div>
                <div class="law_in_context_time">
                    <img src="/images/Вручение студ билета и зач кн первым студентам - 1974 г. Михаилу Юртанову.jpg" alt="">
                    <p>1999-1999 годы: филиал МГЮА</p>
                </div>
                <div class="law_in_context_time">
                    <img src="/images/Госы Жданов Ф.В. - в центре, слева Боголов, справа Караулов В.Ф. 1979 год.jpg" alt="">
                    <p>1999-2009 годы: Институт права и государственной службы УлГУ</p>
                </div>
                <div class="law_in_context_time">
                    <img src="/images/Вручение почет грамоты первой выпускнице ВЮЗИ Овсянниковой_jHfa0bz.jpg" alt="">
                    <p>2009-2023 годы: Юридический факультет УлГУ</p>
                </div>
            </div>
            <h2>ЛИЦА ПОБЕДЫ</h2>
            <div class="faces_of_victory">
                <div class="owl-carousel owl-theme">
                    <!-- <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>Разник Абрам Маркович</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>Лагушкин Виктор Павлович</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>Пермяков</p>
                    </div> -->

					@foreach ($heroes as $hero)
						<div class = "item">
							<img src = "{{ $hero->path_image }}" alt = "">
							<p>{{ $hero->last_name . " " . $hero->first_name . " " . $hero->patronymic }}</p>
						</div>
					@endforeach
                </div>
            </div>
            <h2>Руководители от УКП ВЮЗИ до Юридического факультета</h2>
            <div class="management">
                <div class="owl-carousel owl-theme">
                    <!-- <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>-</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>-</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>-</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>-</p>
                    </div>
                    <div class="item">
                        <img src="/images/lovepik-business-men-in-suits-picture_501462426.jpg" alt="">
                        <p>-</p>
                    </div> -->

					@foreach ($personel as $manager)
						<div class = "item">
							<img src = "{{ $manager->path_image }}" alt = "">
							<p>{{ $manager->last_name . " " . $manager->first_name . " " . $manager->patronymic }}</p>
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
