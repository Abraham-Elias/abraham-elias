<?php
session_start();
include 'conexion.php';
$Id = $_GET['Id'];
$consulta="select * from Usuarios2 where Id = '$Id' ";
$sql=mysqli_query($conexion, $consulta);
$lic=mysqli_fetch_array($sql);


    
//insertar registros
if(isset($_REQUEST['codigo_de_producto']) && !isset($_REQUEST['id']))
{
    $codigo_de_producto=$_REQUEST['codigo_de_producto'];
    $nombre_de_producto=$_REQUEST['nombre_de_producto'];
    $descripcion=$_REQUEST['descripcion'];
    $tipo=$_REQUEST['tipo'];
    $cantidad=$_REQUEST['cantidad'];
    $precio=$_REQUEST['precio'];
    $c_caja=$_REQUEST['c_caja'];
    $fecha_registro=$_REQUEST['fecha_registro'];
    

	$insertar="insert into producto(codigo_de_producto, nombre_de_producto, descripcion, tipo, cantidad, precio, c_caja, fecha_registro) values('$codigo_de_producto', '$nombre_de_producto', '$descripcion', '$tipo', '$cantidad', '$precio', '$c_caja', '$fecha_registro')";

     mysqli_query($conexion, $insertar);
     echo "<script>alert('producto registrado exitosamente'); </script>";
	echo "<script>window.location='Agregar.php' </script>";
	}
 



// consulta registro
$consulta="select * from producto";
$resultado=mysqli_query($conexion, $consulta);
$nfilas=mysqli_num_rows($resultado);


// eliminar registro
if(isset($_REQUEST['eliminar']))
{
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion,"delete from producto where codigo_de_producto=$eliminar");
 echo'<script>alert("Producto eliminado");</script>';
 echo"<script>window.location='Agregar.php'</script>";
}

//editar registros
//1.realiza la consulta
if(isset($_REQUEST['editar']))
{
    $editar=$_REQUEST['editar'];
    $registro=mysqli_query($conexion, "select * from producto where codigo_de_producto=$editar");
    $reg=mysqli_fetch_array($registro);
}


//actualizar registros

if(isset($_REQUEST['id']))
{
    
    $codigo_de_producto=$_REQUEST['id'];
    $nombre_de_producto=$_REQUEST['nombre_de_producto'];
    $descripcion=$_REQUEST['descripcion'];
    $tipo=$_REQUEST['tipo'];
    $precio=$_REQUEST['precio'];
    $c_caja=$_REQUEST['c_caja'];
 
   
    mysqli_query($conexion, "update producto set nombre_de_producto='$nombre_de_producto', descripcion='$descripcion', tipo='$tipo', precio='$precio', c_caja='$c_caja' where codigo_de_producto='$codigo_de_producto'");
        echo"<script>alert('Producto Actualizado'); </script>";
        echo"<script>window.location='Agregar.php'</script>";

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agregar Productos</title>
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
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
					<li><a href="#"><i class="fa fa-user"></i></a></li>
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
								<li><a href="index2.php?Id=<? echo $lic['Id']; ?>" class="active">Regresar</a></li>
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
					<h2 class="title text-center">Agregar Productos</h2>    			    				    				
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="signup-form">
				    	<form method="post" action="Agregar.php" enctype="multipart/form-data">
				            
				            <div class="form-group col-md-6">
				                <input type="text" name="codigo_de_producto" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['codigo_de_producto']."'";} ?> class="form-control" required="required" placeholder="Codigo de Producto">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="nombre_de_producto" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['nombre_de_producto']."'";} ?> class="form-control" required="required" placeholder="Nombre de Producto">
				            </div>
                            <div class="form-group col-md-12">
				                <input type="text" name="descripcion" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['descripcion']."'";} ?> class="form-control" required="required" placeholder="Descripcion">
				            </div>
                           
                             
            
                            <div class="form-group col-md-6">
                                <select class="form-control"  name="tipo" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['tipo']."'";} ?>  placeholder="Tipo" required>
                                <option selected disabled value="">Selecciona...</option>
                                <option value="Activo">Producto Activo</option>
                                <option value="No Activo">Producto No Activo</option>
                                </select>
                            </div>

            
                                
                            <div class="form-group col-md-6">
				                <input type="text" name="cantidad" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['cantidad']."'";} ?> class="form-control" required="required" placeholder="Cantidad">
				            </div>
                            <div class="form-group col-md-6">
				                <input type="text" name="precio" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['precio']."'";} ?> class="form-control" required="required" placeholder="Precio del producto">
				            </div>
                            <div class="form-group col-md-6">
				                <input type="text" name="c_caja" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['c_caja']."'";} ?> class="form-control" required="required" placeholder="Cantidad por caja">
				            </div>   
				            <div class="form-group col-md-6">
				                <input type="date" name="fecha_registro" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['fecha_registro']."'";} ?> class="form-control" required="required" placeholder="Fecha del registro">
				            </div>                  
				            <div class="form-group col-md-12">
				            <!--------------  Pasamos una variable llamada id la cual lleva el valor de la matricula  ------------------->
					<?php  
					if(isset($_REQUEST['editar'])){
						echo "<input type='hidden' name='id' value='".$reg['codigo_de_producto']."'  >";
					} ?>
				            
				                <input type="submit" class="btn btn-primary pull-right" <? if(isset($_REQUEST['editar'])) {echo "value='Guardar'";} else { echo "value='INSERTAR'";}?>
                    name="submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Productos:</h2>
	    				<table border="3" class="table table-striped table-bordered" >
        <tr>
            <th> Id </th>
            <th> Nombre </th>
            <th>Estado</th>
            <th>Cantidad</th>
            <th>Editar</th>
            </tr>
            <? while($lic=mysqli_fetch_array($resultado)){?>
            <tr>
                <th  scope="row"> <? echo $lic['codigo_de_producto']; ?></th>
            <td><?echo $lic['nombre_de_producto'];?></td>
            <td><?echo $lic['tipo'];?></td>
            <td><?echo $lic['cantidad'];?></td>
            <td><a href="Agregar.php?editar=<? echo $lic['codigo_de_producto']; ?>">Editar</a></td>
                <!--Elimina sin confirmacion--> 
            <!--<td><a href="cadmin.php?eliminar=<? echo $lic['codigo_de_producto']; ?>">eliminar</a></td>-->
                <!--Elimina con confirmacion--> 
            <!-- <td><a onclick="return preguntar()" href="Agregar.php?eliminar=<? echo $lic['codigo_de_producto']; ?>">Eliminar</a></td>-->
            </tr>
        <? }; ?>
        </table>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	
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