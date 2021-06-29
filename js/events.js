// FUNÇÃO RESPONSÁVEL PELA MAIOR PARTE DA NAVEGAÇÃO DO SITE
// -------------------------------------------------------------
// Descrição:
// Função responsável por realizar a maior parte da navegação do
// site.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



function movelink(navigation){
	// Variável que pega a linguagem definida pelo usuário
	var lang = document.getElementById('option_language');
	
	// CONDICIONAL RESPONSÁVEL PELA NAVEGAÇÃO
	// -------------------------------------------------------------
	// Descrição:
	// De acordo com os dados passados no método, realiza uma deter-
	// minada navegação.
	// Tem um período de espera para evitar erros.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	setTimeout(function () {
		// "login"
		if(navigation == 'login'){
			//Ao clicar em 'login', ele fecha a aba de conta, para otimizar a experiência do usuário
			document.getElementById('form_login').submit();
		}
		// "register"
		else if(navigation == 'register'){
			// VARIÁVEIS
			// -------------------------------------------------------------
			// Descrição:
			// Variáveis utilizadas dentro da condicional.
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



			// VARIÁVEIS DE DADOS DO USUÁRIO
			// -------------------------------------------------------------
			// Descrição:
			// Variáveis responsáveis por manipular dados de usuário.
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			var name = document.getElementById('signup_txt_name').value;
			var surname = document.getElementById('signup_txt_surname').value;
			var username = document.getElementById('signup_txt_username').value;
			var email = document.getElementById('signup_txt_email').value;
			var password = document.getElementById('signup_txt_password').value;
			var confirm = document.getElementById('signup_txt_confirm').value;
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			// -------------------------------------------------------------

			// AVISOS
			// -------------------------------------------------------------
			// Descrição:
			// Variáveis responsáveis pelo controle de avisos.
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			var notice = document.getElementById('txt_notice');
			// Termos de uso e serviço
			// Variáveis responsáveis pelos termos de uso.
			var terms = document.getElementById('terms_of_use');
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			// -------------------------------------------------------------



			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			// -------------------------------------------------------------



			// VALIDAÇÃO DOS DADOS DO FORM
			// -------------------------------------------------------------
			// Descrição:
			// Função que realiza a validação dos dados no form.
			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



			// Verifica se todos os campos estão preenchidos, caso não este-
			// jam, emite uma mensagem
			if(name === "" || surname === "" || username === "" || email === "" || password === "" || confirm === ""){
				notice.innerHTML = "Não deixe nenhum dos campos vazios.";
				notice.hidden = false;
			}
			// Caso a senha e o campo de confirmar senha não estejam  iguais
			// emite uma mensagem
			else if (password != confirm){
				notice.innerHTML = "Campo 'senha' diferente do campo <br> 'confirmar senha'.";
				notice.hidden = false;
			}
			// Caso o usuário não aceitou os termos de uso exibe uma  mensa-
			// gem
			else if(terms.checked === false){
				notice.innerHTML = "Você precisa aceitar os termos de uso antes de cadastrar.";
				notice.hidden = false;
			}
			// Caso o email seja válido envia o formulário
			else if(email.includes('@')){
				// Envia o formulário
				document.getElementById('form_register').submit();
			}
			// Caso o email seja inválido, retorna uma mensagem
			else{
				//Verifica se o email possui um '@' e um '.com', caso não possua, emite uma mensagem
				notice.innerHTML = "Email com formato inválido.";
				notice.hidden = false;				
			}
			


			// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			// -------------------------------------------------------------
		}
		// "saveconfig"
		else if(navigation == 'saveconfig'){
			//Ao clicar em 'login', ele fecha a aba de conta, para otimizar a experiência do usuário
			document.getElementById('form_settings').submit();
		}
		// CONDICIONAIS RELACIONADAS À IDIOMA
		// -------------------------------------------------------------
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// "acess_site_language"
		else if(navigation == 'acess_site_language'){
			// Muda o idioma do site
			window.open('lang/' + lang.value + '/home.php', '_self');
		}
		// "return"
		else if(navigation == 'return'){
			// Volta uma página
			window.history.back();
		}
		// else
		else{
			window.open(navigation, '_self');
		}
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// -------------------------------------------------------------
	}, 500);
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
}



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// FUNÇÃO RESPONSÁVEL POR PASSAR A COR PARA AS VARIÁVEIS
// -------------------------------------------------------------
// Descrição:
// Passa a cor referente à paleta de cores da tablea para as en-
// tradas
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// -------------------------------------------------------------
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

