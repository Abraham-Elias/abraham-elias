
<?php
session_start();
include 'conexion.php';
$Id = $_GET['Id'];
$consulta="select * from Usuarios2 where Id = '$Id' ";
$sql=mysqli_query($conexion, $consulta);
$lic=mysqli_fetch_array($sql);

$consulta1="select * from pacientes  WHERE Estado = 'Activo' ";
$resultado1=mysqli_query($conexion, $consulta1);
$nfilas1=mysqli_num_rows($resultado1);


$consulta2="select * from pacientes WHERE Estado = 'Desactivado' ";
$resultado2=mysqli_query($conexion, $consulta2);
$nfilas2=mysqli_num_rows($resultado2);


$consulta3="select * from pacientes WHERE Estado = 'Defuncion' ";
$resultado3=mysqli_query($conexion, $consulta3);
$nfilas3=mysqli_num_rows($resultado3);

//insertar registros
if(isset($_REQUEST['Matricula']) && !isset($_REQUEST['id']))
{
    $Matricula=$_REQUEST['Matricula'];
    $Maquina=$_REQUEST['Maquina'];
    $Nombre=$_REQUEST['Nombre'];
    $Telefono=$_REQUEST['Telefono'];
    $Domicilio=$_REQUEST['Domicilio'];
    $Alergias=$_REQUEST['Alergias'];
    $Patologias=$_REQUEST['Patologias'];
    $Horario=$_REQUEST['Horario'];
    $Turno=$_REQUEST['Turno'];
    $Estado=$_REQUEST['Estado'];
    $Ingreso=$_REQUEST['Ingreso'];
    $Pesoseco=$_REQUEST['Pesoseco'];
    $Conexion=$_REQUEST['Conexion'];
    $Motivoe=$_REQUEST['Motivoe'];
    $fecha_ingreso=$_REQUEST['fecha_ingreso'];
    $fecha_egreso=$_REQUEST['fecha_egreso'];
    $Fam1=$_REQUEST['Fam1'];
    $Tel1=$_REQUEST['Tel1'];
    $Fam2=$_REQUEST['Fam2'];
    $Tel2=$_REQUEST['Tel2'];
    $Fam3=$_REQUEST['Fam3'];
    $Tel3=$_REQUEST['Tel3'];
    

	$insertar="insert into pacientes(Matricula, Maquina, Nombre, Telefono, Domicilio, Alergias, Patologias, Horario, Turno, Estado, Ingreso, Pesoseco, Conexion, Motivoe, fecha_ingreso, fecha_egreso, Fam1, Tel1, Fam2, Tel2, Fam3, Tel3) values('$Matricula', '$Maquina' , '$Nombre', '$Telefono', '$Domicilio', '$Alergias', '$Patologias', '$Horario', '$Turno', '$Estado', '$Ingreso', '$Pesoseco', '$Conexion', '$Motivoe', '$fecha_ingreso', '$fecha_egreso', '$Fam1', '$Tel1', '$Fam2', '$Tel2', '$Fam3', '$Tel3')";

     mysqli_query($conexion, $insertar);
     echo "<script>alert('Paciente Ingresado'); </script>";
	echo "<script>window.location='index2.php' </script>";
	}
 



// consulta registro
$consulta="select * from pacientes";
$resultado=mysqli_query($conexion, $consulta);
$nfilas=mysqli_num_rows($resultado);


// eliminar registro
if(isset($_REQUEST['eliminar']))
{
 $eliminar=$_REQUEST['eliminar'];
 mysqli_query($conexion,"delete from pacientes where Matricula=$eliminar");
 echo'<script>alert("Paciente eliminado");</script>';
 echo"<script>window.location='index2.php'</script>";
}

//editar registros
//1.realiza la consulta
if(isset($_REQUEST['editar']))
{
    $editar=$_REQUEST['editar'];
    $registro=mysqli_query($conexion, "select * from pacientes where Matricula=$editar");
    $reg=mysqli_fetch_array($registro);
}


//actualizar registros

