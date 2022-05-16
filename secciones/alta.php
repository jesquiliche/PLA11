	<?php
		require_once "./models/MyHospitalDAO.php";
		require_once "./utils/utils.php";
		global $nif;
		global $nombre;
		global $apellidos;
		global $fechaingreso;

		$mensaje="";
		try{
			if(isset($_POST['alta']))
			{
				cargaDatos($_POST);
				if(validarDatos($_POST)){
					
					$paciente =new MyHospital();
					$paciente->setExclude("alta");
					$paciente->Create($_POST);
					$paciente=null;
					$mensaje="Paciente dado de alta";
				}
			}
			
		}catch(Exception $e){
			if($e->getCode()==23000){
				array_push($errores,"El paciente ya existe en la BB.DD");
			}
			else{
				array_push($errores,$e->getMessage());
			}
		}
	
	?>
	<h2>Alta paciente</h2>
	<form id='formulario' method='post' action='#'>
		<label>NIF:</label>
		<input type="text" id="nif" name="nif" value='<?=$nif ?>'>
		<br><br>
		<label>Nombre:</label>
		<input type="text" id="nombre" name="nombre" value='<?=$nombre?>'>
		<br><br>
		<label>Apellidos:</label>
		<input type="text" id="apellidos" name="apellidos" value='<?=$apellidos ?>'>
		<br><br>
		<label>Fecha Ingreso:</label>
		<input type="date" id="fechaingreso" name="fechaingreso" value='<?=$fechaingreso ?>'>
		<br><br>
		<input type="submit" id="alta" name='alta' value='Alta paciente'><br><br>
		<h4></h4>
		<div id="errores">
		<?php showErrors($errores) ?>
		</div>
		<div><?=$mensaje ?></div>
	</form>
	

