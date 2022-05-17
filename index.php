<?php
require_once "./models/MyHospitalDAO.php";


const SECRET="@12/A{ÑzxxP12";
$errores=array();
$idpaciente=null;
$nombre=null;
$apellidos=null;
$fechaingreso=null;
$fechaalta=null;
$nif="";
$mensaje="";
$cokie_guardada=false;

$sql="";
$acceso_autorizado=false;
if(isset($_COOKIE["usuarios"])){
	$usuario=$_COOKIE["usuarios"]^SECRET;
	$validLogin = new MyHospital();
	$sql="SELECT * FROM usuarios WHERE nif='$usuario'";
	
	$result=$validLogin->RunQuery($sql);
	if(count($result)>0) $acceso_autorizado=true;
	else $acceso_autorizado=false;
} 
if(isset($_POST['login'])){
	$validLogin = new MyHospital();
	
	$usuario=addslashes(trim($_POST['usuario']));
	$pass=addslashes(trim($_POST['password']));
	if(empty($usuario || $pass)){
		$mensaje="Introduzca usuario y contraseña";
	} else {
		$sql="SELECT * FROM usuarios WHERE nif='$usuario' AND password='$pass'"; 
		$result=$validLogin->RunQuery($sql);
		if(count($result)>0){
			$acceso_autorizado=true;
			setcookie("usuarios", $usuario^SECRET, time()+(60*60*24*365), '/');		
		} else {
			$acceso_autorizado=false;
			$mensaje="Nombre o contraseña incorrectos";
		}
	}

}

if(isset($_POST['logof'])){
	setcookie("usuarios", $usuario^SECRET, time()-60, '/');	
	header("Location: index.php");
}


//definir un array con las opciones disponibles
$secciones = ['alta', 'consulta', 'mantenimiento'];

//extraer la clave del array $_GET
$clave = array_keys($_GET);

//comprobar si llega un parámetro por la url (GET)
$componente = $clave[0] ?? 'index';

//verificar que la opción sea correcta
if (!in_array($componente, $secciones)) {
	$seccion = 'index';
}else{ 
	$seccion = $componente;
}
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Hospital</title>
	<link rel="stylesheet" type="text/css" href="css/hospital.css">
</head>
<body>
<div class="container">
	<header>
		<h1 id="title">HOSPITAL</h1>
	</header>
	<nav>
			
		<?php
			if(!$acceso_autorizado) 
				require "secciones/login.php";
			else
				
				require_once "secciones/menu.php"; 
				?>
	</nav>
	<section id='contenido'>
		<div>
			<?php require_once "./secciones/$seccion.php"; ?>
		</div>
	</section>
</div>
</body>
</html>