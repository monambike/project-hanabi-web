<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>PROJETO HANABI - CHAT</title>
		<!--Todos os metas-->
		<meta charset="utf-8"/>
		<meta name="application-name" content="Projeto Hanabi">
		<meta name="description" content="My Personal Site">
		<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
		<meta name="author" content="Vinícius Gabriel Marques de Melo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS e Javascript-->
		<link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
		<link rel="stylesheet" type="text/css" href="../../css/stylechat.css">
		<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="../../js/chat.js" async></script>
		<script type="text/javascript" src="../../js/events.js" async></script>
		<script type="text/javascript" src="../../js/colors.js" async></script>
		<!--Ícones-->
		<link rel="icon" type="image/x-icon" href="../../images/hanabi.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../images/hanabi.png">
		<title>Chat - Customer Module</title>
	</head>
	<body id="body_chat" onload="bodyLoadFunction('language', 'pt-br', 1);$('#div_chatbox').animate({ scrollTop: $('#div_chatbox').prop('scrollHeight')}, 'normal');">
		<div id=loadContent>
			<?php
				include("../../php/connection.php");
				session_name("userHanabi_online");
				session_start ();

				//CASO NÃO ESTEJA LOGADO
				if(!isset($_SESSION['email'])){
					header('Location: ../../errors/access_denied.html');
				}else{
				//CASO ESTEJA LOGADO
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

					$getuserdata = "
						SELECT
							userName,
							userUsername,
							userCountry,
							userPhoto
						FROM hanabiUser
						WHERE
							userEmail = '".$_SESSION['email']."'
					";
					$result = mysqli_query($con, $getuserdata);

					while ($data = mysqli_fetch_array($result)) {

					/*//CASO DEIXAR A SESSÃO
					if(isset($_GET['logout'])){
						//Deixa uma mensagem de que o usuário deixou a sala
						$fp = fopen ( "../../php/chat_log.html", 'a' );
						fwrite ($fp, "<div class='msgln'><i>".htmlentities($data["userUsername"])." deixou o chat.</i><br></div>");
						fclose ($fp);

						//Leva o usuário para a tela de início
						header ( "Location: home.php" );
					//CASO ENTRAR NA SESSÃO
					}else{
						//Caso o usuário esteja logado
						$_SESSION ['email'] = stripslashes ( htmlspecialchars ( $_SESSION ['email'] ) );
						$fp = fopen ( "../../php/chat_log.html", 'a' );
						//Deixa uma mensagem de que o usuário entrou na sala
						fwrite ( $fp, "<div class='msgln'><i>".htmlentities($data["userUsername"])." entrou no chat.</i><br></div>");
							fclose ( $fp );
					}*/
			?>
				<div id="div_chat_container">
					<div id="div_top">
						Seja bem vindo(a),<br><b><?php echo htmlentities($data['userName']); ?></b>
						<br>
						<br>
						<button id="exit" class="btn_button" name="button_Exit">Sair do Chat</button>
					</div>
					<div id="div_chat_content">
						<div id="div_chatbox">
							<?php
								if (file_exists ( "../../php/chat_log.html" ) && filesize ( "../../php/chat_log.html" ) > 0) {
									$handle = fopen ( "../../php/chat_log.html", "r" );
									$contents = fread ( $handle, filesize ( "../../php/chat_log.html" ) );
									fclose ( $handle );

									echo $contents;
								}
							?>
						</div>						
					</div>
					<form name="message" action="" autocomplete="off">
						<input id="txt_message_send" name="txt_message_send" type="text" placeholder="Pressione enter para enviar!" onkeyup="remainingText()">
						<span id="remaining_text">(255)</span>
						<br>
						<br>
						<input id="btn_chat_send" class="btn_button" name="btn_chat_send" type="submit" value="Enviar">
					</form>
				</div>
			<?php
					}
				}
			?>
		</div>
		<div id="div_cookies" style="display: none;">
			Utilizando o nosso site e continuando a navegar vamos entender que você aceita a nossa política de <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>. Caso queira saber mais sobre <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>, como usamos e a nossa política clique no link exibido.</a>
			<br>
			<br>
			<button class="btn_button" onmousedown="setCookie('terms_of_cookie', 'allowed', 365)">Fechar</button>
		</div>
	</body>
</html>