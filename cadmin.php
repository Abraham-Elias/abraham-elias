<?
include 'conexion.php';


    
//insertar registros
if(isset($_REQUEST['cuenta']) && !isset($_REQUEST['id'])){
    $cuenta=$_REQUEST['cuenta']; 
    $password=$_REQUEST['password'];
    
    $subio=false;
	
	
	if($password){
		$subio=true;
		if($subio){
   
	$insertar="insert into usuarios(cuenta, password) values('$cuenta', '$password')";
     mysqli_query($conexion, $insertar);
     echo "<script>alert('usuario registrado exitosamente'); </script>";
	echo "<script>window.location='cadmin.php' </script>";		

}
		else{
			echo "<script> alert('Error al subir') </script>";
		}
    }
	}
// consulta registro
$consulta="select * from usuarios";
$resultado=mysqli_query($conexion, $consulta);
$nfilas=mysqli_num_rows($resultado);


// eliminar registro
if(isset($_REQUEST['eliminar']))
{
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion,"delete from usuarios where Id=$eliminar");
 echo'<script>alert("Registro eliminado");</script>';
 echo"<script>window.location='cadmin.php'</script>";
}

//editar registros
//1.realiza la consulta
if(isset($_REQUEST['editar']))
{
    $editar=$_REQUEST['editar'];
    $registro=mysqli_query($conexion, "select * from usuarios where Id=$editar");
    $reg=mysqli_fetch_array($registro);
}


//actualizar registros
if(isset($_REQUEST['id'])){
    $codigo=$_REQUEST['id']; 
    $cuenta=$_REQUEST['cuenta']; 
    $password=$_REQUEST['password'];
    $subio=false;
	
	
	if($password){
		$subio=true;
		if($subio){
   
	mysqli_query($conexion, "update usuarios set cuenta='$cuenta', password='$password' where Id='$codigo'");
     echo "<script>alert('usuario actualizado exitosamente'); </script>";
	echo "<script>window.location='cadmin.php' </script>";		
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
    <title>ADMIN | Admin</title>
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
					<h2 class="title text-center">Administradores</h2>    			    				    				
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="signup-form">
				    	<form method="post" action="cadmin.php" enctype="multipart/form-data">
				            
				            <div class="form-group col-md-6">
				                <input type="text" name="cuenta" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['cuenta']."'";} ?> class="form-control" required="required" placeholder="Nombre">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="password" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['password']."'";} ?> class="form-control" required="required" placeholder="Contraseña">
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
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Administradores Activos</h2>
	    				<table border="3"  >
        <tr>
            <th> Id </th>
            <th> Cuenta </th>
            <th>Contraseña</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
            </tr>
            <? while($lic=mysqli_fetch_array($resultado)){?>
            <tr>
                <td> <? echo $lic['Id']; ?></td>
            <td><?echo $lic['cuenta'];?></td>
            <td><?echo $lic['password'];?></td>
            <td><a href="cadmin.php?editar=<? echo $lic['Id']; ?>">Editar</a></td>
                <!--Elimina sin confirmacion--> 
            <!--<td><a href="cadmin.php?eliminar=<? echo $lic['Id']; ?>">eliminar</a></td>-->
                <!--Elimina con confirmacion--> 
            <td><a onclick="return preguntar()" href="cadmin.php?eliminar=<? echo $lic['Id']; ?>">Eliminar</a></td>
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
<footer id="footer"><!--Footer-->
	
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 ISSET</p>
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