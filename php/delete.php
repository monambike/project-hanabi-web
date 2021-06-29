<?php
	// REALIZA A DELEÇÃO DE UM USUÁRIO
	// -------------------------------------------------------------
	// Descrição:
	// Apaga uma conta de usuário.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// Estabelece a conexão com o banco
	include("connection.php");

	// Entra com um nome para a sessão
	session_name('userHanabi_online');
	session_start();
	
	// Armazena Query para fazer a deleção de um usuário
	$delete = '
		DELETE
		FROM hanabiUser
		WHERE
			userEmail = "'.htmlentities($_SESSION['email']).'"
	';

	// Executa a Query
	$result = mysqli_query($con, $delete);

	mysqli_close($con);

	// Método para deletar completamente a sessão
	$_SESSION = array();
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Outro método para encerrar a sessão atual
	session_destroy();

	// Depois de concluído dá um aviso de conclusão e redireciona  o
	// usuário
	echo
	'<script>
		alert("Usuário deletado com sucesso!");
		window.open("../lang/" + localStorage.getItem("language") + "/home.php", "_self");
	</script>';



	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
?>