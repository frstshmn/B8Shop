function checkDiscount() {
    $.ajax({
        type: "GET",
        url: "promocode/check/" + $('#promocode').val(),
        success: function(response) {
            $('#promocode').removeClass('text-danger');
            $('#promocode').addClass('text-success');
            $('#discount').text(response + '%');
            $('#total_order_price').text(parseInt($('#total_order_price').text()) - parseInt($('#total_order_price').text()) * (parseInt(response) / 100));
            //console.log(parseInt($('#total_order_price').text()) - parseInt($('#total_order_price').text()) * (parseInt(response) / 100));
        },
        error: function(response) {
            $('#promocode').removeClass('text-success');
            $('#promocode').addClass('text-danger');
            $('#discount').text('0%');
        }
    });
}