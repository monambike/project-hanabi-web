<?php
	// Rede Local
	$con = mysqli_connect('Localhost','root','','projecthanabidb');
	
	// WebHost
	//$con = mysqli_connect('Localhost','id13846883_monambike','05X[VOY<ahR&!iYk','id13846883_projecthanabidb');

	if(mysqli_connect_error()){
		echo
		'<script>
			window.open("../../errors/database_connection.html", "_self");
		</script>';
	}
?>