// FUNÇÃO RESPONSÁVEL POR EXIBIR O CONTEÚDO DO SITE
// -------------------------------------------------------------
// Descrição:
// Faz com que o site só seja mostrado com javascript ativado ou
// com ele carregado por completo
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function waitCompleteLoad(){
	document.getElementById('loadContent').style.display = 'block';
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÕES DE SONS
// -------------------------------------------------------------
// Descrição:
// Funções que realizam alguma operação relacionada ao som.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// SOM DO TECLADO
// -------------------------------------------------------------
// Descrição:
// Reproduz um som de teclado ao pressionar alguma tecla
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
document.onkeypress = function(e) {
	var keyboardclick = document.createElement('audio');
	keyboardclick.src = '../../sounds/keyboardclick.mp3';
	keyboardclick.volume = 0.2;
	keyboardclick.play();
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// SOM DO MOUSE
// -------------------------------------------------------------
// Descrição:
// Reproduz um som de mouse ao pressionar algum botão
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
document.onmousedown = function(e){
	var mouseclick = document.createElement('audio');
	mouseclick.src = '../../sounds/mouseclick.mp3';
	mouseclick.play();
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÕES RELACIONADAS AO BOTÃO DE IR PARA O TOO "GOUP"
// -------------------------------------------------------------
// Descrição:
// Funções que estão diretamente relacionadas com o botão de  ir
// para o topo "goup".
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// FUNÇÃO 1 DE MUDAR O ESTADO DO BOTÃO
// -------------------------------------------------------------
// Descrição:
// Primeira função que controla a aparência do botão.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO 2 DE MUDAR O ESTADO DO BOTÃO
// -------------------------------------------------------------
// Descrição:
// Segunda função que controla a aparência do botão.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------





// FUNÇÕES DE AVISOS
// -------------------------------------------------------------
// Descrição:
// Funções que fazem a exibição ou controle de algum aviso.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// MENSAGEM DE SUCESSO
// -------------------------------------------------------------
// Descrição:
// Exibe uma mensagem de sucesso.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function success(){alert("Usuário cadastrado com sucesso!");}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// MENSAGEM DE CONFIRMAÇÃO PARA LIMPAR CAMPOS
// -------------------------------------------------------------
// Descrição:
// Mostra uma mensagem de confirmação caso o usuário decida lim-
// par os campos.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function clearfields(){
	if(confirm("Tem certeza que deseja limpar os campos?")){
		document.getElementById("form_register").reset();
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------


// MENSAGEM DE CONFIRMAÇÃO PARA APAGAR CONTA
// -------------------------------------------------------------
// Descrição:
// Mostra uma mensagem de confirmação para quando o usuário  de-
// cida apagar a conta.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function deleteaccount(){
	if(confirm("Tem certeza que deseja excluir a sua conta? Essa ação não pode ser desfeita.")){
		window.open("../../php/delete.php", '_self');
	}	
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// MENSAGEM DE CONFIRMAÇÃO RESETA CORES
// -------------------------------------------------------------
// Descrição:
// Mostra uma mensagem de confirmação para quando o usuário  de-
// cida resetar as cores para o padrão.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function resetcolors(){
	if(confirm("Tem certeza que deseja resetar cores para o padrão?")){
		window.open("../../php/reset.php", '_self');
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------





// ABRE/FECHA DIVISÃO DA CONTA
// -------------------------------------------------------------
// Descrição:
// Função que faz o controle da abertura e do  fechamento  refe-
// rente à divisão de fazer login na conta.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÕES RELACIONADAS AO BOTÃO EDITAR
// -------------------------------------------------------------
// Descrição:
// Estão dispostas nesse grupo todas as funções diretamente  re-
// lacionadas com a ação de editar.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// MUDA ESTADO BOTÃO EDITAR
// -------------------------------------------------------------
// Descrição:
// Função que muda o estado do botão editar.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// REDEFINE O ESTADO DO FORM E DO BOTÃO EDITAR
// -------------------------------------------------------------
// Descrição:
// Função que redefine o estado do botão editar e o do  form  ao
// atualizar a página.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function resetedit(){
	//Ao atualizar a página reseta o estado do botão editar
	localStorage.setItem('editing', 'false');
	//E atualiza o form
	updateedit();
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// ATUALIZA COM BOTÃO EDITAR
// -------------------------------------------------------------
// Descrição:
// Função que atualiza os elementos da página de  acordo  com  o
// botão editar.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function updateedit(){
	// VARIÁVEIS
	// -------------------------------------------------------------
	// Descrição:
	// Variáveis relacionadas à função atual.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// CAIXAS DE TEXTO
	// -------------------------------------------------------------
	// Descrição:
	// Variáveis relacionadas  à  manipulação  de  caixas  de  texto
	// "textbox".
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	var txtName = document.getElementById('prof_txt_name');
	var txtSurname = document.getElementById('prof_txt_surname');
	var txtUsername = document.getElementById('prof_txt_username');
	var txtEmail = document.getElementById('prof_txt_email');
	var txtPhone = document.getElementById('prof_txt_phone');
	var txtCellphone = document.getElementById('prof_txt_cellphone');
	var txtBio = document.getElementById('prof_txt_bio');
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	// RÓTULOS
	// Descrição:
	// Variáveis relacionadas à manipulação de rótulos "labels".
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	var lblName = document.getElementById('prof_lbl_name');
	var lblSurname = document.getElementById('prof_lbl_surname');
	var lblUsername = document.getElementById('prof_lbl_username');
	var lblEmail = document.getElementById('prof_lbl_email');
	var lblPhone = document.getElementById('prof_lbl_phone');
	var lblCellphone = document.getElementById('prof_lbl_cellphone');
	var lblBio = document.getElementById('prof_lbl_bio');
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	// Variável responsável pelo controle de edição.
	editing = localStorage.getItem('editing')



	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------





	// Se o usuário está editando
	if(editing == 'true'){
		// As caixas de texto ficam visíveis
		txtName.hidden = false;
		txtSurname.hidden = false;
		txtUsername.hidden = false;
		txtEmail.hidden = false;
		txtPhone.hidden = false;
		txtCellphone.hidden = false;
		txtBio.hidden = false;
		// Os rótulos ficam invisíveis
		lblName.hidden = true;
		lblSurname.hidden = true;
		lblUsername.hidden = true;
		lblEmail.hidden = true;
		lblPhone.hidden = true;
		lblCellphone.hidden = true;
		lblBio.hidden = true;
	}
	// Se o usuário não está editando
	else if(editing == 'false'){
		// As caixas de texto ficam invisíveis
		txtName.hidden = true;
		txtSurname.hidden = true;
		txtUsername.hidden = true;
		txtEmail.hidden = true;
		txtPhone.hidden = true;
		txtCellphone.hidden = true;
		txtBio.hidden = true;
		// Os rótulos ficam visíveis
		lblName.hidden = false;
		lblSurname.hidden = false;
		lblUsername.hidden = false;
		lblEmail.hidden = false;
		lblPhone.hidden = false;
		lblCellphone.hidden = false;
		lblBio.hidden = false;
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------


// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// PAINEL DE NAVEGAÇÃO
// -------------------------------------------------------------
// Descrição:
// Funções diretamente relacionadas ao painel de navegação.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// FUNÇÃO QUE ABRE O PAINEL DE NAVEGAÇÃO
// -------------------------------------------------------------
// Descrição:
// Função responsável por abrir o painel de navegação.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function openNav(){
	document.getElementById("div_sidebar_id").style.width = "250px";
	document.getElementById("div_navphone").style.marginLeft = "250px";
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO QUE FECHA O PAINEL DE NAVEGAÇÃO
// -------------------------------------------------------------
// Descrição:
// Função responsável por fechar o painel de navegação.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function closeNav(){
	document.getElementById("div_sidebar_id").style.width = "0";
	document.getElementById("div_navphone").style.marginLeft= "0";
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// ATUALIZA CONTAGEM DE CARACTERES DO CHAT
// -------------------------------------------------------------
// Descrição:
// Função que atualiza a contagem de caracteres restantes.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function remainingText(){
	txt_message = document.getElementById('txt_message_send');
	span_remaining = document.getElementById('remaining_text');
	span_remaining.innerHTML = "("+(255-txt_message.value.length)+")";
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO QUE ABRE/FECHA O IFRAME DO CHAT
// -------------------------------------------------------------
// Descrição: Função que realiza a abertura ou fechamento da di-
// visão contendo o iframe de acordo com o estado disponibiliza-
// do.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function interactIframe(){
	iframe = document.getElementById("iframe_chat");
	menubar = document.getElementById("div_navphone");

	if(iframe.style.display === "none"){
		iframe.style.display = "block";
		//Oculta a barra de menu para abir o chat
		menubar.style.display = "none";
	}
	else{
		iframe.style.display = "none";
		//Caso a tela seja pequena mostra a barra de menu
		if(window.matchMedia("(max-width: 600px)").matches){
			menubar.style.display = "block";
		}
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// COOKIES 
// -------------------------------------------------------------
// Descrição:
// Grupo de funções que fazem o controle dos cookies do  site  e
// assuntos relacionados.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// DEFINE O COOKIE DE ACORDO COM OS DADOS PASSADOS
// -------------------------------------------------------------
// Descrição:
// Função que define um cookie para um dado que foi passado.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

	checkCookiesAllowed();
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO QUE FAZ A INTERPRETAÇÃO DOS COOKIES
// -------------------------------------------------------------
// Descrição:
// Função que faz o recebimento e interpretação dos  cookies  de
// acordo com o nome passado no método.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO QUE VERIFICA SE OS COOKIES FORAM PERMITIDOS
// -------------------------------------------------------------
// Descrição:
// Função que verifica se o usuário permitiu cookies no site.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function checkCookiesAllowed(){
	var terms = getCookie("terms_of_cookie");
	var divcookie = document.getElementById("div_cookies");

	//Se o usuário não concordou com os cookies
	if (terms === ""){
		divcookie.style.display = "block";
	//Se o usuário concordou com os cookies
	}else{
		divcookie.style.display = "none";
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------




// CARREGA CORPO COM CONFIGURAÇÕES
// -------------------------------------------------------------
// Descrição:
// Funções que faz o carregamento do corpo com as  configurações
// determinadas.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



function bodyLoadFunction(lang, locate, type){
	// Variável que vai armazenar o número de uma determinada  posi-
	// ção.
	var conditionType;

	// Para cada número presente em "type"
	for(var i = 0; i < type.length; i++){
		// Pega o número presente em uma determinada posição
		conditionType = type.charAt(i);

		// E carrega as funções de acordo com o número na posição
		switch(conditionType){
			case '1':
				// Define o idioma da página
				localStorage.setItem(lang, locate);
				break;
			case '2':
				// Atualiza o botão de ir ao topo
				changeimage2();
				break;
			case '3':
				// Checa se o usuário aceitou a política de cookies
				checkCookiesAllowed();
				break;
			case '4':
				// Define as cores caso o usuário as tenha definido
				colorSet();
				break;
		}
	}

	// Depois de tudo completamente carregado carrega o corpo "body"
	waitCompleteLoad();
}



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------