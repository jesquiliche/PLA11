<?php

//Función que valida el Email develovera True o false, dependiendo si el valor
// es correcto o no
function validateEmail($email)
{
    $valor= filter_var($email, FILTER_SANITIZE_ADD_SLASHES);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
        return true;
    } else {
        return false;
    }
}

//Función para determinar si el valor es nulo o esta vacio.
function isEmpty($valor)
{
    if (empty(trim($valor)) || $valor == "") {
        return true;
    }

    return false;
}

//Funcion para deterninar si $value esta comprendio en un determinado rango
// de valores.
function isNumber($value, $minValue, $maxValue)
{
    $value = floatval($value);
    if ($value > $maxValue || $value < $minValue) {
        echo "${value} no esta comprendido entre ${minValue} y ${maxValue}";
    } else {
        echo null;
    }

}

//Muestre un Array de errores en un DIV dentro del formulario
function showErrors(&$errores)
{

    try {
        // Solo dibujar el Div si existen errores
        if (count($errores) > 0) {
          
            for ($x = 0; $x < count($errores); $x++) {
                echo "      <div>";
                echo            $errores[$x] . "<br>";
                echo "      </div>";
            }
          
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function validarDatos($datos){
    global $nif;
    global $errores;
    global $nombre;
    global $apellidos;
    global $fechaingreso;
    global $fechaalta;
    global $idpaciente;
    $nif="";
    error_reporting(0);

    $idpaciente=$datos["idpaciente"];
    $fechaalta=$datos["fechaalta"];
    if($fechaalta=="" || $fechaalta==null) $fechaalta="0000-00-00";
    
    $nif=$datos["nif"];
    if(!isset($nif) || isEmpty($nif)){
        array_push($errores,"El nif es requerido.");
    }
    $nombre=$datos["nombre"];
    if(!isset($nombre) ||isEmpty($datos["nombre"])){
        array_push($errores,"El nombre es requerido");
    }
    $apellidos=$datos["apellidos"];
    if(!isset($apellidos) || isEmpty($apellidos)){
        array_push($errores,"Los apellidos son requeridos");
    }
    $fechaingreso=$datos["fechaingreso"];
    if(!isset($fechaingreso) || isEmpty($fechaingreso)){
        array_push($errores,"La fecha ingreso es requerida");
    }
   
    error_reporting(E_ALL ^ E_NOTICE);
    if(count($errores)>0)
        return false;
    else
        return true;
}

function cargaDatos($datos){

    global $nif;
    global $idpaciente;
    global $nombre;
    global $apellidos;
    global $fechaingreso;
    global $fechaalta;

    if(isset($datos['idpaciente']))
        $idpaciente=$datos['idpaciente'];
    $nif=$datos['nif'];
    $nombre=$datos['nombre'];
    $apellidos=$datos['apellidos'];
    $fechaingreso=$datos['fechaingreso'];
    if(!isset($datos['fechaalta']))
        $fechaalta="0000-00-00";
    else $fechaalta=$datos['fechaalta'];
}







