<?php

    require_once "../utils/utils.php";
    require_once "../funciones/funxiones.php";
    require_once "../models/MyHospitalDAO.php";
    $nif2=null;
    $idpaciente=$_POST['idpaciente'];
    $nif=$_POST['nif'];
    
    require_once "../models/MyHospitalDAO.php";
    require_once "../utils/utils.php";


    try{
        $mensaje=array();
        $errores=array();
        $nif=trim($_POST['nif']);
        if(empty($nif)){
            array_push($errores,"El nif es requerido");
        }
        $nombre=trim($_POST['nombre']);
        if(empty($nombre)){
            array_push($errores,"El nombre es requerido");
        }
        $apellidos=trim($_POST['apellidos']);
        if(empty($apellidos)){
            array_push($errores,"Los apellidos son requeridos");
    
        }
        $fechaingreso=trim($_POST['fechaingreso']);
        if(empty($fechaingreso)){
            array_push($errores,"La fecha de ingreso es requerida");
        }
        if(count($errores)>0){
            throw new Exception("Error de validación", 10);
        }

        $paciente =new MyHospital();
        //$paciente->setExclude("alta");
        $nif2="";
        $modificado=$paciente->IsModifiedRecord($idpaciente,$_POST,$nif2);
        if(!$modificado){
            throw new Exception("El paciente no ha sido modificado", 10);
        }
        if($nif2!="" && ($nif!=$nif2)){
            throw new Exception("El nif ya se encuentra en la base de datos", 12);
        }
        
        $paciente->Update($_POST);
        $paciente=null;
        
        $mensaje=[
            "codigo"=>"00",
            "respuesta"=>"Paciente modificado"
        ];
        
    }catch(Exception $e){
        if($e->getCode()==23000){
            $mensaje=[
                "codigo"=>"10",
                "respuesta"=>"El nif ya existe en la BB.DD",
            ];
        }elseif($e->getCode()==11){
            $mensaje=[
                "codigo"=>"11",
                "errors"=>$errores
            ];
        }
        elseif($e->getCode()==12){
                $mensaje=[
                    "codigo"=>"12",
                    "respuesta"=>"El nif ya existe en la BB.DD"
                ];
        }elseif($e->getCode()==10){
            $mensaje=[
                "codigo"=>"10",
                "respuesta"=>$e->getMessage(),
            ];
        }
        else{
            $mensaje=[
                "codigo"=>$e->getCode(),
                "respuesta"=>$e->getMessage(),
            ];
        }
    }

    echo json_encode($mensaje);


