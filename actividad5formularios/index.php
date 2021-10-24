<?php
    include "modelo.php";
?>

<?php
$resultado = [];

$letradeviaErr = $bloquedeviaErr = $numerodeviaErr =$nombredeviaErr = $identificacionErr = $nombreErr = $telefonomovilErr = $correoErr = $tipousuarioErr = $tipoRepresentanteErr = $telefonofijoErr = $apellido1Err = $apellido2Err=  "";

$masdatos = $codigopostal = $municipio = $isla = $provincia =$paises = $otrasalergias = $fecha = $complementodevia = $puertadevia = $letradevia =$portaldevia = $pisodevia = $escaleradevia = $bloquedevia = $numerodevia =$nombredevia = $tipodevia = $telefonofijo = $tipodocumento = $identificacion = $nombre = $apellido1 = $tipoRepresentante = $apellido2 = $telefonomovil = $correo  = "";

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["tipousuario"])){
        $tipousuarioErr = "Seleccione el tipo de usuario";
        $errores[] = "Seleccinar el tipo de usuario es requerido";
    } else {
        $tipousuario = filtrado($_POST["tipousuario"]);
    }

    if (!empty($_POST["tipodocumento"])) {
        $tipodocumento = filtrado($_POST["tipodocumento"]);
    }

    if (empty($_POST["identificacion"])) {
        $identificacionErr = "Identificacion es requerido";
        $errores[] = "No se ha indicado la identificacion";
    } else {
        $identificacion = filtrado($_POST["identificacion"]);
    }

    if ( empty($_POST["nombre"])) {
        $nombreErr = "Nombre es requerido";
        $errores[] = "No se ha indicado el nombre o el formato no es correcto";
    } else {
        $nombre = filtrado($_POST["nombre"]);
        // comprobar si el nombre sólo contiene letras y espacios en blanco
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
            $nombreErr = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado el nombre o el formato no es correcto";
        }
    }

    if (empty($_POST["apellido1"])) {
        $apellido1Err = "Primer Apellido Requerido";
        $errores[] = "No se ha indicado el Primer Apellido o el formato no es correcto";
    } else {
        $apellido1 = filtrado($_POST["apellido1"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido1)) {
            $apellido1Err = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado el Primer Apellido o el formato no es correcto";
        }
    }

    if (empty($_POST["apellido2"])) {
        $apellido2Err = "Segundo Apellido Requerido";
        $errores[] = "No se ha indicado el Segundo Apellido o el formato no es correcto";
    } else {
        $apellido2 = filtrado($_POST["apellido2"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido2)) {
            $apellido2Err = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado el Segundo Apellido o el formato no es correcto";
        }
    }

    if (empty($_POST["tipoRepresentante"])) {
        $tipoRepresentanteErr = "Obligatorio seleccionar";
        $errores[] = "El Tipo de Representante es requerido";
    } else {
        $tipoRepresentante = filtrado($_POST["tipoRepresentante"]);
    }

    if(empty($_POST["telefonofijo"])){
        $telefonofijoErr = "";
    } else {
        if(!filter_var($_POST["telefonofijo"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>900000000, "max_range"=>999999999)))){
            $telefonofijoErr = "El formato del telefono fijo no es correcto";
            $errores[] = "No se ha indicado el telefono fijo o el formato no es correcto";
        } else {
            $telefonofijo = filtrado($_POST["telefonofijo"]);
        }
    }

    if(empty($_POST["telefonomovil"])){
        $telefonomovilErr = "Telefono movil es requerido";
        $errores[] = "No se ha indicado el telefono movil o el formato no es correcto";
    } else {
        $telefonomovil = filtrado($_POST["telefonomovil"]);
        if(!filter_var($_POST["telefonomovil"], FILTER_VALIDATE_INT, array("options" => array("min_range"=>600000000, "max_range"=>699999999)))){
            $telefonomovilErr = "El formato del telefono movil no es correcto";
            $errores[] = "No se ha indicado el telefono movil o el formato no es correcto";
        }
    }

    if(empty($_POST["correo"])){
        $correoErr = "Correo electronico requerido";
        $errores[] = "No se ha indicado email o el formato no es correcto";
    } else {
        $correo = filtrado($_POST["correo"]);
        if(!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)){
            $errores[] = "No se ha indicado email o el formato no es correcto";
        }
    }

    if(empty($_POST["tipodevia"])){
        $tipodevia = "";
    } else {
        $tipodevia = filtrado($_POST["tipodevia"]);

    }

    if(empty($_POST["nombredevia"])){
        $nombredevia = "";
    } else {
        $nombredevia = filtrado($_POST["nombredevia"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombredevia)) {
            $nombredeviaErr = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado el nombre de la via  o el formato no es correcto";
        } else {
            $nombredevia = filtrado($_POST["nombredevia"]);
        }
    }

    if(empty($_POST["numerodevia"])){
        $numerodevia = "";
    } else {
        $numerodevia = filtrado($_POST["numerodevia"]);
        if(!filter_var($_POST["numerodevia"], FILTER_VALIDATE_INT)) {
            $numerodeviaErr = "Solo Numeros permitidos";
            $errores[] = "No se ha indicado el numero de la via o el formato no es correcto";
        } else {
            $numerodevia = filtrado($_POST["numerodevia"]);
        }
    }

    if(empty($_POST["bloquedevia"])){
        $bloquedevia = "";
    } else {
        $bloquedevia = filtrado($_POST["bloquedevia"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$bloquedevia)) {
            $bloquedeviaErr = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado el bloque de la via  o el formato no es correcto";
        } else {
            $bloquedevia = filtrado($_POST["bloquedevia"]);
        }
    }

    if(empty($_POST["escaleradevia"])){
        $escaleradevia = "";
    } else {
        $escaleradevia = filtrado($_POST["escaleradevia"]);
    }

    if(empty($_POST["pisodevia"])){
        $pisodevia = "";
    } else {
        $pisodevia = filtrado($_POST["pisodevia"]);
    }


    if(empty($_POST["portaldevia"])){
        $portaldevia = "";
    } else {
        $portaldevia = filtrado($_POST["portaldevia"]);
    }


    if(empty($_POST["letradevia"])){
        $letradevia = "";
    } else {
        $letradevia = filtrado($_POST["letradevia"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$letradevia)) {
            $letradeviaErr = "Solo letras y espacios son permitidos";
            $errores[] = "No se ha indicado la letra o el formato no es correcto";
        } else {
            $letradevia = filtrado($_POST["letradevia"]);
        }
    }

    if(empty($_POST["puertadevia"])){
        $puertadevia = "";
    } else {
        $puertadevia = filtrado($_POST["puertadevia"]);
    }


    if(empty($_POST["complementodevia"])){
        $complementodevia = "";
    } else {
        $complementodevia = filtrado($_POST["complementodevia"]);
    }


    if(empty($_POST["fecha"])){
        $fecha = "";
    } else {
        $fecha = filtrado($_POST["fecha"]);
    }


    if(empty($_POST["pais"])){
        $paises = "";
    } else {
        $paises = filtrado($_POST["pais"]);
    }


    if(empty($_POST["provincia"])){
        $provincia = "";
    } else {
        $provincia = filtrado($_POST["provincia"]);
    }

    if(empty($_POST["isla"])){
        $isla = "";
    } else {
        $isla = filtrado($_POST["isla"]);
    }


    if(empty($_POST["municipio"])){
        $municipio = "";
    } else {
        $municipio = filtrado($_POST["municipio"]);
    }

    if(empty($_POST["codigopostal"])){
        $codigopostal = "";
    } else {
        $codigopostal = filtrado($_POST["codigopostal"]);
    }


    if(!(empty($_POST["masdatos"]))){
        $masdatos = filtrado($_POST["masdatos"]);
    }


    if(empty($_POST["otrasalergias"])){
        $otrasalergias = "";
    } else {
        $otrasalergias = filtrado($_POST["otrasalergias"]);
    }
}

