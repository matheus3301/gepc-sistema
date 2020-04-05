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
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix">
		<a href="index.php" class="site-logo">
			<img src="img/logo.png" alt="">
		</a>
		<div class="header-right">			
			<div class="user-panel">
				<a  class="login text-white" data-toggle="modal" data-target="#modelLogin" style="cursor:pointer">Login</a>
				<a href="cadastro.php" class="register">Crie uma Conta</a>
				
				
				
			</div> 
		</div>
		<ul class="main-menu">
			<li><a href="index.html">Início</a></li>
			<li><a href="#">Sobre</a></li>			
		</ul>
	</header>
	<!-- Modal -->
				<div class="modal fade" id="modelLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#07243d">
								<h5 class="modal-title text-white">Login</h5>
									<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							</div>
							<form name="form" id="form" method="post" onSubmit="login(event)" action="controller/user.php?op=login">

							<div class="modal-body">
									<div id="status">
									
									</div>
									<div class="form-group">
									  <label for="email">Email</label>
									  <input required="" type="email"
										class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="seu email">
									</div>
									<div class="form-group">
									  <label for="password">Senha</label>
									  <input required="" type="password" class="form-control" name="password" id="password" placeholder="sua senha">
									</div>
							</div>
							<div class="modal-footer">
								<button id="botao" type="submit" class="site-btn">Logar</button>
							</div>
							</form>

						</div>
					</div>
				</div>

	<script>
		function mostrarErro(erro){
            $("#status").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Erro!</strong> '+erro+'</div>');

        }

		function login(e){
			e.preventDefault();

			console.log("Logging...");
			let form = $("#form");

			$.ajax({
                type:"POST",
                url: "controller/user.php?op=login",
                data: form.serialize(),
                beforeSend:function(){
                    $("#botao").html("aguarde...");
                },
                success: function (data) {
                    if(data == "true"){
                        console.log("Shooww");
                        window.location.assign("meuperfil.php");
                    }else{
                        mostrarErro(data);
                        $('#email').val("");
                        $('#password').val("");

                    }
                    $("#botao").html("logar");
                    console.log(data);
                },
                error: function (data) {
                    console.log('Erro de conexão...');
                },
                
            });

		}
	</script>
	<!-- Header section end -->