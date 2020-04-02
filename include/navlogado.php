
<?php
	session_start();

	if(!isset($_SESSION['id'])){
		header('location:index.php?op=logar');
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>GEPC | UFC</title>
	<meta charset="UTF-8">
	<meta name="description" content="Um grupo de pessoas com vontade de aprender">
	<meta name="keywords" content="coding, programming, c++, maratona, programação">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder
	<div id="preloder">
		<div class="loader"></div>
	</div>
	 -->
	<!-- Header section -->
	<header class="header-section clearfix">
		<a href="index.html" class="site-logo">
			<img src="img/logo.png" alt="">
		</a>
		<div class="header-right">			
			<div class="user-panel">
				<span>Olá, <?php echo $_SESSION['nome']; ?></span>
				<a name="logout" id="logout" class="btn btn-danger" href="controller/user.php?op=logout" role="button">Sair</a>				
				
			</div> 
		</div>
		<ul class="main-menu">
			<li><a href="meuperfil.php">Meu Perfil</a></li>
			<li><a href="forum.php">Fórum</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="downloads.php">Downloads</a></li>


			
		</ul>
	</header>
	<!-- Header section end -->