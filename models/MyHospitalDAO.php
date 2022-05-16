<?php
require_once "./models/BaseModelDAO.php";

final class MyHospital extends BaseDao{
    
    function __construct()
    {
        parent::setOrderBy("nombre,apellidos ASC");
        parent::setTable("paciente");
        parent::setPrimaryKey("idpaciente");
    }

     //Comprobar si ya existe el nif
     public function FindByNif(string $nif):int {
        $this->con=DBConnection::connect();
        $sql="SELECT * FROM ".$this->table. " WHERE nif=?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array($nif));
        return $stmt->rowCount();
    }

    public function IsModifiedRecord($id,$datosOrigin,&$nif):bool{
        $this->con=DBConnection::connect();
        $sql="SELECT * FROM ".$this->table. " WHERE ".$this->primaryKey."=?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array($id));
        $datos=$stmt->fetch(PDO::FETCH_ASSOC);
        $nif=null;
    
        foreach($datos as $key=>$valor){
            if($key!==$this->exclude && $key!=="timestamp"){
    
                if($valor!=$datosOrigin[$key]){
                    if($datos['nif']!=$datosOrigin['nif']) $nif2=$datos['nif'];
                    error_reporting(E_ERROR | E_WARNING | E_PARSE);
                    return true;
                }
            }
        }
        return false;
    }
   
}