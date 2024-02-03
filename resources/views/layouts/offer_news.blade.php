@extends('layouts.app')
@section('content')
    <section id="insert_news">
        <div class="container">
            <h2>Отправить новость</h2>

                <form id="newsForm" class="wrapper" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="">Ваше имя</label>
                    <input name="author" type="text" required>
                    <label for="">Email</label>
                    <input name="email" type="email" required>
                    <label for="">Телефон</label>
                    <input name="phone" type="text" required>
                    <label for="">Заголовок</label>
                    <input name="title" type="text" required>
                    <label for="">Текст сообщения</label>
                    <textarea name="description" id="" cols="30" rows="2" required></textarea>
                    <label for="">Добавить изображение</label>
                    <input name="path_image" type="file">
                    <input class="send_news_button" type="submit">
                </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('newsForm');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Выполняйте AJAX-запрос для отправки формы
                var formData = new FormData(form);

                fetch(form.action, {
                    method: form.method,
                    body: formData
                })
                    .then(function (response) {
                        if (response.ok) {
                            // Форма была успешно отправлена
                            alert('Новость успешно отправлена! И будет опубликована после модерации!');
                            // Вы можете также выполнить другие действия здесь

                            // Очистите поля формы, если это необходимо
                            form.reset();
                        } else {
                            // Обработка ошибок, если необходимо
                            alert('Произошла ошибка при отправке формы.');
                        }
                    })
                    .catch(function (error) {
                        console.error('Ошибка при отправке формы:', error);
                    });
            });
        });
    </script>

@endsection
