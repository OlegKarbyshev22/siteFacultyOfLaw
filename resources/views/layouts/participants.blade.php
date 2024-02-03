@extends('layouts.app')
@section('content')

    <section class="gallery_SVO">
        <div class="container">
            <div class="alphabet">
                <a href="{{ url("participants_SVO") }}">ВСЕ</a>
                @foreach($alphabet as $letter)
                    <a href="{{ route('sort.soldiers', ['letter' => $letter]) }}">{{ $letter }}</a>
                @endforeach
            </div>

            @if(count($soldiers) > 0)
                <div class="image-container">
                    @foreach($soldiers as $soldier)
                        <div class="wrap">
                            <div class="globalImage" data-fio="{{ $soldier->last_name . ' ' . $soldier->first_name . ' ' . $soldier->patronymic }}" data-description="{{$soldier->description}}">
                                <img src="{{ asset('storage/images/soldiers/' . $soldier->path_image)}}" alt="">
                            </div>
                            <p class="FIO">{{ $soldier->last_name . " " . $soldier->first_name . " " . $soldier->patronymic }}</p>
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
            {{ $soldiers->links('vendor.pagination.semantic-ui') }}
        </div>
    </section>
@endsection
