//NAVEGAÇÃO
function movelink(navigation){
	var lang = document.getElementById('option_language');
	
	setTimeout(function () {
		//PHP RELACIONADO À CONTA
		if(navigation == 'login'){
			//Ao clicar em 'login', ele fecha a aba de conta, para otimizar a experiência do usuário
			document.getElementById('form_login').submit();
		}else if(navigation == 'register'){
			//Dados do usuário
			var name = document.getElementById('signup_txt_name').value;
			var surname = document.getElementById('signup_txt_surname').value;
			var username = document.getElementById('signup_txt_username').value;
			var email = document.getElementById('signup_txt_email').value;
			var password = document.getElementById('signup_txt_password').value;
			var confirm = document.getElementById('signup_txt_confirm').value;
			//Aviso
			var notice = document.getElementById('txt_notice');
			//Termos de uso e serviço
			var terms = document.getElementById('terms_of_use');

			//Verifica se os dados estão em um formato correto
			if(name === "" || surname === "" || username === "" || email === "" || password === "" || confirm === ""){
				//Verifica se todos os campos estão preenchidos, caso não estejam, emite uma mensagem
				notice.innerHTML = "Não deixe nenhum dos campos vazios.";
				notice.hidden = false;
			}else if (password != confirm){
				//Verifica se a senha está igual ao campo de senha confirmada, caso não esteja, emite uma mensagem
				notice.innerHTML = "Campo 'senha' diferente do campo <br> 'confirmar senha'.";
				notice.hidden = false;
			}else if(terms.checked === false){
				notice.innerHTML = "Você precisa aceitar os termos de uso antes de cadastrar.";
				notice.hidden = false;
			}else if(email.includes('@')){
				//Caso todos os pedidos sejam atendidos, envia o formulário
				document.getElementById('form_register').submit();
			}else{
				//Verifica se o email possui um '@' e um '.com', caso não possua, emite uma mensagem
				notice.innerHTML = "Email com formato inválido.";
				notice.hidden = false;				
			}
		}else if(navigation == 'saveconfig'){
			//Ao clicar em 'login', ele fecha a aba de conta, para otimizar a experiência do usuário
			document.getElementById('form_settings').submit();
		//IDIOMA
		}else if(navigation == 'acess_site_language'){
			window.open('lang/' + lang.value + '/home.php', '_self');
		}else if(navigation == 'return'){
			window.history.back();
    } else if (navigation == 'logoff') {
			window.open('../../php/logoff.php', '_self');
		}else{
			window.open(navigation, '_self');
		}
	}, 500);
}

//Passa a cor referente à paleta de cores da tablea para as entradas
function transferColor(transfered_color){
	inputColor1 = document.getElementById("site_color1");
	inputColor2 = document.getElementById("site_color2");
	inputColor3 = document.getElementById("site_color3");
	inputColor4 = document.getElementById("site_color4");
	inputColor5 = document.getElementById("site_color5");
	inputColor6 = document.getElementById("site_color6");
	inputColor7 = document.getElementById("site_color7");
	inputColor8 = document.getElementById("site_color8");

	switch(transfered_color){
		case 'blue':
			inputColor1.value = "#1215a0";
			inputColor2.value = "#6c53c6";
			inputColor3.value = "#352fb0";
			inputColor4.value = "#10033d";
			inputColor5.value = "#053872";
			inputColor6.value = "#15035f";
			inputColor7.value = "#38487e";
			inputColor8.value = "#86cffb";
			break;
		case 'red':
			inputColor1.value = "#82000a";
			inputColor2.value = "#fa1f24";
			inputColor3.value = "#a71f22";
			inputColor4.value = "#400000";
			inputColor5.value = "#ffa8a8";
			inputColor6.value = "#c80000";
			inputColor7.value = "#ff0606";
			inputColor8.value = "#ffb0b0";
			break;
		case 'yellow':
			inputColor1.value = "#ebf70b";
			inputColor2.value = "#d2e626";
			inputColor3.value = "#b5c70e";
			inputColor4.value = "#393d03";
			inputColor5.value = "#f5fea9";
			inputColor6.value = "#b8c106";
			inputColor7.value = "#e2f312";
			inputColor8.value = "#676b1d";
			break;
		case 'pink':
			inputColor1.value = "#ef12c9";
			inputColor2.value = "#cc0fdb";
			inputColor3.value = "#c014b4";
			inputColor4.value = "#400036";
			inputColor5.value = "#f53ada";
			inputColor6.value = "#ba0ea0";
			inputColor7.value = "#e025dc";
			inputColor8.value = "#fecffb";
			break;
		case 'green':
			inputColor1.value = "#0ab612";
			inputColor2.value = "#34d118";
			inputColor3.value = "#14c04d";
			inputColor4.value = "#09370b";
			inputColor5.value = "#6fdd53";
			inputColor6.value = "#1aae1a";
			inputColor7.value = "#3ee620";
			inputColor8.value = "#d8fad3";
			break;
		case 'gray':
			inputColor1.value = "#817988";
			inputColor2.value = "#6c7b7d";
			inputColor3.value = "#637268";
			inputColor4.value = "#1e2122";
			inputColor5.value = "#8f97a0";
			inputColor6.value = "#5c6b65";
			inputColor7.value = "#7e7c89";
			inputColor8.value = "#e4e8e9";
			break;
	}

	alert("A cor foi selecionada com sucesso!");
}

