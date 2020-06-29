<?php 
	include("../../php/connection.php");
	session_name('userHanabi_online');
	session_start();


	if(isset($_SESSION['email'])){
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
				userSurname,
				userUsername,
				userEmail,
				userPassword,
				userCountry,
				userGender,
				userPhone,
				userCellphone,
				userBio,
				userPhoto,
				userBackground,
				userRegistertime
			FROM hanabiUser
			WHERE
				userEmail = '".$_SESSION['email']."'
		";
		$result_user = mysqli_query($con, $getuserdata);

		$getsettingsdata = "
			SELECT
				settingsColor1,
				settingsColor2,
				settingsColor3,
				settingsColor4,
				settingsColor5,
				settingsColor6,
				settingsColor7,
				settingsColor8,
				settingsSrcOptions,
				settingsSeeOptions,
				settingsUpdateTime
			FROM hanabiSettings
			WHERE
				userId = '".$_SESSION['id']."'
		";
		$result_settings = mysqli_query($con, $getsettingsdata);
	}else{
		header('Location: ../../errors/access_denied.html');
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>PROJETO HANABI</title>
		<!--Todos os metas-->
		<meta charset="utf-8"/>
		<meta name="application-name" content="Projeto Hanabi">
		<meta name="description" content="My Personal Site">
		<meta name="keywords" content="HTML, CSS, JavaScript, PHP">
		<meta name="author" content="Vinícius Gabriel Marques de Melo">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS e Javascript-->
		<link rel="stylesheet" type="text/css" href="../../css/stylemain.css">
		<link rel="stylesheet" type="text/css" href="../../css/stylesettings.css">
		<script type="text/javascript" src="../../js/events.js" async></script>
		<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="../../js/colors.js" async></script>
		<!--Ícones-->
		<link rel="icon" type="image/x-icon" href="../../images/hanabi.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../images/hanabi.png">
	</head>
	<?php
		while ($data = mysqli_fetch_array($result_user)) {
	?>
	<body onload="resetedit(); bodyLoadFunction('language', 'pt-br', 1)" style='background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['userBackground']); ?>")'>
		<div id=loadContent>
			<div id="div_header">
				<input class="btn_button" type="button" value="VOLTAR" onmousedown="movelink('return')">
				<input class="btn_button" type="button" value="SALVAR CONFIGURAÇÕES" style="float: right;" onmousedown="movelink('saveconfig')">
			</div>
			<section>
				<div id="div_profile">
					<h3>PERFIL</h3>
					<hr>
					<form id="form_upload" method="POST" action="../../php/upload_pfp.php" enctype="multipart/form-data">
						<h5 class="txt_settings_text">Foto de Perfil</h5>
						<?php
							if($data['userPhoto']){
						?>
								<img style='background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['userPhoto']); ?>")'>
						<?php
							}else{
						?>
								<img style='background-image: url("../../images/usericon.png")'>
						<?php
							}
						?>
						<br>
						<br>
						<span class="txt_settings_text">Registrado(a) em: <?php echo htmlentities($data['userRegistertime']); ?></span>
						<br>
						<br>
						<input class="btn_button input_file" type="file" name="pfp">
						<br>
						<br>
						<button class="btn_button" name="button_pfp">Enviar</button>
						<button class="btn_button" name="button_remove_pfp">Remover</button>
						<br>
						<br>
						<hr>
						<h5 class="txt_settings_text">Fundo Perfil</h5>
						<input class="btn_button input_file" type="file" name="profilebackground">
						<br>
						<br>
						<button class="btn_button" name="button_profilebackground">Enviar</button>
						<button class="btn_button" name="button_remove_profilebackground">Remover</button>
						<br>
						<br>
					</form>
					<form id="form_update" method="POST" action="../../php/update.php">
						<br>
						<input id="button_edit" class="btn_button" type="button" value="EDITAR" onmousedown="changeedit()">
						<input class="btn_button" type="button" value="APAGAR CONTA" onmousedown="deleteaccount()">
						<br>
						<br>
						<?php
							echo
							'<table>
								<tr>
									<td><img src="../../images/flags/'.$data['userCountry'].'.png" class="ico_account"></td>
									<td><img src="../../images/genders/'.$data['userGender'].'.png" class="ico_account"></td>
								</tr>
								<tr>
									<td class="txt_settings_text">PAÍS</td>
									<td class="txt_settings_text">GÊNERO</td>
								</tr>
							</table>';
						?>
						<br>
						<br>
						<label for="name" class="txt_settings_text">Nome:</label>
						<br>
						<?php echo '<input id="prof_txt_name" type="text" name="name" value="'.$data['userName'].'" maxlength="35">' ?>
						<span id="prof_lbl_name" class="txt_settings_text"><?php echo htmlentities($data['userName']); ?></span>
						<br>
						<br>
						<br>
						<label for="surname" class="txt_settings_text">Sobrenome:</label>
						<br>
						<?php echo '<input id="prof_txt_surname" type="text" name="surname" value="'.$data['userSurname'].'" maxlength="35">' ?>
						<span id="prof_lbl_surname" class="txt_settings_text"><?php echo htmlentities($data['userSurname']); ?></span>
						<br>
						<br>
						<br>
						<label for="username" class="txt_settings_text">Usuário:</label>
						<br>
						<?php echo '<input id="prof_txt_username" type="text" name="username" value="'.$data['userUsername'].'" maxlength="20">' ?>
						<span id="prof_lbl_username" class="txt_settings_text"><?php echo htmlentities($data['userUsername']); ?></span>
						<br>
						<br>
						<br>
						<label for="email" class="txt_settings_text">E-mail:</label>
						<br>
						<?php echo '<input id="prof_txt_email" type="text" name="email" value="'.$data['userEmail'].'" maxlength="50">' ?>
						<span id="prof_lbl_email" class="txt_settings_text"><?php echo htmlentities($data['userEmail']); ?></span>
						<br>
						<br>
						<br>
						<label for="phone" class="txt_settings_text">Telefone:</label>
						<br>
						<?php echo '<input id="prof_txt_phone" type="text" name="phone" value="'.$data['userPhone'].'" maxlength="11">' ?>
						<span id="prof_lbl_phone" class="txt_settings_text"><?php echo htmlentities($data['userPhone']); ?></span>
						<br>
						<br>
						<br>
						<label for="cellphone" class="txt_settings_text">Celular:</label>
						<br>
						<?php echo '<input id="prof_txt_cellphone" type="text" name="cellphone" value="'.$data['userCellphone'].'" maxlength="11">' ?>
						<span id="prof_lbl_cellphone" class="txt_settings_text"><?php echo htmlentities($data['userCellphone']); ?></span>
						<br>
						<br>
						<br>
						<label for="description" class="txt_settings_text">Biografia:</label>
						<br>
						<br>
						<?php echo '<textarea id="prof_txt_bio" name="bio" rows="10" cols="30" maxlength="150">'.$data['userBio'].'</textarea>' ?>
						<span id="prof_lbl_bio" class="txt_settings_text"><?php echo htmlentities($data['userBio']); ?></span>
					</form>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				<?php } ?>
				<form id="form_settings" method="POST" action="../../php/settings.php">
					<h3>CONFIGURAÇÕES</h3>
					<hr>
					<h5>Cores</h5>
					<br>
				<?php
					while ($data = mysqli_fetch_array($result_settings)) {
				?>
					<label for="site_color1">Cor 1:</label>
					<?php echo '<input id="site_color1" class="colors" type="color" name="site_color1" value="'.$data['settingsColor1'].'">'?>
					<br>
					<i>Ex: Links que já estão abertos no momento, parte de upload do perfil.</i>
					<br>
					<br>
					<label for="site_color2">Cor 2:</label>
					<?php echo '<input id="site_color2" class="colors" type="color" name="site_color2" value="'.$data['settingsColor2'].'">'?>
					<br>
					<i>Ex: Primeiro estilo do botão.</i>
					<br>
					<br>
					<label for="site_color3">Cor 3:</label>
					<?php echo '<input id="site_color3" class="colors" type="color" name="site_color3" value="'.$data['settingsColor3'].'">'?>
					<br>
					<i>Ex: Segundo estilo do botão, o fundo do perfil.</i>
					<br>
					<br>
					<label for="site_color4">Cor 4:</label>
					<?php echo '<input id="site_color4" class="colors" type="color" name="site_color4" value="'.$data['settingsColor4'].'">'?>
					<br>
					<i>Ex: O cabeçalho dessa página.</i>
					<br>
					<br>
					<label for="site_color5">Cor 5:</label>
					<?php echo '<input id="site_color5" class="colors" type="color" name="site_color5" value="'.$data['settingsColor5'].'">'?>
					<br>
					<i>Ex: A parte que exibe suas informações de texto de perfil.</i>
					<br>
					<br>
					<label for="site_color6">Cor 6:</label>
					<?php echo '<input id="site_color6" class="colors" type="color" name="site_color6" value="'.$data['settingsColor6'].'">'?>
					<br>
					<i>Ex: Caixa de resultado da procura de usuários.</i>
					<br>
					<br>
					<label for="site_color7">Cor 7:</label>
					<?php echo '<input id="site_color7" class="colors" type="color" name="site_color7" value="'.$data['settingsColor7'].'">'?>
					<br>
					<i>Ex: O botão de ir para o topo.</i>
					<br>
					<br>
					<label for="site_color8">Cor 8:</label>
					<?php echo '<input id="site_color8" class="colors" type="color" name="site_color8" value="'.$data['settingsColor8'].'">'?>
					<br>
					<i>Ex: A cor padrão dos links.</i>
					<br>
					<br>
					<input class="btn_button" type="button" value="Resetar Cores" onmousedown="resetcolors()">
					<br>
					<br>
					<table id="table_color_showcase">
						<tr id=color_blue>
							<td id="b_1"></td>
							<td id="b_2"></td>
							<td id="b_3"></td>
							<td id="b_4"></td>
							<td id="b_5"></td>
							<td id="b_6"></td>
							<td id="b_7"></td>
							<td id="b_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('blue')">✔</button></td>
						</tr>
						<tr id=color_red>
							<td id="r_1"></td>
							<td id="r_2"></td>
							<td id="r_3"></td>
							<td id="r_4"></td>
							<td id="r_5"></td>
							<td id="r_6"></td>
							<td id="r_7"></td>
							<td id="r_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('red')">✔</button></td>
						</tr>
						<tr id=color_yellow>
							<td id="y_1"></td>
							<td id="y_2"></td>
							<td id="y_3"></td>
							<td id="y_4"></td>
							<td id="y_5"></td>
							<td id="y_6"></td>
							<td id="y_7"></td>
							<td id="y_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('yellow')">✔</button></td>
						</tr>
						<tr id=color_pink>
							<td id="p_1"></td>
							<td id="p_2"></td>
							<td id="p_3"></td>
							<td id="p_4"></td>
							<td id="p_5"></td>
							<td id="p_6"></td>
							<td id="p_7"></td>
							<td id="p_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('pink')">✔</button></td>
						</tr>
						<tr id=color_green>
							<td id="gre_1"></td>
							<td id="gre_2"></td>
							<td id="gre_3"></td>
							<td id="gre_4"></td>
							<td id="gre_5"></td>
							<td id="gre_6"></td>
							<td id="gre_7"></td>
							<td id="gre_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('green')">✔</button></td>
						</tr>
						<tr id=color_gray>
							<td id="gra_1"></td>
							<td id="gra_2"></td>
							<td id="gra_3"></td>
							<td id="gra_4"></td>
							<td id="gra_5"></td>
							<td id="gra_6"></td>
							<td id="gra_7"></td>
							<td id="gra_8"></td>
							<td><button class="btn_button" type="button" onmousedown="transferColor('gray')">✔</button></td>
						</tr>
					</table>
					<br>
					<hr>
					<h5>Privacidade</h5>
					<br>
					<table>
						<tr>
							<th>Item</th>
							<th>Pessoas podem procurar<br>meu perfil usando:</th>
							<th>Pessoas podem <br>ver no meu perfil:</th>
						</tr>
						<tr>
							<td>NOME</td>
							<td><input type="checkbox" name="src_options[]" value="search_name"></td>
							<td><input type="checkbox" name="see_options[]" value="see_name"></td>
						</tr>
						<tr>
							<td>SOBRENOME</td>
							<td><input type="checkbox" name="src_options[]" value="search_surname"></td>
							<td><input type="checkbox" name="see_options[]" value="see_surname"></td>
						</tr>
						<tr>
							<td>USUÁRIO</td>
							<td><input type="checkbox" name="src_options[]" value="search_username"></td>
							<td><input type="checkbox" name="see_options[]" value="see_username"></td>
						</tr>
						<tr>
							<td>E-MAIL</td>
							<td><input type="checkbox" name="src_options[]" value="search_email"></td>
							<td><input type="checkbox" name="see_options[]" value="see_email"></td>
						</tr>
						<tr>
							<td>TELEFONE</td>
							<td><input type="checkbox" name="src_options[]" value="search_phone"></td>
							<td><input type="checkbox" name="see_options[]" value="see_phone"></td>
						</tr>
						<tr>
							<td>CELULAR</td>
							<td><input type="checkbox" name="src_options[]" value="search_cellphone"></td>
							<td><input type="checkbox" name="see_options[]" value="see_cellphone"></td>
						</tr>
					</table>
					<br>
					<br>
					<br>
					<br>
					<?php
						}
					?>
				</form>
			</section>
		</div>
		<div id="div_cookies" style="display: none;">
			Utilizando o nosso site e continuando a navegar vamos entender que você aceita a nossa política de <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>. Caso queira saber mais sobre <a href="http://localhost/projecthanabi_web/info/cookies.html" target="_blank">cookies</a>, como usamos e a nossa política clique no link exibido.</a>
			<br>
			<br>
			<button class="btn_button" onmousedown="setCookie('terms_of_cookie', 'allowed', 365)">Fechar</button>
		</div>
	</body>
</html>