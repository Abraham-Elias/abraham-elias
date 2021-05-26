<?
include 'conexion.php';


    
//insertar registros
if(isset($_REQUEST['Nombre']))
{

    $Nombre=$_REQUEST['Nombre']; 
    $Correo_electronico=$_REQUEST['Correo_electronico'];
    $Password=$_REQUEST['Password'];
    
	
	$insertar="insert into usuarios2(Nombre, Correo_electronico, Password) values('$Nombre', '$Correo_electronico', '$Password')";
     mysqli_query($conexion, $insertar);
     echo "<script>alert('usuario registrado exitosamente'); </script>";
	echo "<script>window.location='login.php' </script>";		
	}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Iniciar Sesión |</title>
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
	
	
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 9934199148</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Hemodialisis</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header_top-->
	
		
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row" >
				<div class="col-sm-5 col-sm-offset-3">
					<div class="login-form"><!--login form-->
						<h2>Iniciar Sesión (Coordinador)</h2>
						<form method="post" action="validar_login2.php">
							<input type="text" name="Correo_electronico"  id="Correo_electronico" placeholder="Correo Electronico" required/>
							<input type="passsword"  name="Password" id="Password" placeholder="Contraseña" required/>
							<button type="submit" class="btn btn-default">ENTRAR</button>
						</form>
					</div><!--/login form-->
				</div>
		
				
			</div>
		</div>
	</section><!--/form-->
	
	
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
</body>
</html>