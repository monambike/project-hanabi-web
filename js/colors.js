// VARIÁVEIS
// -------------------------------------------------------------
// Descrição:
// Variáveis globais.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// Contadores
// -------------------------------------------------------------
// Descrição:
// Variáveis que atuam como contadores.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// Contador que realiza a iteração dos  itens  que  precisam
// receber alguma cor
var i;
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// Identificadores
// -------------------------------------------------------------
// Descrição:
// Variáveis que atuam como contadores.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// Variável que verifica se o usuário está logado.
var logado;
// Variável que verifica se as cores escolhidas são  as  pa-
// drão, ou se o usuário as mudou.
var color_default;
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// Cores Padrão
// -------------------------------------------------------------
// Descrição:
// Variáveis recebem as cores que o usuário digitou caso não es-
// tejam no padrão.
// Junto delas estão suas cores que vem  por  padrão  (default),
// quando o usuário não escolhe uma, ou quando não está logado.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// Purple-bright
// RGB: rgba(137,0,179,1);
// HEX: #8900B3
var color1 = localStorage.getItem('color1');
// Purple-brighter
// RGB: rgba(201,26,255,1);
// HEX: #C91AFF
var color2 = localStorage.getItem('color2');
// Purple-dark
// RGB: rgba(87,0,109,1);
// HEX: #57006D
var color3 = localStorage.getItem('color3');
// Purple-darkest
// RGB: rgba(39,0,51,1);
// HEX: #270033
var color4 = localStorage.getItem('color4');
// Purple-pink
// RGB: rgba(201,50,255,1);
// HEX: #C932FF
var color5 = localStorage.getItem('color5');
// Gray-dark
// RGB: rgba(30,30,30,1);
// HEX: #1E1E1E
var color6 = localStorage.getItem('color6');
// Purple
// RGB: rgba(137,0,179,1);
// HEX: #8900B3
var color7 = localStorage.getItem('color7');
// White
// RGB: rgba(255,255,255,1);
// HEX: #FFFFFF	
var color8 = localStorage.getItem('color8');
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------





// _____________________________________________________________





// FUNÇÕES PRINCIPAIS
// -------------------------------------------------------------
// Descrição:
// Grupo que contém as funções principais.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// #region



// FUNÇÃO QUE DEFINE A COR GERAL DO SITE
// -------------------------------------------------------------
// Descrição:
// Quando o usuário está logado e selecionou uma cor, define  as
// cores do site de acordo com o que foi passado  para a  variá-
// vel.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function colorSet(){
	// Se o usuário está logado e não está com uma cor padrão inicia
	// a atribuição de cores.
	if(logado === 1 && color_default === 0){
		// DEFINE CORES PARA OS PRINCIPAIS ITENS DO SITE
		// -------------------------------------------------------------
		// Descrição:
		// Define as cores para os principais itens do site baseado  nas
		// cores que o usuário escolheu.
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// Define as cores para os "links", "buttons" e "texts".
		var color_white = document.querySelectorAll("#div_about a, #div_account_switch a, #div_login_yes a, #nav_language a, #nav_menu a, #txt_forgot, #txt_signup, .item, #div_sidebar_id a,"
			+".btn_button,"
			+".txt_settings_text, .msgln");
		for(i = 0; i < color_white.length; i++){
			color_white[i].style.color = color8;
		}
		// Define as cores para "selected links".
		var selectedlink_purplebright = document.querySelectorAll("#div_about a.txt_selected, #div_account_switch a.txt_selected, #div_login_yes a.txt_selected, #nav_language a.txt_selected, #nav_menu a.txt_selected, #txt_forgot.txt_selected, #txt_signup.txt_selected, .item.txt_selected, #div_sidebar_id a.txt_selected");
		for(i = 0; i < selectedlink_purplebright.length; i++){
			selectedlink_purplebright[i].style.color = color1;
		}
		// Define as cores para "buttons" e "inputs".
		var button = document.querySelectorAll(".btn_button");
		for(i = 0; i < button.length; i++){
			button[i].style.borderTop = '5px solid '+color2;
			button[i].style.borderRight = '5px solid '+color3;
			button[i].style.borderBottom = '5px solid '+color3;
			button[i].style.borderLeft = '5px solid '+color2;
			button[i].style.backgroundColor = color2;
		}



		// DEFINE CORES PARA OS PRINCIPAIS FUNDOS DO SITE
		// -------------------------------------------------------------
		// Descrição:
		// Define as cores para os principais fundos do site baseado nas
		// cores que o usuário escolheu.
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// Purple Bright
		var background_purplebright = document.querySelectorAll("#form_upload, #div_chat_container");
		for(i = 0; i < background_purplebright.length; i++){
			background_purplebright[i].style.backgroundColor = color1;
		}
		// Purple Dark
		var background_purpledark = document.querySelectorAll("#div_profile");
		for(i = 0; i < background_purpledark.length; i++){
			background_purpledark[i].style.backgroundColor = color3;
		}
		// Purple Darkest
		var background_purpledarkest = document.querySelectorAll("#div_header, #div_chat_container form, #div_top, #body_chat");
		for(i = 0; i < background_purpledarkest.length; i++){
			background_purpledarkest[i].style.backgroundColor = color4;
		}
		// Purple Pink
		var background_purplepink = document.querySelectorAll("#form_update, #div_chatbox");
		for(i = 0; i < background_purplepink.length; i++){
			background_purplepink[i].style.backgroundColor = color5;
		}
		// Gray Dark
		var background_graydark = document.querySelectorAll(".div_content ul#ul_search li");
		for(i = 0; i < background_graydark.length; i++){
			background_graydark[i].style.backgroundColor = color6;
		}
		// Purple
		var background_purple = document.querySelectorAll("#img_goup");
		for(i = 0; i < background_purple.length; i++){
			background_purple[i].style.backgroundColor = color7;
		}
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// -------------------------------------------------------------
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------

// FUNÇÃO QUE DEFINE A COR DO CHAT
// -------------------------------------------------------------
// Descrição:
// Função que define a cor do chat baseado nas cores que o  usu-
// ário definiu.
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function colorSetChatbox(){
	var color_white = document.querySelectorAll(".msgln");
	for(i = 0; i < color_white.length; i++){
		color_white[i].style.color = color8;
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------



// #endregion
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------