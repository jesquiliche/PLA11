	<?php
	if (!isset($_COOKIE['idpaciente'])) {
		    echo "<script>alert('Debe seleccionar un paciente primero')</script>";
    	return 0;
	}
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
		<input type="button" id="modificacion" name="modificacion" value='Modificar paciente'>
		<input type="button" id="baja" name="baja" value='Baja paciente'>
		<br><br>
		<div id="errores">

		</div>




	</form>

	<script type="text/javascript" src='./js/consultaPaciente.js'> </script>
	<script type="text/javascript" src='./js/modificaPaciente.js'> </script>
	<script type="text/javascript" src='./js/bajaPaciente.js'> </script>