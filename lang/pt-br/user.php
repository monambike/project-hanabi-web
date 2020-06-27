<?php
	include("../../php/connection.php");
	session_name('userHanabi_online');
	session_start();

	if(isset($_SESSION['email'])){
		//Se estiver logado
		echo 
		'<style>
			#div_login_no{display: none;}
			#div_login_yes{display: all;}
		</style>';

		$getuser = "
			SELECT
				userUsername
			FROM hanabiUser
			WHERE
				userEmail = '".$_SESSION['email']."'
		";
		$result = mysqli_query($con, $getuser);
		
		while ($data = mysqli_fetch_array($result)) {
			echo
			'<script>
				if(localStorage.getItem(`query_user_result`) === null){
					localStorage.setItem(`query_user_result`, "'.htmlentities($data['userUsername']).'");
				}
			</script>';
		}

		//Se as cores forem padrão, não ativa a função
		$getcolors = "
			SELECT
				*
			FROM hanabiSettings
			WHERE
				userId = '".$_SESSION['id']."'
		    	AND settingsColor1='#8900B3'
		    	AND settingsColor2='#C91AFF'
		    	AND settingsColor3='#57006D'
		    	AND settingsColor4='#270033'
		    	AND settingsColor5='#C932FF'
		    	AND settingsColor6='#1E1E1E'
		    	AND settingsColor7='#8900B3'
		    	AND settingsColor8='#FFFFFF'
		";
		$colors_result = mysqli_query($con, $getcolors);
		$colors_rows = mysqli_num_rows($colors_result);

		if($colors_rows > 0){
			echo
			'<script>
				var logado = 1;
				var color_default = 1;
			</script>';
		}else{
			echo
			'<script>
				var logado = 1;
				var color_default = 0;
			</script>';
		}
	}else{
		header('Location: ../../errors/access_denied.html');
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>PROJETO HANABI - USUÁRIO</title>
		<!--Todos os metas-->
		<meta charset="utf-8"/>
		<meta name="application-name" content="Projeto Hanabi">
		<meta name="description" content="My Personal Site">
		<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
		<meta name="author" content="Vinícius Gabriel Marques de Melo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS e Javascript-->
		<link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
		<link rel="stylesheet" type="text/css" href="../../css/styleuser.css">
		<script type="text/javascript" src="../../js/events.js" async></script>
		<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="../../js/colors.js" async></script>
		<!--Ícones-->
		<link rel="icon" type="image/x-icon" href="../../images/hanabi.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../images/hanabi.png">
	</head>
	<body onload="localStorage.setItem('account_was_open', 'false'); verify_account_state(); localStorage.setItem('language', 'pt-br'); changeimage2(); colorSet(); waitCompleteLoad();">
		<div id=loadContent>
			<a id="top" hidden></a>
			<a id="link_to_top" href="#top"><img id="img_goup" src="../../images/goup1.png" onmouseover="changeimage1()" onmouseout="changeimage2()"></a>
			<?php
				if(isset($_SESSION['email'])){
			?>
					<div>
						<iframe id="iframe_chat" src="chat.php" style="display: none;" scrolling="no"></iframe>
						<button id="btn_iframe" class="btn_button" onmousedown="interactIframe()">Chat</button>
					</div>
			<?php
				}
			?>
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
									echo '<a onmousedown="movelink(`user.php?='.$data['userUsername'].'`)"><img style="background-image: url(data:image/jpg;charset=utf8;base64,'.base64_encode($data['userPhoto']).')"></a>';
								}else{

									echo '<a onmousedown="movelink(`user.php?='.$data['userUsername'].'`)"><img style="background-image: url(../../images/usericon.png)"></a>';

								}

								echo '
								<br>
								<br>
								<a onmousedown="movelink(`user.php?user=Monambike`)"><span>'.htmlentities($data['userName']).'</span></a>
								<br>
								<a onmousedown="movelink(`user.php?user=Monambike`)"><span>('.htmlentities($data['userUsername']).')</span></a>
								<br>
								<br>
								<hr>
								<a onmousedown="movelink(`user.php?user=Monambike`)">Meu Perfil</a>';
							}
						?>
						<br>
						<br>
						<a onmousedown="movelink('usersettings.php')">Editar Perfil</a>
						<br>
						<hr>
						<a onmousedown="movelink('usersearch.php')">Procurar Pessoas</a>
						<br>
						<br>
						<a onmousedown="movelink('chat.php')">Entrar no Chat Público</a>
						<br>
						<hr>
						<a id="txt_logoff" onmousedown="movelink('logoff.php')">Fazer Logoff</a>
					</div>
				</div>
				<section>
					<div id="div_user_tabs">
						<ul>
							<li><a onmousedown="">PERFIL</a></li>
						</ul>
					</div>
					<div>
						<div id="div_user">
							<?php
								$view_user = $_GET['user'];

								$user_search = "
								SELECT
									userName,
									userSurname,
									userUsername,
									userEmail,
									userCountry,
									userGender,
									userPhone,
									userCellphone,
									userBio,
									userPhoto,
									userRegistertime
								FROM hanabiUser
								WHERE
									userUsername = '$view_user'
								";
								$result_search = mysqli_query($con,$user_search);
								$results = mysqli_num_rows($result_search);

								if($results > 0){
									//Mostra o usuário
									while ($data = mysqli_fetch_array($result_search)) {
										if($data['userPhoto']){
											echo '<img src="data:image/jpg;charset=utf8;base64, '.base64_encode($data['userPhoto']).'">';
										}else{
											echo '<img src="../../images/usericon.png">';	
										}
									}
								}else{
									echo
									'<script>
										window.open("../../errors/not_found.html", "_self");
									</script>';
								}

								mysqli_close($con);
							?>
						</div>
						<div id="div_content">						
						</div>
					</div>
				</section>
			</div>
		</div>
	</body>
</html>