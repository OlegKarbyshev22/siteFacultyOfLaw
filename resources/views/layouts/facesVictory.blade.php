@extends('layouts.app')
@section('content')

    <section class="memorialBook">
        <div class="container">

            <div class="alphabet">
                <a href="{{ url("leaderships") }}">ВСЕ</a>
                @foreach($alphabet as $letter)
                    <a href="{{ route('sort.facesVictory', ['letter' => $letter]) }}">{{ $letter }}</a>
                @endforeach
            </div>
            @if(count($facesVictory) > 0)
                <div class="image-container">
                    @foreach($facesVictory as $faceVictory)
                        <div class="wrap">
                            <div class="globalImage" data-fio="{{ $faceVictory->last_name . ' ' . $faceVictory->first_name . ' ' . $faceVictory->patronymic }}" data-description="{{$faceVictory->description}}">
                                <img src="{{ asset('storage/images/faces_of_victory/' . $faceVictory->path_image)}}" alt="">
                            </div>
                            <p class="FIO">{{ $faceVictory->last_name . " " . $faceVictory->first_name . " " . $faceVictory->patronymic }}</p>
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
            {{ $facesVictory->links('vendor.pagination.semantic-ui') }}
        </div>
    </section>
@endsection
