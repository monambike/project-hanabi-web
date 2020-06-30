<?php
	include("../../php/connection.php");
	session_name('userHanabi_online');
	session_start();

	if(isset($_SESSION['email'])){
		header('Location: ../../errors/access_denied.html');
	}else{
		//Se não estiver logado
		echo 
		'<style>
			#div_login_no{display: all;}
			#div_login_yes{display: none;}
		</style>';
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>PROJETO HANABI - ESQUECI A SENHA</title>
		<!--Todos os metas-->
		<meta charset="utf-8"/>
		<meta name="application-name" content="Projeto Hanabi">
		<meta name="description" content="My Personal Site">
		<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
		<meta name="author" content="Vinícius Gabriel Marques de Melo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS e Javascript-->
		<link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
		<link rel="stylesheet" type="text/css" href="../../css/styleforgot.css">
		<script type="text/javascript" src="../../js/events.js" async></script>
		<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
		<!--Ícones-->
		<link rel="icon" type="image/x-icon" href="../../images/hanabi.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../images/hanabi.png">
	</head>
<<<<<<< Updated upstream
	<body onload="verify_account_state(); localStorage.setItem('language', 'pt-br'); changeimage2();">
=======
	<body id="loadContent" onload="bodyLoadFunction('language', 'pt-br', '123')" style="display: none;">
>>>>>>> Stashed changes
		<a id="top" hidden></a>
		<a id="link_to_top" href="#top"><img id="img_goup" src="../../images/goup1.png" onmouseover="changeimage1()" onmouseout="changeimage2()"></a>
		<div style="background-color: rgba(255,255,255,0.85);">
			<header>
				<div id="div_main">
					<a onmousedown="movelink('home.php')"><h1>PROJETO HANABI</h1></a>
				</div>
				<nav id="nav_language">
					<h4>IDIOMA:</h4>
					<ul>
						<li>
							<a onmousedown="movelink('../pt-br/forgot.php')" class="txt_selected">BR</a>
							<span>|</span>
							<a onmousedown="movelink('../es-es/forgot.php')">ES</a>
						</li>
						<li>
							<a onmousedown="movelink('../ja-jp/forgot.php')">JP</a>
							<span style="margin-left: 3px;">|</span>
							<a onmousedown="movelink('../en-us/forgot.php')">EN</a>
						</li>
					</ul>
				</nav>
			</header>
			<!--Navegação no celular-->
			<div id="div_navphone">
			  <button class="btn_opennav" onclick="openNav()">☰ PROJETO HANABI</button>  
			</div>
			<div id="div_sidebar_id" class="div_sidebar_class">
				<a href="javascript:void(0)" class="btn_closenav" onclick="closeNav()">×</a>
				<br>
				<span><b>MENU</b></span>
				<hr>
				<br>
				<span>- GUIAS -</span>
				<br>
				<a onmousedown="movelink('home.php')">INÍCIO</a>
				<a onmousedown="movelink('game.php')">JOGOS</a>
				<a onmousedown="movelink('art.php')">ARTES</a>
				<a onmousedown="movelink('about.php')">SOBRE O SITE</a>
				<hr>
				<br>
				<span>- IDIOMA -</span>
				<br>
				<a onmousedown="movelink('../pt-br/home.php')" class="txt_selected">BR</a>
				<a onmousedown="movelink('../es-es/home.php')">ES</a>
				<a onmousedown="movelink('../ja-jp/home.php')">JP</a>
				<a onmousedown="movelink('../en-us/home.php')">EN</a>
				<br>
				<br>
				<br>
				<br>
			</div>
			<!--Navegação Padrão-->
			<nav id="nav_menu">
				<ul>
					<li><a onmousedown="movelink('home.php')">INÍCIO</a></li>
					<li><a onmousedown="movelink('game.php')">JOGOS</a></li>
					<li><a onmousedown="movelink('art.php')">ARTES</a></li>
					<li><a onmousedown="movelink('about.php')">SOBRE O SITE</a></li>
				</ul>
			</nav>
			<div id="div_account_switch"><a onmousedown="change_account_state()">CONTA</a></div>
			<div id="div_account">
				<!--Não logado-->
				<div id="div_login_no">
					<form id="form_login" method="POST" action="../../php/login.php">
						<label for="login">Usuário ou E-mail:</label>
						<br>
						<input id="txt_email" class="txt_textbox" type="text" name="login" placeholder="Digite seu nome de usuário ou e-mail." maxlength="50" required/>&nbsp
						<br>
						<br>
						<label for="senha">Senha:</label>
						<br>
						<input id="txt_password" class="txt_textbox" type="password" name="password" placeholder="Digite sua senha." maxlength="20" required/>&nbsp
						<br>
						<br>
						<a id="txt_signup" onmousedown="movelink('signup.php')">Criar uma conta.</a>
						<br>
						<br>
						<button class="btn_button" onmousedown="movelink('login')" value="Entrar">Entrar</button>
						<br>
						<br>
						<a id="txt_forgot" onmousedown="movelink('forgot.php')">Esqueci a senha.</a>
					</form>
				</div>
				<!--Logado-->
				<div id="div_login_yes">
					<?php
						while ($data = mysqli_fetch_array($result)) {
							if($data['userPhoto']){
								echo '<a onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`)"><img style="background-image: url(data:image/jpg;charset=utf8;base64,'.base64_encode($data['userPhoto']).')"></a>';
							}else{

								echo '<a onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`)"><img style="background-image: url(../../images/usericon.png)"></a>';

							}

							echo '
							<br>
							<br>
							<a onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`)"><span>'.htmlentities($data['userName']).'</span></a>
							<br>
							<a onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`)"><span>('.htmlentities($data['userUsername']).')</span></a>
							<br>
							<br>
							<hr>
							<a onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`)">Meu Perfil</a>';
						}
					?>
					<br>
					<br>
					<a onmousedown="movelink('settings.php')">Editar Perfil</a>
					<br>
					<hr>
					<a onmousedown="movelink('search.php')">Procurar Pessoas</a>
					<br>
					<br>
					<a onmousedown="movelink('chat.php')">Entrar no Chat Público</a>
					<br>
					<hr>
					<a id="txt_logoff" onmousedown="movelink('logoff.php')">Fazer Logoff</a>
				</div>
			</div>
			<section>
				<h2>RECUPERAR SENHA</h2>
				<div class="div_content">
					<form id="form_forgot" method="POST" action="../../php/forgot.php">
						<label for="email">E-mail:</label>
						<input type="email" name="email">
						<br>
						<br>
						<label for="password">Senha:</label>
						<input type="password" name="password">
						<br>
						<br>
						<input class="btn_button" type="submit" name="Recuperar" value="Recuperar">
					</form>
				</div>	
			</section>
			<footer>
				Site criado por Vinícius Gabriel Marques de Melo com propostas educativas.
				<br>Sendo mantido desde 2020 até 2020
				<br>Caso utilizar o site em qualquer meio público mesmo que seja como proposta educativa, favor disponibilizar os créditos.
			</footer>
		</div>
	</body>
</html>