?>


<?php
include "index2JuanCarlos.php";
?>



<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    // Si el array $errores está vacío, se añaden los datos en un array
    if(empty($errores)) {
        
        echo "Su solicitud será procesada. En breve nos pondremos en contacto con usted para facilitarle más información";

        $resultado += array("tipousuario" => $tipousuario = filtrado($_POST["tipousuario"]));
        $resultado += array("nombre" =>  $nombre = filtrado($_POST["nombre"]));
        $resultado += array("tipodocumento" =>  $tipodocumento = filtrado($_POST["tipodocumento"]));
        $resultado += array("identificacion" =>  $identificacion = filtrado($_POST["identificacion"]));
        $resultado += array("tipoRepresentante" =>  $tipoRepresentante = filtrado($_POST["tipoRepresentante"]));
        $resultado += array("telefonomovil" =>  $telefonomovil = filtrado($_POST["telefonomovil"]));


        $resultado += array("correo" =>  $correo = filtrado($_POST["correo"]));
        $resultado += array("telefonofijo" =>  $telefonofijo = filtrado($_POST["telefonofijo"]));
        $resultado += array("apellido1" =>  $apellido1 = filtrado($_POST["apellido1"]));
        $resultado += array("apellido2" =>  $apellido2 = filtrado($_POST["apellido2"]));
        $resultado += array("tipodevia" =>  $tipodevia = filtrado($_POST["tipodevia"]));
        $resultado += array("nombredevia" =>  $nombredevia = filtrado($_POST["nombredevia"]));
        $resultado += array("numerodevia" =>  $numerodevia = filtrado($_POST["numerodevia"]));
        $resultado += array("bloquedevia" =>  $bloquedevia = filtrado($_POST["bloquedevia"]));
        $resultado += array("escaleradevia" =>  $escaleradevia = filtrado($_POST["escaleradevia"]));
        $resultado += array("pisodevia" =>  $pisodevia = filtrado($_POST["pisodevia"]));
        $resultado += array("portaldevia" =>  $portaldevia = filtrado($_POST["portaldevia"]));
        $resultado += array("letradevia" =>  $letradevia = filtrado($_POST["letradevia"]));
        $resultado += array("puertadevia" => $puertadevia = filtrado($_POST["puertadevia"]));
        $resultado += array("complementodevia" =>  $complementodevia = filtrado($_POST["complementodevia"]));
        $resultado += array("fecha" =>  $fecha = filtrado($_POST["fecha"]));
        $resultado += array("pais" =>  $paises =   filtrado($_POST["pais"]));
        $resultado += array("provincia" =>  $provincia = filtrado($_POST["provincia"]));
        $resultado += array("isla" =>  $isla = filtrado($_POST["isla"]));
        $resultado += array("municipio" =>  $municipio =  filtrado($_POST["municipio"]));
        $resultado += array("codigopostal" =>  $codigopostal = filtrado($_POST["codigopostal"]));

        if(isset($_POST["masdatos"])) {
            $resultado += array("masdatos" =>  $masdatos = filtrado($_POST["masdatos"]));
        }

        $resultado += array("otrasalergias" =>  $otrasalergias = filtrado($_POST["otrasalergias"]));

        if(isset($_POST["itinerario"])) {
             $resultado += array("itinerario" =>  $itinerario = filtrado($_POST["itinerario"]));
        }

        if(isset($_POST["bloque2"])) {
             $resultado += array("bloque2" =>  $bloque2 = $_POST["bloque2"]);
        }
        if(isset($_POST["bloque3"])) {
            $resultado += array("bloque3" => $bloque3 = $_POST["bloque3"]);
        }
        if(isset($_POST["bloque4"])) {
            $resultado += array("bloque4" => $bloque4 = $_POST["bloque4"]);
        }
        if(isset($_POST["bloque5"])) {
            $resultado += array("bloque5" => $bloque5 = $_POST["bloque5"]);
        }
        if(isset($_POST["cons1"])) {
            $resultado += array("cons1" => $cons1 = $_POST["cons1"]);
        }
        if(isset($_POST["cons2"])) {
            $resultado += array("cons2" => $cons2 = $_POST["cons2"]);
        }
        if(isset($_POST["cons3"])) {
            $resultado += array("cons3" => $cons3 = $_POST["cons3"]);
        }
        if(isset($_POST["cons4"])) {
            $resultado += array("cons4" => $cons4 = $_POST["cons4"]);
        }


    }

    }

    file_put_contents("archivos/resultado.json", json_encode($resultado)); // Guardamos los resultado del array en un archivo json




?>

<ul>

    <?php if(isset($errores)){
        foreach ($errores as $error){
            echo "<li> $error </li>";
        }
    }
    ?>
</ul>



<?php
     include "views/vistaformulario.php";
?>

<?php
/*
 *  Mostrar los resultados al final de la página
 *
foreach ($resultado as $resultado => $resultado_valor){
    echo $resultado .": " .  $resultado_valor ."<br>";
}
*/
?>






