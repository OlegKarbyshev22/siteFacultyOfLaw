@extends('layouts.app')
@section('content')

    <section class="memorialBook">
        <div class="container">

            <div class="alphabet">
                <a href="{{ url("memorial_book") }}">ВСЕ</a>
                @foreach($alphabet as $letter)
                    <a href="{{ route('sort.memorial_book', ['letter' => $letter]) }}">{{ $letter }}</a>
                @endforeach
            </div>
            @if(count($memorial_book) > 0)
            <div class="image-container">
                @foreach($memorial_book as $honorable_name)
                    <div class="wrap">
                        <div class="globalImage" data-fio="{{ $honorable_name->last_name . ' ' . $honorable_name->first_name . ' ' . $honorable_name->patronymic }}" data-description="{{$honorable_name->description}}">
                            <img src="{{ asset('storage/images/memorial_book/' . $honorable_name->path_image)}}" alt="">
                        </div>
                        <p class="FIO">{{ $honorable_name->last_name . " " . $honorable_name->first_name . " " . $honorable_name->patronymic }}</p>
                    </div>
                @endforeach
            </div>
            @else
                <p class="not_find_alert">Не найдено!</p>
            @endif
            <div class="popup-image">
                <span class="sp">&times;</span>
                <div class="alphabet">
                    <a href="{{ url("memorial_book") }}">ВСЕ</a>
                    @foreach($alphabet as $letter)
                        <a href="{{ route('sort.memorial_book', ['letter' => $letter]) }}">{{ $letter }}</a>
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
            {{ $memorial_book->links('vendor.pagination.semantic-ui') }}
       </div>




    </section>
@endsection
