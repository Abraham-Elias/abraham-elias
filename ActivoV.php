
<?php
session_start();
include 'conexion.php';
$Id = $_GET['Id'];

//Lunes Miercoles y Viernes.
$consulta1="select * from pacientes WHERE Horario = 'LMV' AND Turno = '8-11' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado1=mysqli_query($conexion, $consulta1);
$nfilas1=mysqli_num_rows($resultado1);

$consulta2="select * from pacientes WHERE Horario = 'LMV' AND Turno = '12-3' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado2=mysqli_query($conexion, $consulta2);
$nfilas2=mysqli_num_rows($resultado2);

$consulta3="select * from pacientes WHERE Horario = 'LMV' AND Turno = '4-7' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado3=mysqli_query($conexion, $consulta3);
$nfilas3=mysqli_num_rows($resultado3);

$consulta4="select * from pacientes WHERE Horario = 'LMV' AND Turno = 'Nocturno' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado4=mysqli_query($conexion, $consulta4);
$nfilas4=mysqli_num_rows($resultado4);


//MARTES JUEVES Y SABADO.
$consulta5="select * from pacientes WHERE Horario = 'MJS' AND Turno = '8-11' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado5=mysqli_query($conexion, $consulta5);
$nfilas5=mysqli_num_rows($resultado5);

$consulta6="select * from pacientes WHERE Horario = 'MJS' AND Turno = '12-3' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado6=mysqli_query($conexion, $consulta6);
$nfilas6=mysqli_num_rows($resultado6);

$consulta7="select * from pacientes WHERE Horario = 'MJS' AND Turno = '4-7' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado7=mysqli_query($conexion, $consulta7);
$nfilas7=mysqli_num_rows($resultado7);

$consulta8="select * from pacientes WHERE Horario = 'MJS' AND Turno = 'Nocturno' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado8=mysqli_query($conexion, $consulta8);
$nfilas8=mysqli_num_rows($resultado8);


//DOMINGO.
$consulta9="select * from pacientes WHERE Horario = 'DOMINGO' AND Turno = '8-11' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado9=mysqli_query($conexion, $consulta9);
$nfilas9=mysqli_num_rows($resultado9);

$consulta10="select * from pacientes WHERE Horario = 'DOMINGO' AND Turno = '12-3' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado10=mysqli_query($conexion, $consulta10);
$nfilas10=mysqli_num_rows($resultado10);

$consulta11="select * from pacientes WHERE Horario = 'DOMINGO' AND Turno = '4-7' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado11=mysqli_query($conexion, $consulta11);
$nfilas11=mysqli_num_rows($resultado11);

$consulta12="select * from pacientes WHERE Horario = 'DOMINGO' AND Turno = 'Nocturno' AND ESTADO = 'Activo' ORDER BY Maquina ASC";
$resultado12=mysqli_query($conexion, $consulta12);
$nfilas12=mysqli_num_rows($resultado12);


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
    <title>Px Activos</title>
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
					<h2 class="title text-center">PACIENTES  ACTIVOS LUNES, MIERCOLES Y VIERNES</h2>    			    				    				
				</div>			 		
			</div> 
           
              	
              	   	   	
                <div class="row">  	
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 12:00 LUNES,MIERCOLES,VIERNES </h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Matricula</th><a href="detalle.php?codigo_de_producto=<?php echo $lic['codigo_de_producto'];?>" title="Detalle"></a>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado2)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
	

<div class="col-sm-3 padding-right">
					<div class="features_items">
						<h2 class="title text-center">PACIENTES</h2>
						<div class="col-sm-6">
						<a  href="Activov.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Activos</a>
						</div>
						
						<div class="col-sm-6">
						<a  href="NActivoV.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px No Activos</a>
						</div>
						
						<div class="col-sm-6">
						<br>
						<a  href="FallecidosV.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Fallecidos</a>
						</div>
						<div class="col-sm-6">
						<br>
						<a  href="UrgenciasV.php?Id=<? echo $lic['Id']; ?>" class="btn btn-warning" role="button">Px Urgencias</a>
						</div>
						
						
						
					</div><!--features_items-->

                </div>
                                    
										
  
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 16:00 LUNES,MIERCOLES,VIERNES </h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado3)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
            

                                                                     
                                                                               																
 <div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">  
	    		 <br>  			   			
					<h2 class="title text-center">PACIENTES ACTIVOS DE MARTES, JUEVES Y SABADOS</h2>    			    				    				
				</div>			 		
			</div> 
           
              	
              	   	   	
                <div class="row">  	

                                    
										
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 12:00 MARTES, JUEVES, SABADOS </h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado6)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
            
            
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 16:00 MARTES, JUEVES, SABADOS </h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado7)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
            
                                                                            
                                                                               																
                																
                																								
                								<!--/category-tab-->						
                </div>									<!--/category-tab-->						
                </div>  
                
                
<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">  
	    		 <br>  			   			
					<h2 class="title text-center">PACIENTES ACTIVOS DOMINGOS</h2>    			    				    				
				</div>			 		
			</div> 
           
              	
              	   	   	
                <div class="row">  	
							
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 12:00 DOMINGOS </h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado10)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
            
            
<div class="col-sm-9">
	    		<h2 class="title text-center">PACIENTES PROGRAMADOS DE 16:00 DOMINGOS</h2>
	    			<div class="signup-form">
				    
				    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>
      <th scope="col">Fecha Ingreso</th>

    </tr>
  </thead>
  <tbody>
   <? while($lic=mysqli_fetch_array($resultado11)){?>
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Nombre']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>

    </tr>
<? }; ?>
  </tbody>
</table>

				    
	    			</div>
</div>
            

                                                              																
                																
                																								
                								<!--/category-tab-->						
                </div>									<!--/category-tab-->						
                </div>               																
                	
                																																															
                								<!--/category-tab-->						
                
                
                
                
                </div>									<!--/category-tab-->						
                </div>
                
                									
                																		
                																											
                																					<!--/category-tab-->						
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