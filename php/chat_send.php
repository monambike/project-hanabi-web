<?php
	include('connection.php');
	session_name('userHanabi_online');
	session_start();
	$now = new DateTime();
	$getusername = "
		SELECT
			userUsername,
			CURRENT_TIME()
		FROM hanabiUser
		WHERE
			userEmail = '".htmlentities($_SESSION['email'])."'
	";
	$result = mysqli_query($con, $getusername);

	while ($data = mysqli_fetch_array($result)) {
		if(isset($_SESSION['email'])){
			$text = $_POST['text'];

			$fp = fopen("chat_log.html", 'a');
			fwrite($fp, "<div class='msgln'><b>".htmlentities($data['userUsername'])."</b> <i>(".htmlentities($data['CURRENT_TIME()']).")</i>: ".stripslashes(htmlspecialchars($text))."<br></div>");
			fclose($fp);
		}
	}
?>