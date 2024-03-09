/*
const editor = new Quill('#quill-editor', {
    bounds: '#quill-editor',
    modules: {
        toolbar: this.toolbarOptions
    },
    placeholder: 'Free Write...',
    theme: 'snow'
});


// quill editor add image handler
editor.getModule('toolbar').addHandler('image', () => {
    selectLocalImage();
});
*/


document.addEventListener('orchid:quill', (event) => {
    // Регистрация плагинов
    event.detail.quill.register("modules/imageCompressor", imageCompressor);

    // Параметры для инициализации
    event.detail.options.modules = {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'align': [] }],
            ['bold', 'italic', 'underline', 'strike'],        // текстовые стили
            [{ 'color': [] }, { 'background': [] }],          // цвет текста и фона
            [{ 'indent': '-1' }, { 'indent': '+1' }],         // отступы
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],    // списки
            ['blockquote'],                     // цитаты и блоки кода
            [{ 'direction': 'rtl' }],                          // направление текста
            [{ 'link': 'https://kniga.ulsu.ru' }, { 'image': 'https://kniga.ulsu.ru' }], // вставка ссылок и изображений
            ['clean']                                         // очистка форматирования
        ],
        imageCompressor: {
            quality: 0.9,
            maxWidth: 1000, // default
            maxHeight: 1000, // default
            imageType: 'image/jpeg'
        },
    };
});


