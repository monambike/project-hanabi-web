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
				userName,
				userUsername,
				userPhoto
			FROM hanabiUser
			WHERE
				userEmail = '".$_SESSION['email']."'
		";
		$result = mysqli_query($con, $getuser);
		
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
		<title>PROJETO HANABI - JOGOS</title>
		<!--Todos os metas-->
		<meta charset="utf-8"/>
		<meta name="application-name" content="Projeto Hanabi">
		<meta name="description" content="My Personal Site">
		<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
		<meta name="author" content="Vinícius Gabriel Marques de Melo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS e Javascript-->
		<link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
		<link rel="stylesheet" type="text/css" href="../../css/stylesearch.css">
		<script type="text/javascript" src="../../js/events.js" async></script>
		<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="../../js/colors.js" async></script>
		<!--Ícones-->
		<link rel="icon" type="image/x-icon" href="../../images/hanabi.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../images/hanabi.png">
	</head>
	<body onload="bodyLoadFunction('language', 'pt-br', 1)">
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
								<a onmousedown="movelink('../pt-br/search.php')" class="txt_selected">BR</a>
								<span>|</span>
								<a onmousedown="movelink('../es-es/search.php')">ES</a>
							</li>
							<li>
								<a onmousedown="movelink('../ja-jp/search.php')">JP</a>
								<span style="margin-left: 3px;">|</span>
								<a onmousedown="movelink('../en-us/search.php')">EN</a>
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
					<h2>PESQUISAR</h2>
					<div class="div_content">
						<form method="GET">
							<input id="txt_search" type="search" placeholder="Digite o email ou nome de usuário..." name="query"><button class="btn_button" type="submit">Procurar</button>
							<br>
							<br>
							<br>
							<ul id="ul_search">
							<?php
								//Estava dando algumas mensagens de erro então, as duas condições são necessárias

								//Essa condição verifica se ela existe
								//Para evitar aviso de erro, só realiza os procedimentos caso ela não esteja vazia
								if(isset($_GET['query'])){
									//Esse verifica se a query está vazia, se não estiver executa
									if($_GET['query'])  {
									$query = $_GET['query'];

									//Realiza pesquisa
									$query_users = "
										SELECT
											userName,
											userUsername,
											userPhoto
										FROM hanabiUser
										WHERE
											(userEmail = '$query' OR userUsername = '$query')
										ORDER BY userName
									";
									$query_result = mysqli_query($con, $query_users);

									//Verifica se veio algum resultado
									$rows = mysqli_num_rows($query_result);
									//Caso tenha vindo
									if($rows > 0){
										//Mostra o usuário
										while ($data = mysqli_fetch_array($query_result)) {
											echo
											'<li id="'.$data['userUsername'].'" class="item" onmousedown="movelink(`user.php?user='.htmlentities($data['userUsername']).'`);">
												<div id="div_pfp">';
													if($data['userPhoto']){
														echo '<img src="data:image/jpg;charset=utf8;base64, '.base64_encode($data['userPhoto']).'">';
													}else{
														echo '<img src="../../images/usericon.png">';
													}
												echo
												'</div>
												<div id="div_query">
													<a class="query">
														'.htmlentities($data['userName']).' 
														<span id="txt_query_result">
															('.htmlentities($data['userUsername']).')
														</span>
													</a>
												</div>
											</li>';
										}
									}else{
									//Caso contrário, mostra mensagem de aviso
									echo
									"Nenhum resultado para '".htmlentities($_GET['query'])."'
									<br>
									<br>
									<br>
									<br>
									<h3>Putz! Não achei nada aqui :/</h3>
									<p>Verifique se você digitou o e-mail ou o nome de usuário corretamente!</p>";
									}
								}else{
									//Caso esteja vazia, mostra uma mensagem
									echo
									"
									<h3>Procurar por Usuários</h3>
									<br>
									<p>
									Que tal começar procurando por amigos ou outros usuários do site?
									<br>
									<br>
									Dica: tente procurar pelo usuário ou email deles! ;D
									</p>
									<img src='../../images/taptap.gif'>";
								}
							}else{
								//Se não existir mostra uma mensagem
								echo
								"
								<h3>Procurar por Usuários</h3>
								<br>
								<p>
								Que tal começar procurando por amigos ou outros usuários do site?
								<br>
								<br>
								Dica: tente procurar pelo usuário ou email deles! ;D
								</p>
								<img src='../../images/taptap.gif'>";
							}

							mysqli_close($con);
							?>
							</ul>
							<br>
						</form>
					</div>
				</section>
				<div id="div_cookies" style="display: none;">
					Utilizando o nosso site e continuando a navegar vamos entender que você aceita a nossa política de <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>. Caso queira saber mais sobre <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>, como usamos e a nossa política clique no link exibido.</a>
					<br>
					<br>
					<button class="btn_button" onmousedown="setCookie('terms_of_cookie', 'allowed', 365)">Fechar</button>
				</div>
				<footer>
					Site criado por Vinícius Gabriel Marques de Melo com propostas educativas.
					<br>Sendo mantido desde 2020 até 2020
					<br>Caso utilizar o site em qualquer meio público mesmo que seja como proposta educativa, favor disponibilizar os créditos.
				</footer>
			</div>
		</div>
	</body>
</html>