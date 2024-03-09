@extends('layouts.app')
@section('content')

    <section class="memorialBook">
        <div class="container">
            <div class="alphabet">
                <a href="{{ url("leaderships") }}">ВСЕ</a>
                @foreach($alphabet as $letter)
                    <a href="{{ route('sort.leaderships', ['letter' => $letter]) }}">{{ $letter }}</a>
                @endforeach
            </div>
            @if(count($leaderships) > 0)
                <div class="image-container">
                    @foreach($leaderships as $leadership)
                        <div class="wrap">
                            <div class="globalImage" data-fio="{{ $leadership->last_name . ' ' . $leadership->first_name . ' ' . $leadership->patronymic }}" data-description="{{$leadership->description}}">
                                <img src="{{ asset('storage/images/leaderships/' . $leadership->path_image)}}" alt="">
                            </div>
                            <p class="FIO">{{ $leadership->last_name . " " . $leadership->first_name . " " . $leadership->patronymic }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="not_find_alert">Не найдено!</p>
            @endif
            <div class="popup-image">
                <span class="sp">&times;</span>
                <div class="alphabet">
                    <a href="{{ url("leaderships") }}">ВСЕ</a>
                    @foreach($alphabet as $letter)
                        <a href="{{ route('sort.leaderships', ['letter' => $letter]) }}">{{ $letter }}</a>
                    @endforeach
                </div>
                <div class="popup-content">
                    <p class="popup-fio"></p>
                    <img class="picture" src="" alt="">
                    <p class="popup-description"></p>
                </div>

            </div>
        </div>

        <div style="text-align: center; padding: 10px; color: blue; text-decoration: none; font-size: 20px">
            {{ $leaderships->links('vendor.pagination.semantic-ui') }}
        </div>




    </section>
@endsection
