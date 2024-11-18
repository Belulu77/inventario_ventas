
<?php
include('conexion.php');

SESSION_START();
// Obtener los datos del formulario
$Nombre= $_REQUEST['nombre'];
$Apellido=$_REQUEST['ape'];
$Telefono=$_REQUEST['Telefono'];
$ID_Cli=$_REQUEST['ID_cliente'];
$Email=$_REQUEST['Email'];
$Direccion=$_REQUEST['Direccion'];

//funciones de errores
include('validar.php');
$error="";
$error=validar_nombre($Nombre,$error);
$error=validar_ape($Apellido,$error);
$error=validar_Telefono($Telefono);
$error=validar_IDCLI($ID_Cli,$error);
$error=validar_Email($Email,$error);
$error=validar_direccion($Direccion);

if($error==""){
// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'inventario_ventas') or die("Problemas en la conexión: " . mysqli_connect_error()); //ya esta implementado

// Inserción de datos en la base
$sql = "INSERT INTO Clientes VALUES ('$ID_Cli','$Nombre', '$Apellido','$Telefono','$Email','$Direccion')";//ya esta implementado
mysqli_query($conexion, $sql) or die("Problemas en el select: " . mysqli_error($conexion));
mysqli_close($conexion);

echo "El cliente pudo inscribirse correctamente.";
}
//funcion de realizacion de archivos
if($error==""){
    $ar=fopen("archivo.txt","a")or die("error al crear");
    fwrite($ar,$Nombre);
    fwrite($ar,"\n");
    fwrite($ar,$Apellido);
    fwrite($ar,"\n");
    fwrite($ar,$Telefono);
    fwrite($ar,"\n");
    fwrite($ar,$ID_Cli);
    fwrite($ar,"\n");
    fwrite($ar,$Email);
    fwrite($ar,"\n");
    fwrite($ar,$Direccion);
    fwrite($ar,"\n");
    fwrite($ar,"------------------------------------------------------------------------------");
    fwrite($ar,"\n");
    echo "<br> El archivo se creo correctamente.";
    }
if($error!=""){
    echo $error;
}

?>