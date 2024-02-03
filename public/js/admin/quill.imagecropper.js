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



