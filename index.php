<?php  require_once 'config/conexion.php'; 
date_default_timezone_set("America/Monterrey");
echo date('H:i:s');

if(isset($_GET['sensor_port'])){
$con = new BD_PDO();
$consumo =  @$_GET['consumo']; $temp = @$_GET['temp']; $fecha = date('H:i:s');

if(!$consumo || !$temp){
    echo 'Los campos estan vacios <br>';
}else{
    try{ $con->Ejecutar_Instruccion("ALTER TABLE Sensores MODIFY Id_Datos INT AUTO_INCREMENT PRIMARY KEY");    }
    catch(PDOException $e){}
        $insertar = $con ->Ejecutar_Instruccion("INSERT into Sensores(Consumo, Temperatura, Fechahora) values ('$consumo', '$temp', '$fecha')"); 
    } 
}

elseif(isset($_GET['cambios'])){
    $con = new BD_PDO(); $fecha = date('H:i:s');
    $result = $con -> Ejecutar_Instruccion("UPDATE Sensores set Hora = '{$fecha}' where Id_Datos = 1");
    echo($result);
}
elseif(isset($_GET['datos'])){
    $con = new BD_PDO();
    @$id = $_GET['id'];

    if(isset($id)){
        $select = $con -> Ejecutar_Instruccion("SELECT * from Sensores where Id_datos = '{$id}' ");
    }else{
        $select = $con -> Ejecutar_Instruccion("SELECT * from Sensores");
    }
    var_dump($select);
} 
    ?>
