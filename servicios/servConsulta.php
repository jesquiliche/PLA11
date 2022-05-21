<?php 
    
    require_once "../models/MyHospitalDAO.php";
    $mensje=array();
    
    try {
        
        $pacientes_a_mostrar = $_POST['numpacientes'] ?? 5;
        $buscar_apellido= $_POST['buscar'];
        $pagina = $_POST['pagina'] ?? 1;
        $filas_a_mostrar = filter_input(INPUT_POST, 'numpacientes', FILTER_VALIDATE_INT) ?? 5;
        $fila_desde = ($pagina - 1) * $filas_a_mostrar;
          
        $hospital= new MyHospital();
        
        $sql="SELECT COUNT(*) AS numregistros FROM paciente WHERE apellidos LIKE '%$buscar_apellido%'";
		$numRegistros=$hospital->RunQuery("SELECT COUNT(*) AS numregistros FROM paciente WHERE apellidos LIKE '%$buscar_apellido%'");
        $numRegistros=$numRegistros[0]['numregistros'];
        $paginas = ceil($numRegistros/$filas_a_mostrar);

        $pacientes=$hospital->RunQuery("SELECT * FROM paciente WHERE apellidos LIKE '%$buscar_apellido%' ORDER BY nombre,
        apellidos LIMIT $fila_desde, $filas_a_mostrar");
    
        $mensaje=[
            "codigo"=>"00",
            "numregistros"=>$numRegistros,
            "paginas"=>$paginas,
            "pacientes"=>$pacientes
        ];
        echo json_encode($mensaje);
    } catch(Exception $e){
        $mensaje=[
            "codigo"=>$e->getcode(),
            "respuesta"=>$e->getmessage()
        ];
    //    echo json_encode($mensaje);
    }

    

        

    