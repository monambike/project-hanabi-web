<?php
	include("connection.php");
	session_name('userHanabi_online');
	session_start();

	$reset = "
		UPDATE hanabiSettings
		SET
	    	settingsColor1='#8900B3',
	    	settingsColor2='#C91AFF',
	    	settingsColor3='#57006D',
	    	settingsColor4='#270033',
	    	settingsColor5='#C932FF',
	    	settingsColor6='#1E1E1E',
	    	settingsColor7='#8900B3',
	    	settingsColor8='#FFFFFF',
			settingsUpdatetime = NOW()
		WHERE
			userId = '".$_SESSION['id']."'
	";
	$result = mysqli_query($con, $reset);

	mysqli_close($con);
	
	echo
	"<script type='text/javascript'>
		window.history.back();
	</script>";
?>