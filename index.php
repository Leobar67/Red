<?php  require_once 'config/conexion.php'; 

date_default_timezone_set("America/Matamoros");
header("Content-Type: application/json");

if(isset($_GET['sensor_port'])){
$con = new BD_PDO();
$consumo =  @$_GET['consumo']; $temp = @$_GET['temp']; $hora = date('H:i:s');

    if(!$consumo || !$temp){
        echo json_encode(["status" => "Los campos estan vacios"]); exit;
    }else{
        $insertar = $con ->Ejecutar_Instruccion("INSERT into Sensores(Consumo, Temperatura, Hora) values ('$consumo', '$temp', '$hora')"); 
        echo json_encode($insertar); exit;
    }
}

if(isset($_GET['datos'])){
    $con = new BD_PDO();
    @$id = $_GET['id'];

    if(isset($id)){
        $select = $con -> Ejecutar_Instruccion("SELECT * from Sensores where Id_datos = '{$id}' ");
    }else{
        $select = $con -> Ejecutar_Instruccion("SELECT * from Sensores");
    }

    echo json_encode($select);
    exit;
}

?>
