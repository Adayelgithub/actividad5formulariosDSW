<?php

function getDatos($fichero){

$datosJSON = file_get_contents($fichero); // Lee un fichero JSON y se lo asigna a una variable.
$datosArray = json_decode($datosJSON, true); // Función que convierte fichero JSON a variable.
return $datosArray;
}
// {"provincia_id": "02", "nombre": "Albacete"}
//[{"municipio_id": "01051", "provincia_id": "01", "cmun": "051", "dc": "3", "nombre": "Agurain/Salvatierra"},
// [{"isla_id": "071", "provincia_id": "07", "nombre": "Formentera"},
//[{"codigo_postal": "03657","municipio_id": 30043,"nombre": "Yecla"},
//{"name_en": "Spain", "name_es": "España","dial_code": "+34","code": "ES"},


$provinciasArray = getDatos("datos/provincias.json");
$municipiosArray = getDatos("datos/municipios.json");
$islaArray = getDatos("datos/islas.json");
$codigoPostalArray = getDatos("datos/codigopostal.json");
$paisesArray = getDatos("datos/paises.json");


function generarSelect ($datos, $name, $id, $value, $descripcion, $selected = ""){

$html = '';
$html =  "<select class = \"w3-select\"name='$name' id='$id'>";
    $html.= "<option value=''>Seleccione $name</option>";
    foreach ($datos as $dato) {
    $select = $selected == $dato[$value] ? "selected" : "";
    $html.= "<option  value='".$dato[$value]."' $select>".$dato[$descripcion]."</option>";
    }
    $html.= "</select>";
return $html;

}

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
