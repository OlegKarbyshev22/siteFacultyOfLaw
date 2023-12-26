@extends('layouts.app')
@section('content')
    <section id="insert_news">
        <div class="container">
            <h2>Отправить новость</h2>

                <form class="wrapper" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="">Ваше имя</label>
                    <input name="author" type="text">
                    <label for="">Email</label>
                    <input name="email" type="email">
                    <label for="">Телефон</label>
                    <input name="phone" type="text">
                    <label for="">Заголовок</label>
                    <input name="title" type="text">
                    <label for="">Текст сообщения</label>
                    <textarea name="description" id="" cols="30" rows="2">
                    </textarea>
                    <label for="">Добавить изображение</label>
                    <input name="path_image" type="file">
                    <input type="submit">
                </form>
        </div>
    </section>
@endsection
