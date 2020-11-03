$("#control-button-minus").click(function (e) {
    e.preventDefault();
    if (parseInt($("#quantity").val())<=1) {
        $("#quantity").val(1);
    } else {
        $("#quantity").val(parseInt($("#quantity").val())-1);
    }
});

$("#control-button-plus").click(function (e) {
    e.preventDefault();
    if (parseInt($("#quantity").val())>=99) {
        $("#quantity").val(99);
    } else {
        $("#quantity").val(parseInt($("#quantity").val())+1);
    }
});

