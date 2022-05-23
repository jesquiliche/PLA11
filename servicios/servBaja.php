<?php
require_once "../utils/utils.php";
require_once "../funciones/funxiones.php";
require_once "../models/MyHospitalDAO.php";

try {

    $idpaciente = $_POST['idpaciente'];

    if ($idpaciente !== "" && $idpaciente !== null) {
        $paciente = new MyHospital();
        $paciente->Destroy($_POST['idpaciente']);
        $paciente = null;

        $idpaciente = null;

        $mensaje = [
            "codigo" => "00",
            "respuesta" => "Baja efectuada",
        ];
        echo json_encode($mensaje);
    } else {
        $mensaje = [
            "codigo" => "10",
            "respuesta" => "Debe seleccionar un paciente primero",
        ];
        echo json_encode($mensaje);
    }
} catch (Exception $e) {
    $mensaje = [
        "codigo" => $e->getCode(),
        "respuesta" => $e->getMessage(),
    ];
    echo json_encode($mensaje);
}
