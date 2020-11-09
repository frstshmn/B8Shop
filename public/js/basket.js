$('.item-price').each(function() {
    let subtotal_price = $('#subtotal_order_price').text().substring(1);
    subtotal_price = parseInt(subtotal_price);
    console.log(subtotal_price);

    let item_price = $(this).text().substring(1);
    item_price = parseInt(item_price);
    console.log(item_price);

    $('#subtotal_order_price').text(subtotal_price + item_price);

});

function deleteItem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/order/" + id,
        success: function(response) {
            location.reload();
        },
        error: function(response) {
            alert(response);
        }
    });
}