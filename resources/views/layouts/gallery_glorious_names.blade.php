@extends('layouts.app')
@section('content')

    <section class="memorialBook">
        <div class="container">
            <div class="alphabet">
                <a href="{{ url("gallery_glorious_names") }}">ВСЕ</a>
                @foreach($alphabet as $letter)
                    <a href="{{ route('sort.gallery_glorious_names', ['letter' => $letter]) }}">{{ $letter }}</a>
                @endforeach
            </div>
            @if(count($names_of_glory) > 0)
            <div class="image-container">
                @foreach($names_of_glory as $name)
                    <div class="wrap">
                        <div class="globalImage" data-fio="{{ $name->last_name . ' ' . $name->first_name . ' ' . $name->patronymic }}" data-description="{{$name->description}}">
                            <img src="{{ asset('storage/images/glorious_names/' . $name->path_image)}}" alt="">
                        </div>
                        <p class="FIO">{{ $name->last_name . " " . $name->first_name . " " . $name->patronymic }}</p>
                    </div>
                @endforeach
            </div>
            @else
                <p class="not_find_alert">Не найдено!</p>
            @endif
            <div class="popup-image">
                <span>&times;</span>
                <div class="popup-content">
                    <p class="popup-fio"></p>
                    <img src="" alt="">
                    <p class="popup-description"></p>
                </div>


            </div>
        </div>
        <div style="text-align: center; padding: 10px; color: blue; text-decoration: none; font-size: 20px">
            {{ $names_of_glory->links('vendor.pagination.semantic-ui') }}
        </div>
    </section>
@endsection