if(isset($_REQUEST['id']))
{
    
    $Matricula=$_REQUEST['id'];
    $Maquina=$_REQUEST['Maquina'];
    $Nombre=$_REQUEST['Nombre'];
    $Telefono=$_REQUEST['Telefono'];
    $Domicilio=$_REQUEST['Domicilio'];
    $Alergias=$_REQUEST['Alergias'];
    $Patologias=$_REQUEST['Patologias'];
    $Horario=$_REQUEST['Horario'];
    $Turno=$_REQUEST['Turno'];
    $Estado=$_REQUEST['Estado'];
    $Pesoseco=$_REQUEST['Pesoseco'];
    $Conexion=$_REQUEST['Conexion'];
    $Motivoe=$_REQUEST['Motivoe'];
    $fecha_ingreso=$_REQUEST['fecha_ingreso'];
    $fecha_egreso=$_REQUEST['fecha_egreso'];
    $Fam1=$_REQUEST['Fam1'];
    $Tel1=$_REQUEST['Tel1'];
    $Fam2=$_REQUEST['Fam2'];
    $Tel2=$_REQUEST['Tel2'];
    $Fam3=$_REQUEST['Fam3'];
    $Tel3=$_REQUEST['Tel3'];
 
   
	$insertar="insert into pacientes(Matricula, Maquina, Nombre, Telefono, Domicilio, Alergias, Patologias, Horario, Turno, Estado, Pesoseco, Conexion, Motivoe, fecha_ingreso, fecha_egreso, Fam1, Tel1, Fam2, Tel2, Fam3, Tel3) values('$Matricula', '$Maquina' , '$Nombre', '$Telefono', '$Domicilio', '$Alergias', '$Patologias', '$Horario', '$Turno', '$Estado', '$Pesoseco', '$Conexion', '$Motivoe', '$fecha_ingreso', '$fecha_egreso', '$Fam1', '$Tel1', '$Fam2', '$Tel2', '$Fam3', '$Tel3')";
     mysqli_query($conexion, $insertar);
     echo "<script>alert('Paciente Actualizado'); </script>";
	echo "<script>window.location='index2.php' </script>";
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>INICIO</title>
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
</head><!--/head-->

<body>
    <script src="js/read_product.js"></script>
    
    
    
    
    
    
    
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="contactinfo">
							<ul class="nav nav-pills">
		 <br>
								    
                                    <a href="index2.php?Id=<? echo $lic['Id']; ?>" type="button" class="btn btn-warning">INICIO</a>
                                    <a href="Matutino.php?Id=<? echo $lic['Id']; ?>" type="button" class="btn btn-warning">MATUTINO</a>
                                    <a href="Vespertino.php?Id=<? echo $lic['Id']; ?>" type="button" class="btn btn-warning">VESPERTINO</a>
                                    <a href="Nocturno.php?Id=<? echo $lic['Id']; ?>" type="button" class="btn btn-warning">NOCTURNO</a>
                                    <a href="Estadisticas.php?Id=<? echo $lic['Id']; ?>" type="button" class="btn btn-info">ESTADISTICAS</a>
                                    <a  href="cerrar.php" type="button" class="btn btn-danger">CERRAR SESION</a>
                                    <br>
                                    

                                    
                                    
							</ul>
							 <br>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
							<br>
								<li><a href="#"><i class="fa fa-calendar-o"></i><?php 
                                    date_default_timezone_set('America/Merida'); 
                                    echo date("F j, Y");
          
                                    
                                    
                                    ?></a></li>
                                    
                                    
                                    
							</ul>
							
						</div>
					</div>
				</div>
			</div>

		</div><!--/header_top-->

	</header><!--/header-->
	


<section>  
    
    
    
		<div class="container">
		

			<div class="row">
            <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">  
	    		 <br>  			   			
					<h2 class="title text-center">PROGRAMAR PACIENTE DE HEMODIALISIS</h2>    			    				    				
				</div>			 		
			</div>    	
    		<div class="row"> 
    		 	
	    		<div class="col-sm-9">
	    		<h2 class="title text-center">Registro de pacientes:</h2>
	    			<div class="signup-form">
				    	<form method="post" action="index2.php" enctype="multipart/form-data">
				            
				            <div class="form-group col-md-3">
				                <input type="text" name="Matricula" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Matricula']."'";} ?> class="form-control" required="required" placeholder="No.Cuenta">
				            </div>                                
                                
                            <div class="form-group col-md-3">
				                <input type="text" name="Maquina" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Maquina']."'";} ?> class="form-control" required="required" placeholder="No. de Maquina">
				            </div>  
                            
                            <div class="form-group col-md-6">
				                <input type="text" name="Nombre" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Nombre']."'";} ?> class="form-control" required="required" placeholder="Nombre Completo">
				            </div>
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Telefono" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Telefono']."'";} ?> class="form-control" required="required" placeholder="Telefono">
				            </div>
                            
                            <div class="form-group col-md-8">
				                <input type="text" name="Domicilio" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Domicilio']."'";} ?> class="form-control" required="required" placeholder="Domicilio">
				            </div>
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Alergias" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Alergias']."'";} ?> class="form-control" required="required" placeholder="Alergias">
				            </div>
                            
                            <div class="form-group col-md-8">
				                <input type="text" name="Patologias" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Patologias']."'";} ?> class="form-control" required="required" placeholder="Patologias Agregadas">
				            </div> 
                            
                               <div class="form-group col-md-3">
                                <select class="form-control"  name="Horario" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Horario']."'";} ?>  placeholder="Horario" required>
                                <option selected disabled value="">Horario...</option>
                                <option value="LMV">L.M.V</option>
                                <option value="MJS">M.J.S</option>
                                <option value="Domingo">Domingo</option>
                                </select>
                            </div> 
                               <div class="form-group col-md-3">
                                <select class="form-control"  name="Turno" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Turno']."'";} ?>  placeholder="Turno" required>
                                <option selected disabled value="">Turno...</option>
                                <option value="8-11">8-11</option>
                                <option value="12-3">12-3</option>
                                <option value="4-7">4-7</option>
                                <option value="Nocturno">Nocturno</option>
                                </select>
                            </div>
                               <div class="form-group col-md-3">
                                <select class="form-control"  name="Estado" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Estado']."'";} ?>  placeholder="Estado" required>
                                <option selected disabled value="">Estado...</option>
                                <option value="Activo">Activo</option>
                                <option value="Desactivado">No activo</option>
                                <option value="Defuncion">Defuncion</option>
                                </select>
                            </div>
                               <div class="form-group col-md-3">
                                <select class="form-control"  name="Ingreso" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Ingreso']."'";} ?>  placeholder="Ingreso" required>
                                <option selected disabled value="">Ingreso...</option>
                                <option value="Ambulatorio">Ambulatorio</option>
                                <option value="Hospitalizado">Hospitalizado</option>
                                <option value="Urgencia">Urgencia</option>
                                </select>
                            </div>                             
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Pesoseco" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Pesoseco']."'";} ?> class="form-control" required="required" placeholder="Peso Seco">
				            </div>
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Conexion" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Conexion']."'";} ?> class="form-control" required="required" placeholder="Conexion">
				            </div>
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Motivoe" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Motivoe']."'";} ?> class="form-control"  placeholder="Motivo de Egreso">
				            </div> 
                        
				            <div class="form-group col-md-6">
                            <h5 class="title text-center">Fecha de Ingreso:</h5>
				                <input type="date" name="fecha_ingreso" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['fecha_ingreso']."'";} ?> class="form-control" required="required" placeholder="Fecha de Ingreso">
				            </div> 
                            
                            <div class="form-group col-md-6">    
				                <h5 class="title text-center">Fecha de Egreso:</h5>
				                <input type="date" name="fecha_egreso" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['fecha_egreso']."'";} ?> class="form-control"  placeholder="Fecha de Egreso">
				            </div>
				           
				            
                            <div class="form-group col-md-8">
				                <input type="text" name="Fam1" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Fam1']."'";} ?> class="form-control" required="required" placeholder="Nombre de Familiar 1">
				            </div> 
                            
                            <div class="form-group col-md-4">
				                <input type="text" name="Tel1" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Tel1']."'";} ?> class="form-control" required="required" placeholder="Telefono">
				            </div> 
                            
                            <div class="form-group col-md-8">
				                <input type="text" name="Fam2" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Fam2']."'";} ?> class="form-control" required="required" placeholder="Nombre de Familiar 2">
				            </div>
                            <div class="form-group col-md-4">
				                <input type="text" name="Tel2" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Tel2']."'";} ?> class="form-control" required="required" placeholder="Telefono">
				            </div> 
                            
                              <div class="form-group col-md-8">
				                <input type="text" name="Fam3" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Fam3']."'";} ?> class="form-control" required="required" placeholder="Nombre de Familiar 3">
				            </div>
                            <div class="form-group col-md-4">
				                <input type="text" name="Tel3" <? if(isset($_REQUEST['editar'])) { echo "value='".$reg['Tel3']."'";} ?> class="form-control" required="required" placeholder="Telefono">
				            </div>      
				                       
				            <div class="form-group col-md-12">
				            <!--------------  Pasamos una variable llamada id la cual lleva el valor de la matricula  ------------------->
					<?php  
					if(isset($_REQUEST['editar'])){
						echo "<input type='hidden' name='id' value='".$reg['Matricula']."'  >";
					} ?>
				            
				                <input type="submit" class="btn btn-primary pull-right" <? if(isset($_REQUEST['editar'])) {echo "value='Guardar Datos'";} else { echo "value='Registrar Nuevo Paciente'";}?>
                    name="submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
				

            
<div class="col-sm-3 padding-right">
					<div class="features_items">
						<h2 class="title text-center">PACIENTES</h2>
						<div class="col-sm-6">
						<a  href="ActivoG.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Activos</a>
						</div>
						
						<div class="col-sm-6">
						<a  href="NActivoG.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px No Activos</a>
						</div>
						
						<div class="col-sm-6">
						<br>
						<a  href="FallecidosG.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Fallecidos</a>
						</div>
						<div class="col-sm-6">
						<br>
						<a  href="UrgenciasG.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Urgencias</a>
						</div>
						
						
						
					</div><!--features_items-->

                </div>
                                                                               
                                                                               																
                																
                																								
                								<!--/category-tab-->						
                </div>									<!--/category-tab-->						
                </div>									<!--/category-tab-->						
                </div>
            </div></div>						<!--/category-tab-->						
	</section>

            
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>