<?php
	include("../../php/connection.php");
	session_name('userHanabi_online');
	session_start();

	//Usuário sendo visualizado
	$view_user = $_GET['user'];

	if(isset($_SESSION['email'])){
		//Se estiver logado
		echo 
		'<style>
			#div_login_no{display: none;}
			#div_login_yes{display: all;}
		</style>';

		$getusername = "
			SELECT
				userUsername
			FROM hanabiUser
			WHERE
				userEmail = '".$_SESSION['email']."'
		";
		$username_result = mysqli_query($con, $getusername);
		
		while ($data = mysqli_fetch_array($username_result)) {
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

		$getid = "
			SELECT
				userId
			FROM hanabiUser
			WHERE
				userUsername = '$view_user'
		";
		$getid_query = mysqli_query($con, $getid);

		while($data = mysqli_fetch_array($getid_query)){
			$userId = $data["userId"];
		}
		if($colors_rows > 0){
			echo
			'<script>
				var logado = 1;
				var color_default = 1;
			</script>';
		}else{
			$searcheduser_colors = "
				SELECT
					settingsColor1,
					settingsColor2,
					settingsColor3,
					settingsColor4,
					settingsColor5,
					settingsColor6,
					settingsColor7,
					settingsColor8
			    FROM hanabiSettings
				WHERE
					userId = '$userId'
			";
			$searcheduser_result = mysqli_query($con, $searcheduser_colors);

			while ($data = mysqli_fetch_array($searcheduser_result)) {
				//Garante que ao logar receba as cores certas
				echo
				"<script type='text/javascript'>
					localStorage.setItem('color1', '".$data["settingsColor1"]."');
					localStorage.setItem('color2', '".$data["settingsColor2"]."');
					localStorage.setItem('color3', '".$data["settingsColor3"]."');
					localStorage.setItem('color4', '".$data["settingsColor4"]."');
					localStorage.setItem('color5', '".$data["settingsColor5"]."');
					localStorage.setItem('color6', '".$data["settingsColor6"]."');
					localStorage.setItem('color7', '".$data["settingsColor7"]."');
					localStorage.setItem('color8', '".$data["settingsColor8"]."');
				</script>";
			}

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
	<?php


		$getbackground = "
			SELECT
				userBackground
			FROM hanabiUser
			WHERE
				userId = '$userId'
		";
		$result_background = mysqli_query($con, $getbackground);

		while ($data = mysqli_fetch_array($result_background)) {
	?>
	<body onload="bodyLoadFunction('language', 'pt-br', '1234')" style='background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['userBackground']); ?>")'>
	<?php
		}
	?>
		<div id=loadContent>
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
							$getuser = "
								SELECT
									userName,
									userUsername,
									userPhoto
								FROM hanabiUser
								WHERE
									userEmail = '".$_SESSION['email']."'
							";
							$result = mysqli_query($con, $getuser);
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
					<div id="div_user_tabs">
						<ul>
							<li><a onmousedown="">PERFIL</a></li>
						</ul>
					</div>
					<div>
						<div id="div_user">
							<?php
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
											echo '<img id="pfp" src="data:image/jpg;charset=utf8;base64, '.base64_encode($data['userPhoto']).'">';
										}else{
											echo '<img id="pfp" src="../../images/usericon.png">';
										}
										?>
										<br>
										<br>
										<span>Registrado(a) em: <?php echo htmlentities($data['userRegistertime']); ?></span>
										<br>
										<br>
										<span><?php echo htmlentities($data['userName']) ?></span>
										<br>
										<span><?php echo htmlentities($data['userSurname']) ?></span>
										<br>
										<span>(<?php echo htmlentities($data['userUsername']); ?>)</span>
										<br>
										<br>
										<br>
										<?php
											echo
											'<table>
												<tr>
													<td><img src="../../images/flags/'.$data['userCountry'].'.png" class="ico_account"></td>
													<td><img src="../../images/genders/'.$data['userGender'].'.png" class="ico_account"></td>
												</tr>
												<tr>
													<td>PAÍS</td>
													<td>GÊNERO</td>
												</tr>
											</table>';
										?>
										<br>
										<br>
										<br>
										<label>Email:</label>
										<br>
										<span><?php echo htmlentities($data['userEmail']) ?></span>
										<br>
										<br>
										<br>
										<label>Telefone:</label>
										<br>
										<span><?php echo htmlentities($data['userPhone']) ?></span>
										<br>
										<br>
										<br>
										<label>Celular:</label>
										<br>
										<span><?php echo htmlentities($data['userCellphone']) ?></span>
										<br>
										<br>
										<br>
										<label>Biografia:</label>
										<br>
										<span><?php echo htmlentities($data['userBio']) ?></span>
										<?php
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
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div id="div_cookies" style="display: none;">
			Utilizando o nosso site e continuando a navegar vamos entender que você aceita a nossa política de <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>. Caso queira saber mais sobre <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>, como usamos e a nossa política clique no link exibido.</a>
			<br>
			<br>
			<button class="btn_button" onmousedown="setCookie('terms_of_cookie', 'allowed', 365)">Fechar</button>
		</div>
	</body>
</html>