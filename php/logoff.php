<?php
	session_name('userHanabi_online');
	session_start();

	// Método para deletar completamente a sessão
	$_SESSION = array();
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	session_destroy();

	echo
	'<script>
		window.open("../lang/" + localStorage.getItem("language") + "/home.php", "_self");
	</script>';
?>