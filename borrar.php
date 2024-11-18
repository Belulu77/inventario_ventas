<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
include ("conexion.php");

$ID_Cli=$_REQUEST['ID_cliente'];
$sql="DELETE FROM  `Clientes` WHERE `ID_cliente`=$ID_Cli";
mysqli_query($conexion,$sql)or die ("problemas es select".mysqli.error($conexion));
mysqli_close($conexion);
echo "se borro correctamente";
?>
</body>
</html>