<?php 
session_start();
include 'conexion.php';
$_SESSION['Correo_electronico']=$_POST['Correo_electronico'];
$_SESSION['Password']=$_POST['Password'];

$consulta="select * from usuarios2 where Correo_electronico='$_SESSION[Correo_electronico]' and Password='$_SESSION[Password]' ";
$users=mysqli_query($conexion, $consulta);
$nfilas=mysqli_num_rows($users);

if($nfilas>0){
	while($reg_usuarios=mysqli_fetch_array($users)){
		
		
		$_SESSION['Correo_electronico']=$reg_usuarios['Correo_electronico'];
		$_SESSION['Password']=$reg_usuarios['Password'];
        $Id=$reg_usuarios['Id'];
	}



	$_SESSION['Correo_electronico']=$Correo_electronico;
	$_SESSION['password']=$password;
	$_SESSION['Id']=$Id;
    echo "$Id";


	// header("Location: index.html");
   echo "<script>window.location='index2.php?Id=$Id' </script>";

}
else{
	mysqli_close($conexion);
	echo "Usuario o Contraseña incorrecto";
	session_destroy();
}
	



?>