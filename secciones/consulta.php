	<?php
		

	?>
	<h2>Consulta de pacientes</h2>
	
		<?php 
	/*
			
			if(count($pacientes)>0){
				echo "<form method='POST' action='index.php?consulta'>";
				echo "<center>";
				echo "<label>Pacientes a mostrar</label>";
				echo "<select name='cboapacientes' id='cbopacientes' onchange='this.form.submit()'>";
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
			
				echo "<a href='index.php?consulta&pagina=$x'><input type='button' id='pagina' value='$x'></a>";
			};
			echo "</center>";
			
*/
		?>
		<form>
			<center>
			<label>Pacientes a mostrar</label>
			<select name='cboapacientes' id='cbopacientes'>
				<option>5</option>
				<option>10</option>
				<option>20</option>
				<option>50</option>
			
			</select>
			</center>
			</br>
			<center>
			Buscar por apellido : <span><input type='text' id='buscar' name='buscar'></span>
			</center>
			</br>
		</form>
		<table id='pacientes'>
			<thead>
				<th>Nif</th>
				<th>Nombre</th>
				<th>Apellidos</th>
			</thead>
			<tbody id="filas">
				
			</tbody>
		</table>

	<script type="text/javascript" src="./js/consulta.js"></script>
		
	<div id="paginas">


	</div>


		<?php
		/*	echo "<center>";
			for($x=1;$x<$paginas;$x++){
			
				echo "<a href='index.php?consulta&pagina=$x'><input type='button' id='pagina' value='$x'></a>";
			};
			echo "</center>";*/
		?>
	
			
	