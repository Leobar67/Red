<?php  require_once 'config/conexion.php'; 

date_default_timezone_set("America/Matamoros");
header("Content-Type: application/json");

if(isset($_GET['sensor_port'])){
$con = new BD_PDO();
$consumo =  @$_GET['consumo']; $temp = @$_GET['temp']; $hora = date('H:i:s');

if(!$consumo || !$temp){
    echo json_encode(["status" => "Los campos estan vacios"]);
    exit;
}else{
    $insertar = $con ->Ejecutar_Instruccion("INSERT into Sensores(Consumo, Temperatura, Hora) values ('$consumo', '$temp', '$hora')"); 
    echo json_encode($insertar); 
    exit;
}

}

if(isset($_GET['cambios'])){
    $con = new BD_PDO();
    $result = $con -> Ejecutar_Instruccion("UPDATE Sensores set Consumo = '2.64' where Id_Datos = 1");
}

if(isset($_GET['show'])){
    $con = new BD_PDO();
    // $con -> Ejecutar_Instruccion("ALTER TABLE Sensores MODIFY Id_Datos INT NOT NULL AUTO_INCREMENT");

    $result = $con->Ejecutar_Instruccion("SHOW CREATE TABLE Sensores");
    echo json_encode($result);
    exit;
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
