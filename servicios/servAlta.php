<?php
		require_once "../models/MyHospitalDAO.php";
		require_once "../utils/utils.php";
		

	
		try{
			$mensaje=array();
			$errores=array();
			$nif=trim($_POST['nif']);
			if(empty($nif)){
				array_push($errores,"El nif es requerido");
			}
			$nif=trim($_POST['nombre']);
			if(empty($nombre)){
				array_push($errores,"El nombre es requerido");
			}
			$nif=trim($_POST['apellidos']);
			if(empty($apellidos)){
				array_push($errores,"Los apellidos son requeridos");
		
			}
			$nif=trim($_POST['fechaingreso']);
			if(empty($fechaingreso)){
				array_push($errores,"La fecha de ingreso es requerida");
		
			}

			if(count($errores)>0){
				throw new Exception("Error de validación", 11);
				
			}
	
			$paciente =new MyHospital();
			$paciente->setExclude("alta");
			$paciente->Create($_POST);
			$paciente=null;
			
			$mensaje=[
                "codigo"=>"00",
                "respuesta"=>"Paciente dado de alta"
            ];
		}catch(Exception $e){
			if($e->getCode()==23000){
                $mensaje=[
                    "codigo"=>"10",
                    "respuesta"=>"El paciente ya existe en la BB.DD",
                ];
			}elseif($e->getCode()==11){
				$mensaje=[
                    "codigo"=>"11",
                    "errors"=>$errores
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
	?>