//Faz com que o site só seja mostrado com javascript ativado ou com ele carregado por completo
function waitCompleteLoad(){
	document.getElementById('loadContent').style.display = 'block';
}

//SONS
//Sons de mouse e teclado
/*document.onkeypress = function(e) {
	var keyboardclick = document.createElement('audio');
	keyboardclick.src = '../../sounds/keyboardclick.mp3';
	keyboardclick.volume = 0.2;
	keyboardclick.play();
}
document.onmousedown = function(e){
	var mouseclick = document.createElement('audio');
	mouseclick.src = '../../sounds/mouseclick.mp3';
	mouseclick.play();
}*/
//EM ANÁLISE

//GOUP
//Mudar a imagem do botão 'goup'
function changeimage1(){
	var imgGoup = document.getElementById('img_goup');
	
	if(duranteAnimacao === false){
		imgGoup.setAttribute('src', '../../images/goup1.png');
		imgGoup.style.opacity = 1;
	}else{
		imgGoup.setAttribute('src', '../../images/goup2.png');
		imgGoup.style.opacity = 1;
	}
}
function changeimage2(){
	var imgGoup = document.getElementById('img_goup');
	
	//Para evitar bugs, só executa o comando de opacidade caso a largura seja maior que 600px
	if(window.matchMedia("(min-width:600px)").matches){
		if(duranteAnimacao === false){
			imgGoup.setAttribute('src', '../../images/goup1.png');
			imgGoup.style.opacity = 0.6;
		}else{
			imgGoup.setAttribute('src', '../../images/goup2.png');
			imgGoup.style.opacity = 1;
		}
	}
}

//AVISOS
//Sucesso
function success(){alert("Usuário cadastrado com sucesso!");}
//Caixa de confirmação
function clearfields(){
	if(confirm("Tem certeza que deseja limpar os campos?")){
		document.getElementById("form_register").reset();
	}
}
//Apaga a conta do usuário
function deleteaccount(){
	if(confirm("Tem certeza que deseja excluir a sua conta? Essa ação não pode ser desfeita.")){
		window.open("../../php/delete.php", '_self');
	}	
}
//Reseta cores
function resetcolors(){
	if(confirm("Tem certeza que deseja resetar cores para o padrão?")){
		window.open("../../php/reset.php", '_self');
	}	
}

//account_state
//Função que vai verificar o último estado que foi deixado o account_state
function change_account_state(){
	var account_state = document.getElementById('div_account');

	//Eu cliquei
	if(window.getComputedStyle(div_account).display === "none"){
		//Esse estado é quando ele está fechado
		//e você clica com o objetivo de abrir e salvar
		account_state.style.display = "block";
	}else{
		//Esse estado é quando ele está aberto
		//e você clica com o objetivo de fechar e salvar
		account_state.style.display = "none";
	}
}

