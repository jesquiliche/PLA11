<?php 

require_once "../models/MyHospitalDAO.php";

		require_once "../utils/utils.php";
		require_once "../funciones/funxiones.php";
		session_start();		

		
		
	
		$idpaciente=$_COOKIE['idpaciente'];
	
	
	
		
		$paciente=new MyHospital();
	
		$data=$paciente->FindById($idpaciente);
			

		
		
		

		if(isset($_POST['modificacion'])){
		//	modificacion();
		}
		

		if(isset($_POST['baja'])){
		//	baja();
		}
		echo json_encode($data);
		
	?>
