
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js"></script>
    <script src="./JS/textarea.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./JS/jqueryselects.js"></script>

    <title>Formulario Actividad 5</title>
</head>
<style>
    .padre > div {
        margin-left: 50px ;
        display: inline-block;
        margin-bottom: 20px;
    }
    label {
        color: #0a53be;
    }
    .error {
        color: #FF0000;
    }
    b{
        color: #0a53be;
    }
</style>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data" >
<div class="w3-panel w3-card-4 padre ">
        <h1>Solicitud de servicios</h1>
        <h2>DATOS ACTÚA COMO REPRESENTANTE</h2>
        <p>¿Actúa como representante?</p>  <span class="error"> <?php echo $tipousuarioErr;?></span>
        <div>
            <input class="w3-radio" <?php if (isset($tipousuario) && $tipousuario=="alumno") echo "checked";?> type="radio" id="actua" name="tipousuario" value="alumno">
            <label for="">Alumno/a</label>
        </div>
        <div>
            <input class ="w3-radio"  <?php if (isset($tipousuario) && $tipousuario=="representante") echo "checked";?> type="radio" id="actua" name="tipousuario" value="representante">
            <label for="">Representante</label>
        </div>
    </div>

    <div class="w3-panel w3-card-4 ">
        <h2>DATOS DEL REPRESENTANTE</h2>
        <div class="padre">
            <div>
                <label for="">Tipo de documento (*)</label>
                <select class="w3-select" id="" name="tipodocumento">
                    <option <?php if (isset($tipodocumento) && $tipodocumento =="nif") echo "selected";?> value="nif">NIF</option>
                    <option <?php if (isset($tipodocumento) && $tipodocumento =="nie") echo "selected";?> value="nie">NIE</option>
                </select>
            </div>
            <div>
                <label for="">Nº de indentificación (*)</label>
                <input class="w3-input" type="text" id="identificacion" name="identificacion" value="<?php echo $identificacion;?>" placeholder="Ej: 12345678Z / Z1234567X">
                <span class="error"> <?php echo $identificacionErr;?></span>
            </div>
            <div>
                <label for="">Nombre (*)</label>
                <input class="w3-input" type="text" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                <span class="error"> <?php echo $nombreErr;?></span>
            </div>
        </div>
        <div class="padre">
            <div>
                <label for="">Primer apellido (*)</label>
                <input class="w3-input" type="text" id="apellido1" name="apellido1" value="<?php echo $apellido1;?>">
                <span class="error"> <?php echo $apellido1Err;?></span>
            </div>
            <div>
                <label for="">Segundo apellido (*)</label>
                <input class="w3-input" type="text" id="apellido2" name="apellido2" value="<?php echo $apellido2;?>">
                <span class="error"> <?php echo $apellido2Err;?></span>
            </div>
        </div>
        <div class="padre">
            <div>
                <label for="">En calidad de: (*)</label>
                <select class="w3-select"  name="tipoRepresentante">
                    <option name= "" value=""> -- Seleccione --</option>
                    <option name= "padre" <?php if (isset($tipoRepresentante) && $tipoRepresentante =="padre") echo "selected";?> value="padre">Padre</option>
                    <option name= "madre" <?php if (isset($tipoRepresentante) && $tipoRepresentante =="madre") echo "selected";?> value="madre">Madre</option>
                    <option name= "tutorlegal" <?php if (isset($tipoRepresentante) && $tipoRepresentante =="tutorlegal") echo "selected";?> value="tutorlegal">Tutor Legal</option>
                </select>
                <span class="error"> <?php echo $tipoRepresentanteErr;?></span>
            </div>
            <div>
                <label for="">Teléfono fijo:</label>
                <input class="w3-input" type="text" id="" name="telefonofijo" value="<?php echo $telefonofijo;?>" placeholder="922000000">
                <span class="error"> <?php echo $telefonofijoErr;?></span>
            </div>
            <div>
                <label for="">Teléfono móvil: (*)</label>
                <input class="w3-input" type="text" id="" name="telefonomovil" placeholder="666000000" value="<?php echo $telefonomovil;?>">
                <span class="error"> <?php echo $telefonomovilErr;?></span>
            </div>
            <div>
                <label for="">Correo electrónico (*)</label>
                <input class="w3-input" type="text" id="" name="correo" placeholder="nombre@ejemplo.com" value="<?php echo $correo;?>">
                <span class="error"> <?php echo $correoErr;?></span>
            </div>
        </div>
    </div>

    <div class="w3-panel w3-card-4">
        <h2>DOMICILIO DE CONTACTO</h2>
        <div class="padre">
            <div>
                <label for="">Tipo de vía (*)</label>
                <select class="w3-select" id="" name="tipodevia">
                    <option <?php if (isset($tipodevia) && $tipodevia =="avenida") echo "selected";?> value="avenida">Avenida</option>
                    <option <?php if (isset($tipodevia) && $tipodevia =="calle") echo "selected";?> value="calle">Calle</option>
                    <option <?php if (isset($tipodevia) && $tipodevia =="plaza") echo "selected";?> value="plaza">Plaza</option>
                </select>
            </div>
            <div>
                <label for="">Nombre de vía: (*)</label>
                <input class="w3-input" type="text" id="" value="<?php echo $nombredevia;?>" name="nombredevia" >
                <span class="error"> <?php echo $nombredeviaErr;?></span>
            </div>
            <div>
                <label for="">Número: (*)</label>
                <input class="w3-input" type="text" id="" value="<?php echo $numerodevia;?>" name="numerodevia" >
                <span class="error"> <?php echo $numerodeviaErr;?></span>
            </div>
        </div>
        <div class="padre">
            <div>
                <label for="">Bloque:</label>
                <input class="w3-input" type="text" id="" value="<?php echo $bloquedevia;?>" name="bloquedevia" >
                <span class="error"> <?php echo $bloquedeviaErr;?></span>
            </div>
            <div>
                <label for="">Escalera:</label>
                <input class="w3-input" type="text" id="" value="<?php echo $escaleradevia;?>" name="escaleradevia" >

            </div>
            <div>
                <label for="">Piso:</label>
                <input class="w3-input" type="text" id="" value="<?php echo $pisodevia;?>" name="pisodevia" >
            </div>
            <div>
                <label for="">Portal:</label>
                <input class="w3-input" type="text" id="" value="<?php echo $portaldevia;?>" name="portaldevia" >
            </div>
            <div>
                <label for="">Letra:</label>
                <input class="w3-input"  type="text" id="" value="<?php echo $letradevia;?>"  name="letradevia" >
                <span class="error"> <?php echo $letradeviaErr;?></span>
            </div>
            <div>
                <label for="">Puerta:</label>
                <input class="w3-input" type="text" value="<?php echo $puertadevia;?>" id="" name="puertadevia" >
            </div>
        </div>
        <div id="test" class="padre">
            <div>
                <label for="">Complemento:</label>
                <input class="w3-input" type="text" value="<?php echo $complementodevia;?>" id="" name="complementodevia" >
            </div>
            <div>
                <label for="">Fecha:</label>
                <input class="w3-input" type="date" value="<?php echo $fecha;?>" id="" name="fecha" >
            </div>

            <div>
                <label for="">País: (*):</label>
                <?php echo generarSelect($paisesArray,"pais","","name_es","name_es"); ?>
            </div>
            <div>
                <label for="">Provincia: (*):</label>
                <?php echo generarSelect($provinciasArray,"provincia","provincia","provincia_id","nombre"); ?>
            </div>
        </div>

        <div class="padre">
            <div>
                <label for="">Isla: (*):</label>
                <?php echo generarSelect($islaArray,"isla","isla","isla_id","nombre"); ?>
            </div>
            <div>
                <label for="">Municipio: (*):</label>
                <?php  echo generarSelect($municipiosArray,"municipio","municipio","municipio_id","nombre"); ?>
            </div>
            <!--
                <label for="">Localidad: (*):</label>
                <?php // echo generarSelect($localidadArray); ?>
            -->
            <div>
                <label for="">Código postal (*):</label>
                <?php echo generarSelect($codigoPostalArray, "codigopostal","codigopostal","codigo_postal","codigo_postal"); ?>
            </div>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <h2>MAS DATOS</h2>
        <div>
            <input <?php if (isset($masdatos) && $masdatos=="huerfano") echo "checked";?> class="w3-radio" type="radio" id="masdatos" name="masdatos" value="huerfano">
            <label for="">El Alumno o alumna es huérfano absoluto</label>
        </div>
        <div>
            <input <?php if (isset($masdatos) && $masdatos=="tutelaAdministracion") echo "checked";?> class="w3-radio" type="radio" id="masdatos" name="masdatos" value="tutelaAdministracion">
            <label for="">El alumno se encuentra en régimen de tutela y guarda por la Administración</label>
        </div>
    </div>


    <div class="w3-panel w3-card-4 padre">
        <h2>AlERGIAS,PATOLOGÍAS O DIETAS ESPECIALES</h2>
        <div>
            <label for="">OTRAS ALERGIAS</label>
            <textarea id="basic-example" class="w3-input w3-border" name="otrasalergias" rows="10" cols="30">
                <?php   if(isset($_POST["otrasalergias"])) {
                    echo htmlentities ($_POST['otrasalergias']);
                }?>
            </textarea>
        </div>
    </div>


    <div class="w3-panel w3-card-4 padre">
        <!-- DATOS ACADÉMICOS DEL ALUMNO -->
        <h3>DATOS ACADÉMICOS DEL ALUMNO O ALUMNA</h3>
        <div>
            <b>Seleccione opción (seleccionar 1)</b> <span class="error"><?php echo $errorItinerario;?></span>
             <div>
                 <input <?php if (isset($itinerario) && $itinerario=="1") echo "checked";?> class="w3-radio" type="radio" name="itinerario" value="1"> ITINERARIO: CIENCIAS DE LA SALUD
             </div>
             <div>
                <input <?php if (isset($itinerario) && $itinerario=="2") echo "checked";?> class="w3-radio" type="radio" name="itinerario" value="2"> ITINERARIO: CIENTÍFICO-TECNOLÓGICO
             </div>
            <span class="errorItinerario"></span>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <div>
            <b>Bloque 1 (seleccionar 6) y ordenar por preferencia</b>
            <span class="error"><?php echo $errorB1;?></span>
            <div>
                 <input  <?php if (isset($_POST["bloque1"])) echo "checked";?> class="w3-check" type="checkbox" name="bloque1[]" value="1"> Lengua Castellana y Literatura I
            </div>
            <div>
                <input <?php if (isset($_POST["bloque1"])) echo "checked";?> class="w3-check" type="checkbox" name="bloque1[]" value="2"> Filosofía
            </div>
            <div>
                <input <?php if (isset($_POST["bloque1"])) echo "checked";?> class="w3-check" type="checkbox" name="bloque1[]" value="3"> Educación Física
            </div>
            <div>
                <input <?php if (isset($_POST["bloque1"])) echo "checked";?> class="w3-check" type="checkbox" name="bloque1[]" value="4"> Matemáticas I
            </div>
            <div>
                <input <?php if (isset($_POST["bloque1"])) echo "checked";?> class="w3-check" type="checkbox" name="bloque1[]" value="5"> Física y Química
            </div>
            <div>
                <input <?php if (isset($_POST["bloque1"])) echo "checked";?>  class="w3-check" type="checkbox" name="bloque1[]" value="6"> Tutoría
            </div>
            <div class="errorB1"></div>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <div>
            <b>Bloque 2 (seleccionar 1)</b><span class="error"><?php echo $errorB2;?></span>
            <div>
                <input <?php if (isset($bloque2) && $bloque2=="1") echo "checked";?>  class="w3-radio" type="radio" name="bloque2" value="1"> Primera lengua extranjera (inglés) I
            </div>
            <div>
                <input <?php if (isset($bloque2) && $bloque2=="2") echo "checked";?>  class="w3-radio" type="radio" name="bloque2" value="2"> Primera lengua extranjera (italiano) I
            </div>
            <div class="errorB2"></div>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <div>
            <b>Bloque 3 (seleccionar 1)</b><span class="error"><?php echo $errorB3;?></span>
            <div>
                <input <?php if (isset($bloque3) && $bloque3=="1") echo "checked";?> class="w3-radio" type="radio" name="bloque3" value="1"> Biología y Geología
            </div>
            <div>
                <input <?php if (isset($bloque3) && $bloque3=="2") echo "checked";?> class="w3-radio" type="radio" name="bloque3" value="2"> Dibujo Técnico I
            </div>
            <div class="errorB3"></div>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <div>
            <b>Bloque 4 (seleccionar 1)</b><span class="error"><?php echo $errorB4;?></span>
            <div>
                 <input <?php if (isset($bloque4) && $bloque4=="1") echo "checked";?> class="w3-radio" type="radio" name="bloque4" value="1"> Tecnología Industrial I
            </div>
            <div>
                <input <?php if (isset($bloque4) && $bloque4=="2") echo "checked";?> class="w3-radio" type="radio" name="bloque4" value="2"> Cultura Científica
            </div>
            <div>
                <input <?php if (isset($bloque4) && $bloque4=="3") echo "checked";?> class="w3-radio" type="radio" name="bloque4" value="3"> Segunda lengua extranjera (inglés) I
            </div>
            <div>
                <input <?php if (isset($bloque4) && $bloque4=="4") echo "checked";?> class="w3-radio" type="radio" name="bloque4" value="4"> Biología y Geología (E)
            </div>
            <div>
                <input <?php if (isset($bloque4) && $bloque4=="5") echo "checked";?> class="w3-radio" type="radio" name="bloque4" value="5"> Dibujo Técnico I (E)
            </div>
            <div class="errorB4"></div>
        </div>
    </div>

    <div class="w3-panel w3-card-4 padre">
        <div>
            <b>Bloque 5 (seleccionar 1)</b><span class="error"><?php echo $errorB5;?></span>
            <div>
                <input <?php if (isset($bloque5) && $bloque5=="1") echo "checked";?> class="w3-radio" type="radio" name="bloque5" value="1"> Religión Católica
            </div>
            <div>
                <input <?php if (isset($bloque5) && $bloque5=="2") echo "checked";?> class="w3-radio" type="radio" name="bloque5" value="2"> Tecnologías de la información y la comunicación I
            </div>
            <div class="errorB5"></div>
        </div>
    </div>

    <div  class="w3-panel w3-card-4 padre">
        <!-- MEDIOS DE DIFUSIÓN -->
        <h3>MEDIOS DE DIFUSIÓN</h3>
        <b><p>CONSENTIMIENTO INFORMADO DE TRATAMIENTO DE IMÁGENES/VOZ DEL ALUMNADO EN CENTROS DOCENTES DE TITULARIDAD PÚBLICA DE LA
                CONSEJERÍA DE EDUCACIÓN, UNIVERSIDADES, CULTURA Y DEPORTE</p>
            <p>De acuerdo con el Reglamento General de Protección de Datos y la Ley Orgánica 3/2018, de 5 diciembre, de Protección de Datos Personales y Garantías de
                los Derechos Digitales, mediante la firma del presente documento se presta voluntariamente el consentimiento inequívoco e informado y se autoriza
                expresamente al centro docente al "tratamiento de imagen / voz de actividdades de los centros de titularidad pública", mediante los siguiente medios (sólo se)
                entenderá que consiente la difusión de imágenes / voz por los medios expresamente marcados a continuación.</p></b>
        <span class="error"><?php echo $errorC1;?></span>
        <input <?php if (isset($cons1) && $cons1=="1") echo "checked";?> class="w3-radio" type="radio" name="cons1" value="1"><b>Consiente </b>
        <input <?php if (isset($cons1) && $cons1=="2") echo "checked";?> class="w3-radio" type="radio" name="cons1" value="2"><b>No consiente </b> <div class="errorC1"></div>

        <p>Página web del centro docente <span class="error"><?php echo $errorC2;?></span>
        <input <?php if (isset($cons2) && $cons2=="1") echo "checked";?> class="w3-radio" type="radio" name="cons2" value="1"><b>Consiente </b>
        <input <?php if (isset($cons2) && $cons2=="2") echo "checked";?> class="w3-radio" type="radio" name="cons2" value="2"><b>No consiente </b></p>
        <div class="errorC2"></div>

        <p>App de alumnados y familias <span class="error"><?php echo $errorC3;?></span>
        <input <?php if (isset($cons3) && $cons3=="1") echo "checked";?> class="w3-radio" type="radio" name="cons3" value="1"><b>Consiente </b>
        <input <?php if (isset($cons3) && $cons3=="2") echo "checked";?> class="w3-radio" type="radio" name="cons3" value="2"><b>No consiente </b></p>
        <div class="errorC3"></div>

        <p>Facebook <span class="error"><?php echo $errorC4;?></span>
        <input <?php if (isset($cons4) && $cons4=="1") echo "checked";?> class="w3-radio" type="radio" name="cons4" value="1"><b>Consiente </b>
        <input <?php if (isset($cons4) && $cons4=="2") echo "checked";?> class="w3-radio" type="radio" name="cons4" value="2"><b>No consiente </b></p>
        <div class="errorC4"></div>

        <p><b>El consentimiento aquí otorgado podrá ser revocado en cualquier momento ante el propio centro docente, teniendo en cuenta que dicha revocación no surtirá efectos retroactivos.</b></p>
    </div>

    <div  class="w3-panel w3-card-4 padre">
        <!-- DOCUMENTOS ADJUNTOS -->
        <h3>DOCUMENTOS ADJUNTOS</h3>
        <div>Aviso:
            <li>Los formatos permitidos son <b>jpg, png, txt, odt, jpeg, doc, docx</b></li>
            <li>El tamaño máximo por fichero es de <b>10 MB</b></li>
            <li>El nombre de los ficheros no debe incluir caracteres acentuados, caracteres con diéresis, la eñe o caracteres especiales: <b>! " # $ %  ' * + , . / ; < = > ? @ [ ] ( ) ^ ` { | }</b></li>
        </div>
        <h4>Lista de documentos pendientes</h4>
        <table>
            <tr>
                <th colspan="2">Documento</th>
            </tr>
            <tr>
                <td>DNI del alumno o alumna (o de los padres, madres o tutores legales del alumnado sin DNI) <b>(SOLO ALUMNADO NUEVO)</b></td>
                <td>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
                    <input  type="file" name="imgDNI"></td>

            </tr>
            <tr>
                <td>Para el alumnado procedente de otros centros, certificación académica del centro de origen en el que se especifique la promoción de curso o la terminación de estudios con propuesta para titulación</td>
                <td>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
                    <input type="file" name="imgCentro"></td>
            </tr>
        </table>
    </div>


    <div  class="w3-panel w3-card-4 padre" style="text-align: center">
        <!-- BOTONES DEL FORMULARIO -->
        <div>
            <input class="w3-button w3-blue" id="submit" type="submit" name="submit" value="COMPROBAR">
        </div>
        <div>
            <input class="w3-button w3-red" type="button" value="CANCELAR">
        </div>
    </div>
</form>
</body>
</html>
