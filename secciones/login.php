	<?php 
		Global $mensaje;
	?>
	
	
	<h3>Login:</h3>
	<form method='post' action='#'>
		<label>Usuario</label>
		<input type='text' name='usuario'></input><br>
		<label>Password</label>
		<input type='password' name='password'></input><br><br>
		<input type='submit' name='login' value='login'></input>
	</form>
	<br>
	<?=$mensaje?>
