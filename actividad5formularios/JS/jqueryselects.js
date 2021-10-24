
    $(document).ready(function () {
    var municipios = [];

    var islas = [];

    var codigopostal = [];

    $.getJSON("datos/provincias.json", function (provincias) {
    $.each(provincias, function (indice, dato) {
    $('#provincia').append($('<option></option>').attr('value', dato.provincia_id).text(dato.nombre));
})
});

    $.getJSON("datos/municipios.json", function (data) {
    municipios = data;
});

    $.getJSON("datos/islas.json", function (data) {
    islas = data;
});

    $.getJSON("datos/codigopostal.json", function (data) {
    codigopostal = data;
});


    $("#provincia").change(function () {
    $('#municipio').empty();
    $.each(municipios, function (indice, dato) {
    if ($("#provincia").val() == dato.provincia_id) {
    $('#municipio').append($('<option></option>').attr('value', dato.municipio_id).text(dato.nombre));
}
})
})

    $("#provincia").change(function () {
    $('#isla').empty();
    $.each(islas, function (indice, dato) {
    if ($("#provincia").val() == dato.provincia_id) {
    $('#isla').append($('<option></option>').attr('value', dato.isla_id).text(dato.nombre));
}
})
})

    $("#municipio").change(function () {
    $('#codigopostal').empty();
    $.each(codigopostal, function (indice, dato) {
    if ($("#municipio").val() == dato.municipio_id) {
    $('#codigopostal').append($('<option></option>').attr('value', dato.codigo_postal).text(dato.codigo_postal));
}
})
})
});
