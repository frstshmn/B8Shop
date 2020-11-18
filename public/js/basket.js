$('.item-price').each(function() {
    subtotal_price = parseInt($('#subtotal_order_price').text().substring(1));

    item_price = parseInt($(this).text().substring(1));

    $('#subtotal_order_price').text("$" + (subtotal_price + item_price));

    $('#total_order_price').text("$" + (parseInt($('#subtotal_order_price').text().substring(1)) + parseInt($('#shipping').text().substring(1))));
});

function deleteItem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/orderlist/" + id,
        success: function(response) {
            location.reload();
        },
        error: function(response) {
            alert(response);
        }
    });
}

function qtyIncrease(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: "/orderlist/increase/" + id,
        success: function(response) {
            location.reload();
        },
        error: function(response) {
            alert(response);
        }
    });
}

function qtyDecrease(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: "/orderlist/decrease/" + id,
        success: function(response) {
            location.reload();
        },
        error: function(response) {
            alert(response);
        }
    });
}