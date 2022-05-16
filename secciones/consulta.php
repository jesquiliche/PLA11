	<?php
		require_once "./models/MyHospitalDAO.php";
		$hospital= new MyHospital();
		$pacientes =$hospital->FindAll();
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
			if(count($pacientes)){
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
			} else {
				$mensaje="No hay datos";
			}
			echo "<h2>$mensaje</h2>";
			

		?>
			
	</table><br><br>
	<h4></h4>