//PROFILE
//Função que muda o estado do botão editar
function changeedit(){
	editing = localStorage.getItem('editing');
	btn_edit = document.getElementById('button_edit');

	//Ao clicar no botão
	if(editing == 'true'){
		//E envia as novas informações para o banco
		document.getElementById('form_update').submit();
	}else if(editing == 'false'){
		//Se não estava editando ele começa a editar
		localStorage.setItem('editing', 'true');
		btn_edit.value = 'Salvar';
	}

	//Após isso, atualiza o form
	updateedit();
}
//Função que restaura o botão editar ao atualizar a página
function resetedit(){
	//Ao atualizar a página reseta o estado do botão editar
	localStorage.setItem('editing', 'false');
	//E atualiza o form
	updateedit();
}
//Função que atualiza os elementos da página de acordo com o botão edit
function updateedit(){
	//VARIÁVEIS
	//Caixas de Texto
	var txtName = document.getElementById('prof_txt_name');
	var txtSurname = document.getElementById('prof_txt_surname');
	var txtUsername = document.getElementById('prof_txt_username');
	var txtEmail = document.getElementById('prof_txt_email');
	var txtPhone = document.getElementById('prof_txt_phone');
	var txtCellphone = document.getElementById('prof_txt_cellphone');
	var txtBio = document.getElementById('prof_txt_bio');
	//Rótulos
	var lblName = document.getElementById('prof_lbl_name');
	var lblSurname = document.getElementById('prof_lbl_surname');
	var lblUsername = document.getElementById('prof_lbl_username');
	var lblEmail = document.getElementById('prof_lbl_email');
	var lblPhone = document.getElementById('prof_lbl_phone');
	var lblCellphone = document.getElementById('prof_lbl_cellphone');
	var lblBio = document.getElementById('prof_lbl_bio');
	//Armazenamento Local
	editing = localStorage.getItem('editing')

	if(editing == 'true'){
		//Se estiver editando
		//As caixas de texto ficam visíveis
		txtName.hidden = false;
		txtSurname.hidden = false;
		txtUsername.hidden = false;
		txtEmail.hidden = false;
		txtPhone.hidden = false;
		txtCellphone.hidden = false;
		txtBio.hidden = false;
		//Os rótulos ficam invisíveis
		lblName.hidden = true;
		lblSurname.hidden = true;
		lblUsername.hidden = true;
		lblEmail.hidden = true;
		lblPhone.hidden = true;
		lblCellphone.hidden = true;
		lblBio.hidden = true;
	}else if(editing == 'false'){
		//Se não estiver editando
		//As caixas de texto ficam invisíveis
		txtName.hidden = true;
		txtSurname.hidden = true;
		txtUsername.hidden = true;
		txtEmail.hidden = true;
		txtPhone.hidden = true;
		txtCellphone.hidden = true;
		txtBio.hidden = true;
		//Os rótulos ficam visíveis
		lblName.hidden = false;
		lblSurname.hidden = false;
		lblUsername.hidden = false;
		lblEmail.hidden = false;
		lblPhone.hidden = false;
		lblCellphone.hidden = false;
		lblBio.hidden = false;
	}
}

//MOBILE NAV
//Abre e fecha
function openNav(){
	document.getElementById("div_sidebar_id").style.width = "250px";
	document.getElementById("div_navphone").style.marginLeft = "250px";
}
function closeNav(){
	document.getElementById("div_sidebar_id").style.width = "0";
	document.getElementById("div_navphone").style.marginLeft= "0";
}

//Mostra a contagem de caracteres restantes
function remainingText(){
	txt_message = document.getElementById('txt_message_send');
	span_remaining = document.getElementById('remaining_text');
	span_remaining.innerHTML = "("+(255-txt_message.value.length)+")";
}

//Abre ou fecha o frame de acordo com o estado
function interactIframe(){
	iframe = document.getElementById("iframe_chat");
	menubar = document.getElementById("div_navphone");

	if(iframe.style.display === "none"){
		iframe.style.display = "block";
		//Oculta a barra de menu para abir o chat
		menubar.style.display = "none";
	}else{
		iframe.style.display = "none";
		//Caso a tela seja pequena mostra a barra de menu
		if(window.matchMedia("(max-width: 600px)").matches){
			menubar.style.display = "block";
		}
	}
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

	checkCookiesAllowed();
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');

	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function checkCookiesAllowed(){
	var terms = getCookie("terms_of_cookie");
	var divcookie = document.getElementById("div_cookies");

  if (divcookie) {
    //Se o usuário não concordou com os cookies
    if (terms === ""){
      divcookie.style.display = "block";
    //Se o usuário concordou com os cookies
    }else{
      divcookie.style.display = "none";
    }
  }
}

function bodyLoadFunction(lang, locate, type){
	//Carrega as funções
	var conditionType;
	for(var i = 0; i < type.length; i++){
		conditionType = type.charAt(i);

		switch(conditionType){
			case '1':
				//Define o idioma da página
				localStorage.setItem(lang, locate);
				break;
			case '2':
				//Atualiza o botão de ir ao topo
				changeimage2();
				break;
			case '3':
				//Checa se o usuário entendeu a política de cookies
				checkCookiesAllowed();
				break;
			case '4':
				//Define as cores caso o usuário tenha definido
				colorSet();
				break;
		}
	}

	//Depois de tudo carregado carrega o body
	waitCompleteLoad();
}