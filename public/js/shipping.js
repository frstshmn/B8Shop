$(document).ready(function() {
    $("#city").select2();
});

// $("#shipping").change(function(e) {
//     e.preventDefault();
//     if ($(this).val() == 'nova_poshta') {
//         var data = JSON.stringify({
//             "modelName": "Address",
//             "calledMethod": "getCities",
//             "apiKey": "520ff1e4f5d575478b353c9fbc7918fe"
//         });
//         $.ajax({
//             async: true,
//             crossDomain: true,
//             type: "POST",
//             url: "https://api.novaposhta.ua/v2.0/json/",
//             data: data,
//             headers: {
//                 "content-type": "application/json"
//             },
//             success: function(response) {
//                 $("#city").empty();
//                 $.each(response.data, function(index, value) {
//                     $("#city").append("<option value=" + value.Ref + ">" + value.Description + "</option>")
//                 })
//             }
//         });
//     }
// });

$("#city").change(function(e) {
    e.preventDefault();
    var data = JSON.stringify({
        "modelName": "AddressGeneral",
        "calledMethod": "getWarehouses",
        "apiKey": "520ff1e4f5d575478b353c9fbc7918fe",
        "methodProperties": {
            "CityRef": $("#city").val(),
        }
    });
    console.log($("#city").val());
    $.ajax({
        async: true,
        crossDomain: true,
        type: "POST",
        url: "https://api.novaposhta.ua/v2.0/json/",
        data: data,
        headers: {
            "content-type": "application/json"
        },
        success: function(response) {
            $("#warehouse").empty();
            $.each(response.data, function(index, value) {
                $("#warehouse").append("<option value=" + value.Ref + ">" + value.Description + "</option>")
            })
        }
    });
});