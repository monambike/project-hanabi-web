<?php 
	include("connection.php");
	session_name('userHanabi_online');
	session_start();

	$c1 = $_POST["site_color1"];
	$c2 = $_POST["site_color2"];
	$c3 = $_POST["site_color3"];
	$c4 = $_POST["site_color4"];
	$c5 = $_POST["site_color5"];
	$c6 = $_POST["site_color6"];
	$c7 = $_POST["site_color7"];
	$c8 = $_POST["site_color8"];

	//Esvazia as markbox antes de enviar dados
    $update = "
	    UPDATE hanabiSettings
	    SET
	    	settingsColor1='$c1',
	    	settingsColor2='$c2',
	    	settingsColor3='$c3',
	    	settingsColor4='$c4',
	    	settingsColor5='$c5',
	    	settingsColor6='$c6',
	    	settingsColor7='$c7',
	    	settingsColor8='$c8',
	    	settingsSrcOptions='',
	    	settingsSeeOptions='',
			settingsUpdatetime = NOW()
    	WHERE
			userId='".$_SESSION['id']."'
	";
	$query=mysqli_query($con, $update);

	//Pesquisa
	if(isset($_POST["src_options"])){
		$src = $_POST["src_options"];
		$src_implode = implode(",",$src);

		$update = "
			UPDATE hanabiSettings
			SET
				settingsSrcOptions='$src_implode'
			WHERE
				userId='".$_SESSION['id']."'
		";
		$query=mysqli_query($con, $update);
	}
	//Visualização
	if(isset($_POST["see_options"])){
		$see = $_POST["see_options"];
		$see_implode = implode(",",$see);

		$update = "
			UPDATE hanabiSettings
			SET
				settingsSeeOptions='$see_implode'
			WHERE
				userId='".$_SESSION['id']."'
		";
		$query=mysqli_query($con, $update);
	}

	echo
	"<script type='text/javascript'>
		localStorage.setItem('color1', '$c1');
		localStorage.setItem('color2', '$c2');
		localStorage.setItem('color3', '$c3');
		localStorage.setItem('color4', '$c4');
		localStorage.setItem('color5', '$c5');
		localStorage.setItem('color6', '$c6');
		localStorage.setItem('color7', '$c7');
		localStorage.setItem('color8', '$c8');
	</script>";

	mysqli_close($con);

	echo
	"<script type='text/javascript'>
		window.history.back();
	</script>";
?>