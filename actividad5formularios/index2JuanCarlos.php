<?php
//Declaramos las variables que vamos a utilizar

 $itinerario = $bloque2 = $bloque3 = $bloque4 = $bloque5 = $cons1 = $cons2 = $cons3 = $cons4 = "";
$errorItinerario = $errorB2 = $errorB3 = $errorB4 = $errorB5 = $errorC1 = $errorC2 = $errorC3 = $errorC4 = "";
$bloque1 =  $errorB1 = "";
$contador = 0;
$imgDNI = $imgCentro = "";
$errorImgDNI = $errorImgCentro = "";

if (isset($_POST["submit"])) {
    /*** DATOS ACADÉMICOS DEL ALUMNO Y MEDIOS DE DIFUSIÓN (radio buttons) ***/

    //Validamos los radio buttons
    //      Itinerario
    if (empty($_POST["itinerario"])) {
        $errorItinerario = "Debe seleccionar una opción"; //Si está vacío da error

    }
    else {
        $itinerario = $_POST["itinerario"]; //Si está seleccionado recogemos el valor
    }

    //      Bloque 2
    if (empty($_POST["bloque2"])) {
        $errorB2 = "Debe seleccionar una opción";
    }
    else {
        $bloque2 = $_POST["bloque2"];
    }

    //      Bloque 3
    if (empty($_POST["bloque3"])) {
        $errorB3 = "Debe seleccionar una opción";
    }
    else {
        $bloque3 = $_POST["bloque3"];
    }

    //      Bloque 4
    if (empty($_POST["bloque4"])) {
        $errorB4 = "Debe seleccionar una opción";
    }
    else {
        $bloque4 = $_POST["bloque4"];
    }

    //      Bloque 5
    if (empty($_POST["bloque5"])) {
        $errorB5 = "Debe seleccionar una opción";
    }
    else {
        $bloque5 = $_POST["bloque5"];
    }

    //      Consentimiento 1
    if (empty($_POST["cons1"])) {
        $errorC1 = "Debe seleccionar una opción";
    }
    else {
        $cons1 = $_POST["cons1"];
    }

    //      Consentimiento 2
    if (empty($_POST["cons2"])) {
        $errorC2 = "Debe seleccionar una opción";
    }
    else {
        $cons2= $_POST["cons2"];
    }

    //      Consentimiento 3
    if (empty($_POST["cons3"])) {
        $errorC3 = "Debe seleccionar una opción";
    }
    else {
        $cons3 = $_POST["cons3"];
    }

    //      Consentimiento 4
    if (empty($_POST["cons4"])) {
        $errorC4 = "Debe seleccionar una opción";
    }
    else {
        $cons4 = $_POST["cons4"];
    }


    /*** DATOS ACADÉMICOS DEL ALUMNO Y MEDIOS DE DIFUSIÓN (checkbox bloque1) ***/

    //Validamos el checkbox
    if (!empty($_POST["bloque1"])) {
        foreach ($_POST["bloque1"] as $seleccionado) {
            $bloque1 .= $seleccionado." "; // Guardamos los valores seleccionados en la variable
            $contador++;
        }
        if ($contador != 6) {
            $errorB1 = "Debe marcar las 6 casillas.";
        }
    }
    else {
        $errorB1 = "Debe marcar las 6 casillas.";
    }

    /*** DOCUMENTOS ADJUNTOS ***/


        $directorioSubida = "archivos/";
        $max_file_size = "10485760"; // Tamaño en bytes.
        $extensionesValidas = array("jpg","png","txt","odt","pdf","jpeg","doc","docx");
        $erroresfiles = array();

        if(isset($_FILES['imgDNI']) && $_FILES["imgDNI"]["size"] > 1) {
            $nombreArchivo = $_FILES['imgDNI']['name'];
            $filesize = $_FILES['imgDNI']['size'];
            $directorioTemp = $_FILES['imgDNI']['tmp_name'];
            $tipoArchivo = $_FILES['imgDNI']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];

            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }

            if($filesize > $max_file_size){
                $errores[] = "La imagen debe de tener un tamaño inferior a 10 mb";
            }

            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = $identificacion . "-" . $nombreArchivo . rand(1, 100);
            // Desplazamos el archivo si no hay errores
            if(empty($errores)){
                $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
                move_uploaded_file($directorioTemp, $nombreCompleto);
                echo "El archivo se ha subido correctamente" . "<br>";
            }
        }
        if(isset($_FILES['imgCentro']) && $_FILES["imgCentro"]["size"] > 1) {
            $nombreArchivo = $_FILES['imgCentro']['name'];
            $filesize = $_FILES['imgCentro']['size'];
            $directorioTemp = $_FILES['imgCentro']['tmp_name'];
            $tipoArchivo = $_FILES['imgCentro']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];

            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }

            if($filesize > $max_file_size){
                $errores[] = "La imagen debe de tener un tamaño inferior a 10 mb";
            }

            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = $identificacion . "-" . $nombreArchivo . rand(1, 100);
            // Desplazamos el archivo si no hay errores
            if(empty($errores)){
                $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
                move_uploaded_file($directorioTemp, $nombreCompleto);
                echo "El archivo se ha subido correctamente" . "<br>";
            }
         }
}

?>
