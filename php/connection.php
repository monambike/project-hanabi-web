<?php
	// FAZ A CONEXÃO COM O BANCO
	// -------------------------------------------------------------
	// Descrição:
	// Realiza a conexão com o banco.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	

	
	// CONEXÕES
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// Estabelece a conexão com a Rede Local
	$con = mysqli_connect('Localhost','root','','projecthanabidb');
	
	// Estabelece a conexão em WebHost
	//$con = mysqli_connect('Localhost','id13846883_monambike','05X[VOY<ahR&!iYk','id13846883_projecthanabidb');
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------

	// Executa a conexão com o banco
	if(mysqli_connect_error()){
		echo
		'<script>
			window.open("../../errors/database_connection.html", "_self");
		</script>';
	}
	


	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------
?>