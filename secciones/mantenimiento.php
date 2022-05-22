	<?php
	/*	require_once "./models/MyHospitalDAO.php";
		require_once "./utils/utils.php";
		require_once "./funciones/funxiones.php";

		global $errores;
		global $idpaciente;
		$errores=array();
		$mensaje="";
	
		if(isset($_POST['consulta'])){
			$paciente=new MyHospital();
			$paciente=$paciente->FindById($_POST['idpaciente']);
			$idpaciente=$_POST['idpaciente'];
			cargaDatos($paciente);
		}

		if(isset($_POST['modificacion'])){
			modificacion();
		}
		

		if(isset($_POST['baja'])){
			baja();
		}*/
	?>
	<h2>Mantenimiento paciente</h2>
	<form id='formulario'>
	
		<input type="hidden" id='idpaciente' name='idpaciente'>
		<label>NIF:</label>
		<input type="text" id="nif" name="nif">
		<br><br>
		<label>Nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<br><br>
		<label>Apellidos:</label>
		<input type="text" id="apellidos" name="apellidos">
		<br><br>
		<label>Fecha Ingreso:</label>
		<input type="date" id="fechaingreso" name="fechaingreso">
		<br><br>
		<label>Fecha Alta Médica:</label>
		<input type="date" id="fechaalta" name="fechaalta">
		<br><br>
		<input type="button" id="modificacion" name="modificacion" value='Modificar paciente' >
		<input type="button" id="baja" name="baja" value='Baja paciente' >
		<br><br>
		<div id="errores">
		
		</div>
		
		
		
	
	</form>

	<script type = "text/javascript" src = '../js/consultapaciente.js'> </script>
	<script type = "text/javascript" src = '../js/modificapaciente.js'> </script>
