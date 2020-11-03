$('.gallery-item').click(function (e) {
    e.preventDefault();
    $('#mainPhoto').attr('src', $(this).attr('src'));
});
