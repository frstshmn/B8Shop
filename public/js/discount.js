function checkDiscount() {
    $.ajax({
        type: "GET",
        url: "promocode/check/" + $('#promocode').val(),
        success: function(response) {
            $('#promocode').removeClass('text-danger');
            $('#promocode').addClass('text-success');
            $('#discount').text(response + '%');
        },
        error: function(response) {
            $('#promocode').removeClass('text-success');
            $('#promocode').addClass('text-danger');
            $('#discount').text('0%');
        }
    });
}