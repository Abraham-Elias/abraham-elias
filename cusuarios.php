<?
include 'conexion.php';


    
//insertar registros
if(isset($_REQUEST['Nombre']) && !isset($_REQUEST['id'])){
    $cuenta=$_REQUEST['cuenta'];
    $Nombre=$_REQUEST['Nombre'];
    $Correo_electronico=$_REQUEST['Correo_electronico'];
    $Password=$_REQUEST['Password'];
    
    $subio=false;
	
	
	if($password){
		$subio=true;
		if($subio){
   
	$insertar="insert into usuarios2(cuenta, Nombre, Correo_electronico, Password) values('$cuenta', '$Nombre', '$Correo_electronico', '$Password')";
     mysqli_query($conexion, $insertar);
     echo "<script>alert('Cliente registrado exitosamente'); </script>";
	echo "<script>window.location='cusuarios.php' </script>";		

}
		else{
			echo "<script> alert('Error al subir') </script>";
		}
    }
	}
// consulta registro
$consulta="select * from usuarios2";
$resultado=mysqli_query($conexion, $consulta);
$nfilas=mysqli_num_rows($resultado);


// eliminar registro
if(isset($_REQUEST['eliminar']))
{
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion,"delete from usuarios2 where Id=$eliminar");
 echo'<script>alert("Registro eliminado");</script>';
 echo"<script>window.location='cusuarios.php'</script>";
}

//editar registros
//1.realiza la consulta
if(isset($_REQUEST['editar']))
{
    $editar=$_REQUEST['editar'];
    $registro=mysqli_query($conexion, "select * from usuarios2 where Id=$editar");
    $reg=mysqli_fetch_array($registro);
}


//actualizar registros
if(isset($_REQUEST['id'])){
    $codigo=$_REQUEST['id'];
    $cuenta=$_REQUEST['cuenta'];
    $Nombre=$_REQUEST['Nombre'];
    $Correo_electronico=$_REQUEST['Correo_electronico'];
    $Password=$_REQUEST['Password'];
    $subio=false;
	
	
	if($password){
		$subio=true;
		if($subio){
   
	mysqli_query($conexion, "update usuarios2 set cuenta='$cuenta', Nombre='$Nombre', Correo_electronico='$Correo_electronico', Password='$Password' where Id='$codigo'");
     echo "<script>alert('Cliente actualizado exitosamente'); </script>";
	echo "<script>window.location='cusuarios.php' </script>";		
	}	

		else{
			echo "<script> alert('Error al subir') </script>";
		}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN | Usuarios</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<header id="header"><!--header-->
	 <script languaje="javascript">
            function preguntar()
            {
                var elimina=confirm("Desea eliminar el registro ?");
                if(elimina)
                    return true;
                else
                    return false;
            }
        </script>
	
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 9934199148</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> SEYE</a></li>
							</ul>
						</div>
					</div>
				
				</div>
			</div>
		</div><!--/header_top-->
		
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Navegacion</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="menu_admin.php" class="active">Regresar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Usuarios</h2>    			    				    				
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-7">
	    			<div class="signup-form">
				    	<form method="post" action="cusuarios.php" enctype="multipart/form-data">
				            
				            <div class="form-group col-md-12">
				                <input type="text" name="cuenta" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['cuenta']."'";} ?> class="form-control" required="required" placeholder="No.Cuenta">
				            </div>
                            <div class="form-group col-md-12">
				                <input type="text" name="Nombre" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Nombre']."'";} ?> class="form-control" required="required" placeholder="Nombre">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="email" name="Correo_electronico" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Correo_electronico']."'";} ?> class="form-control" required="required" placeholder="Correo Electronico">
				            </div>
                            <div class="form-group col-md-12">
				                <input type="text" name="Password" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Password']."'";} ?> class="form-control" required="required" placeholder="Contraseña">
				            </div>                        
				            <div class="form-group col-md-12">
				            <!--------------  Pasamos una variable llamada id la cual lleva el valor de la matricula  ------------------->
					<?php  
					if(isset($_REQUEST['editar'])){
						echo "<input type='hidden' name='id' value='".$reg['Id']."'  >";
					} ?>
				            
				                <input type="submit" class="btn btn-primary pull-right" <? if(isset($_REQUEST['editar'])) {echo "value='Guardar'";} else { echo "value='INSERTAR'";}?>
                    name="submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-3">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Usuarios:</h2>
	    				<table border="3"  >
        <tr>
            <th> Id </th>
            <th> Cuenta </th>
            <th> Nombre </th>
            <th>Correo_electronico</th>
            <th>Contraseña</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
            </tr>
            <? while($lic=mysqli_fetch_array($resultado)){?>
            <tr>
                <td> <? echo $lic['Id']; ?></td>
            <td><?echo $lic['cuenta'];?></td>
            <td><?echo $lic['Nombre'];?></td>
            <td><?echo $lic['Correo_electronico'];?></td>
            <td><?echo $lic['Password'];?></td>
            <td><a href="cusuarios.php?editar=<? echo $lic['Id']; ?>">Editar</a></td>
                <!--Elimina sin confirmacion--> 
            <!--<td><a href="cadmin.php?eliminar=<? echo $lic['Id']; ?>">eliminar</a></td>-->
                <!--Elimina con confirmacion--> 
            <td><a onclick="return preguntar()" href="cusuarios.php?eliminar=<? echo $lic['Id']; ?>">Eliminar</a></td>
            </tr>
        <? }; ?>
        </table>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	<br>
	<br>
<footer id="footer"><!--Footer-->
	
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 SEYE</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    </head>
</html>