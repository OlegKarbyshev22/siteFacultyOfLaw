$('.owl-carousel').owlCarousel({

    margin:10,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});

document.querySelectorAll('.image-container .globalImage').forEach(imageContainer => {
    imageContainer.onclick = () => {
        const popup = document.querySelector('.popup-image');
        const popupFIO = popup.querySelector('.popup-fio');
        const fio = imageContainer.getAttribute('data-fio');

        const popupDescription = popup.querySelector('.popup-description');
        const description = imageContainer.getAttribute('data-description');

        popup.style.display = 'block';
        popupFIO.textContent = fio;
        popupDescription.innerHTML  = description;

        popup.querySelector('img').src = imageContainer.querySelector('img').getAttribute('src');
        document.querySelector('html').style.overflowY = 'hidden';
    }
});

document.querySelector('.popup-image span').onclick = () => {
    document.querySelector('.popup-image').style.display = 'none';
    document.querySelector('.popup-image').style.display = 'none';
    document.querySelector('html').style.overflowY = 'auto';
}
