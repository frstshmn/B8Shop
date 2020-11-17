function showUpdateItemModal(id) {
    $('#editItemModal').modal('show');
    $.ajax({
        type: "GET",
        url: "item/edit/" + id,
        success: function(response) {
            item = JSON.parse(response);
            $('#item_id').val(item[0].id);
            $('#item_id_delete').val(item[0].id);
            $('#item_title').val(item[0].title);
            $('#item_price').val(item[0].price);
            $('#item_description').val(item[0].description);
            $('#item_consist').val(item[0].consist);
            $('#item_caring').val(item[0].caring);
            $('#item_size').children('option').each(function(index, option) {
                option = $(this);
                $.each(item['sizes'], function(index, size) {
                    if (option.val() == size.size_id) {
                        option.attr('selected', 'selected');
                    }
                });
                console.log($(this).val());
            });
            $('#item_category').children('option').each(function(index, option) {
                if ($(this).val() == item[0].category_id) {
                    $(this).attr('selected', 'selected');
                }
            });
        }
    });
}