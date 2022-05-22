	<h2>Consulta de pacientes</h2>
	
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

	
		
	<div id="paginas" style="text-align: center;">


	</div>
	<script type="text/javascript" src="./js/consulta.js"></script>
	
			
	