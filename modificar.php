<?php
include ("conexion.php");
session_start();
$id_viejo=$_SESSION["ID_cliente"];
$Nombre = $_REQUEST['nombre'];
$Apellido = $_REQUEST['ape'];
$Telefono=$_REQUEST['Telefono'];
$ID_Cli=$_REQUEST['ID_cliente'];
$Email=$_REQUEST['Email'];
$Direccion=$_REQUEST['Direccion'];
$DniCuit= $_REQUEST['DNI/CUIT'];


    $sql2 = "UPDATE 'Clientes' SET 'ID_Cliente'='$ID_Cli','nombre'='$Nombre','apellido'='$Apellido','Telefono'='$Telefono','Email'='$Email', 'Direccion'='$Direccion'WHERE 'ID_cliente'='$id_viejo'";
    mysqli_query($conexion,$sql2) or die("error al crear");
    echo "datos modificados";    
?>
</body>
</html>