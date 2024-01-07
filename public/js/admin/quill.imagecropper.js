document.addEventListener('orchid:quill', (event) => {
    // Object for registering plugins
    event.detail.quill.register("modules/imageCompressor", imageCompressor);

    // Parameter object for initialization
    event.detail.options.modules = {
        imageCompressor: {
            quality: 0.9,
            maxWidth: 100, // default
            maxHeight: 100, // default
            imageType: 'image/jpeg'
        }
    };
});
