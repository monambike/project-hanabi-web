<?php
	// REALIZA O ENVIO DE MENSAGEM AO CHAT
	// -------------------------------------------------------------
	// Descrição:
	// Faz a conexão do usuário e realiza o envio  da  mensagem  pro
	// chat.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// Estabelece a conexão com o banco
	include('connection.php');

	// Entra com um nome para a sessão
	session_name('userHanabi_online');
	session_start();
	
	// Pega a hora atual
	$now = new DateTime();
	
	// Query para pegar o nome do usuário
	$getusername = "
		SELECT
			userUsername,
			CURRENT_TIME()
		FROM hanabiUser
		WHERE
			userEmail = '".htmlentities($_SESSION['email'])."'
	";
	
	// Executa a query
	$result = mysqli_query($con, $getusername);

	// Faz o envio da mensagem ao chat
	while ($data = mysqli_fetch_array($result)) {
		if(isset($_SESSION['email'])){
			$text = $_POST['text'];

			$fp = fopen("chat_log.html", 'a');
			fwrite($fp, "<div class='msgln'><b>".htmlentities($data['userUsername'])."</b> <i>(".htmlentities($data['CURRENT_TIME()']).")</i>: ".stripslashes(htmlspecialchars($text))."<br></div>");
			fclose($fp);
		}
	}


	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
?>