	<?php
		require_once "./models/MyHospitalDAO.php";

		session_start();
		if(isset($_POST['pacientes'])){
			$_SESSION['pacientes'] = $_POST['numpacientes'];
		}
		$pacientes_a_mostrar = $_SESSION['pacientes'] ?? 5;
		if(isset($_POST['buscar'])){
			$_SESSION['apellido'] = $_POST['buscar'];
		}
		$buscar_apellido=$_SESSION['apellido']??null;

		$hospital= new MyHospital();
		$pagina = filter_input(INPUT_GET, 'pagina') ?? 1;
		$filas_a_mostrar = filter_input(INPUT_POST, 'numpacientes', FILTER_VALIDATE_INT) ?? 5;
		$fila_desde = ($pagina - 1) * $filas_a_mostrar;
	//	$buscar_apellido = filter_input(INPUT_POST, 'buscaapellido') ?? null;
		$pacientes=$hospital->RunQuery("SELECT * FROM paciente WHERE apellidos LIKE '%$buscar_apellido%' ORDER BY nombre,
		apellidos LIMIT $fila_desde, $filas_a_mostrar");
		global $mensaje;

	?>
	<h2>Consulta de pacientes</h2>
	<table id='pacientes'>
		<tr>
			<th>Nif</th>
			<th>Nombre</th>
			<th>Apellidos</th>
		</tr>
		<?php 
	
			
			if(count($pacientes)>0){
				echo "<form method='POST' action='index?consulta'>";
				echo "<center>";
				echo "<label>Pacientes a mostrar</label>";
				echo "<select name='numpacientes' onchange='this.form.submit()'>";
				if($filas_a_mostrar == 5){
					echo "<option selected>5</option>";
				} else {
					echo "<option>5</option>";
				}
				if($filas_a_mostrar == 10){
					echo "<option selected>10</option>";
				} else {
					echo "<option>10</option>";
				}
				if($filas_a_mostrar == 20){
					echo "<option selected>20</option>";
				} else {
					echo "<option>20</option>";
				}
			
				if($filas_a_mostrar == 50){
					echo "<option selected>50</option>";
				} else {
					echo "<option>50</option>";
				}
				echo "</select>";
				echo "</center>";
				echo "</br>";
				echo "<center>";
				echo "Buscar por apellido : <span><input type='text' id='buscar' name='buscar' value='$buscar_apellido'></span>";
				echo "</center>";
				echo "</br>";
				echo "</form>";

				foreach($pacientes as $paciente){
					echo "<tr>";
					echo "<td>$paciente[nif]</td>";
					echo "<td>$paciente[nombre]</td>";
					
					echo "<td>$paciente[apellidos]</td>";
					echo "<td>";
					echo "<form action='index.php?mantenimiento' method='post'>";
					echo "<input type='hidden' name='idpaciente' value='$paciente[idpaciente]'>";
					echo "<input type='submit' name='consulta' value='Detalle paciente'>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				 }
				 echo "</table>";
			} else {
				$mensaje="No hay datos";
			}
			echo "<h2>$mensaje</h2>";
			$sql="SELECT COUNT(*) AS numregistros FROM paciente WHERE apellidos LIKE '%$buscar_apellido%'";
		
			$numRegistros=$hospital->RunQuery("SELECT COUNT(*) AS numregistros FROM paciente WHERE apellidos LIKE '%$buscar_apellido%'");
			
			$numRegistros=$numRegistros[0]['numregistros'];
			$paginas = ceil($numRegistros/$filas_a_mostrar);

			echo "<center>";
			for($x=1;$x<$paginas;$x++){
			
				echo "<a href='index?consulta&pagina=$x'><input type='button' value='$x'></a>";
			};
			echo "</center>";
			

		?>
			
	</table><br><br>
	<h4></h4>