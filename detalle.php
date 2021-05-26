
<?php
session_start();
include 'conexion.php';
$Id = $_GET['Matricula'];


$consulta1="select * from pacientes where Matricula='$Id'";
$resultado1=mysqli_query($conexion, $consulta1);
$nfilas1=mysqli_num_rows($resultado1);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Px Detalle</title>
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
	    		<div class="col-sm-19">  
	    		 <br>  			   			
					<h2 class="title text-center">DETALLE DE PACIENTES</h2>    			    				    				
				</div>			 		
			</div> 
           
              	<? while($lic=mysqli_fetch_array($resultado1)){?>
              	   	   	
                <div class="row">  	
                <h2 class="title text-center"><? echo $lic['Nombre']; ?></h2>
<div class="col-sm-12">
	    		

				    <table class="table table-striped">
  <thead >
    <tr>
     
      <th scope="col">Matricula</th>
      <th scope="col">Maquina</th>
      <th scope="col">Telefono</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Alergias</th>
      <th scope="col">Patologias</th>
      <th scope="col">Horario</th>
      <th scope="col">Turno</th>
      <th scope="col">Ingreso</th>
      <th scope="col">Conexion</th>


    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row"><a href="detalle.php?Matricula=<?php echo $lic['Matricula'];?>" title="Detalle"><? echo $lic['Matricula']; ?></a></th>
      <td><? echo $lic['Maquina']; ?></td>
      <td><? echo $lic['Telefono']; ?></td>
      <td><? echo $lic['Domicilio']; ?></td>
      <td><? echo $lic['Alergias']; ?></td>
      <td><? echo $lic['Patologias']; ?></td>
      <td><? echo $lic['Horario']; ?></td>
      <td><? echo $lic['Turno']; ?></td>
      <td><? echo $lic['Ingreso']; ?></td>
      <td><? echo $lic['Conexion']; ?></td>

    </tr>

  </tbody>

    <tr>
     
      <th scope="col">Peso</th>
      <th scope="col">Motivo de Egreso</th>
      <th scope="col">Fecha de Ingreso</th>
      <th scope="col">Fecha de Egreso</th>
      <th scope="col">Familiar 1</th>
      <th scope="col">Telefono 1</th>      
      <th scope="col">Familiar 2</th>
      <th scope="col">Telefono 2</th>      
      <th scope="col">Familiar 3</th>
      <th scope="col">Telefono 3</th>


    </tr>
 
  <tbody>
   
    <tr>
      <td><? echo $lic['Pesoseco']; ?></td>
      <td><? echo $lic['Motivoe']; ?></td>
      <td><? echo $lic['fecha_ingreso']; ?></td>
      <td><? echo $lic['fecha_egreso']; ?></td>
      <td><? echo $lic['Fam1']; ?></td>
      <td><? echo $lic['Tel1']; ?></td>
      <td><? echo $lic['Fam2']; ?></td>
      <td><? echo $lic['Tel2']; ?></td>
      <td><? echo $lic['Fam3']; ?></td>
      <td><? echo $lic['Tel3']; ?></td>


    </tr>

  </tbody>
</table>

<? }; ?>				    
	    			</div>
</div>



        
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