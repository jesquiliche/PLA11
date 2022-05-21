<?php 
require_once "../models/MyHospitalDAO.php";
		require_once "../utils/utils.php";
		require_once "../funciones/funxiones.php";

		global $errores;
		global $idpaciente;
		$errores=array();
		$mensaje="";
	
		
		$paciente=new MyHospital();
		$paciente=$paciente->FindById($_POST['idpaciente']);
		$idpaciente=$_POST['idpaciente'];
		
		

		if(isset($_POST['modificacion'])){
		//	modificacion();
		}
		

		if(isset($_POST['baja'])){
		//	baja();
		}
		echo json_encode(["respuesta"=>"ok"])
	?>
