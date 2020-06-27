<?php 
	include('connection.php');
	
	session_name('userHanabi_online');
	session_start();



	//MUDAR A FOTO DO PERFIL
	if(isset($_POST["button_pfp"])){

		//Verifica se foi enviado algo
		if(!empty($_FILES["pfp"]["name"])) {
	        //Pega informação do arquivo
	        $fileName = basename($_FILES["pfp"]["name"]); 
	        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
	         
	        //Permite certos formatos de arquivos
	        $allowTypes = array('jpg','png','jpeg','gif'); 
	        if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['pfp']['tmp_name']; 
				$imgContent = addslashes(file_get_contents($image));

				$update = "
					UPDATE hanabiUser
					SET
						userPhoto = '$imgContent',
						userUpdatetime = NOW()
					WHERE
						userEmail = '".htmlentities($_SESSION['email'])."'
				";
				$query = mysqli_query($con, $update);

				if($query <= 0){
					echo
					"<script type='text/javascript'>
						alert('Não foi possível enviar a imagem, escolha outra ou mude o formato.');
					</script>";
				}
			}else{
				echo
				"<script type='text/javascript'>
					alert('Apenas jpg, jpeg, png e gif são permitidos.');
				</script>";
			}
		}else{
			echo
			"<script type='text/javascript'>
				alert('Por favor, escolha uma imagem para enviar.');
			</script>";
		}	
	//REMOVER A FOTO DO PERFIL
	}else if(isset($_POST['button_remove_pfp'])){

		$remove = "
			UPDATE hanabiUser
			SET
				userPhoto = '',
				userUpdatetime = NOW()
			WHERE
				userEmail = '".htmlentities($_SESSION['email'])."'
		";
		$result = mysqli_query($con, $remove);

	//MUDAR O FUNDO DO PERFIL
	}else if(isset($_POST["button_profilebackground"])){
		//Verifica se foi enviado algo
		if(!empty($_FILES["profilebackground"]["name"])){
	        //Pega informação do arquivo 
	        $fileName = basename($_FILES["profilebackground"]["name"]); 
	        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
	         
	        //Permite certos formatos de arquivos
	        $allowTypes = array('jpg','png','jpeg'); 
	        if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['profilebackground']['tmp_name']; 
				$imgContent = addslashes(file_get_contents($image));

				$update = "
					UPDATE hanabiUser
					SET
						userBackground = '$imgContent',
						userUpdatetime = NOW()
					WHERE
						userEmail = '".htmlentities($_SESSION['email'])."'
				";
				$query = mysqli_query($con, $update);

				if($query <= 0){
					echo
					"<script type='text/javascript'>
						alert('Não foi possível enviar a imagem, escolha outra ou mude o formato.');
					</script>";
				}
			}else{
				echo
				"<script type='text/javascript'>
				alert('Apenas jpg, jpeg e png são permitidos.');
				</script>";
			}
		}else{
			echo
			"<script type='text/javascript'>
				alert('Por favor, escolha uma imagem para enviar.');
			</script>";
		}

	//REMOVER O FUNDO DO PERFIL
	}else if(isset($_POST["button_remove_profilebackground"])){
		$remove = "
			UPDATE hanabiUser
			SET
				userBackground = '',
				userUpdatetime = NOW()
			WHERE
				userEmail='".htmlentities($_SESSION['email'])."'
		";
		$result = mysqli_query($con, $remove);
	}

	//Fecha o banco
	mysqli_close($con);
	//Volta pro perfil
	echo '<script> window.history.back(); </script>';
?>