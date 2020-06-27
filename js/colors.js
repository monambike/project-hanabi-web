var i;
var logado;
var color_default;
var color1 = localStorage.getItem('color1');
/*
rgba(137,0,179,1);
//Purple-bright
#8900B3
*/
var color2 = localStorage.getItem('color2');
/*
rgba(201,26,255,1);
//Purple-brighter
#C91AFF
*/
var color3 = localStorage.getItem('color3');
/*
rgba(87,0,109,1);
//Purple-dark
#57006D
*/
var color4 = localStorage.getItem('color4');
/*
rgba(39,0,51,1);
//Purple-darkest
#270033
*/
var color5 = localStorage.getItem('color5');
/*
rgba(201,50,255,1);
//Purple-pink
#C932FF
*/
var color6 = localStorage.getItem('color6');
/*
rgba(30,30,30,1);
//Gray-dark
#1E1E1E
*/
var color7 = localStorage.getItem('color7');
/*
rgba(137,0,179,1);
//Purple
#8900B3
*/
var color8 = localStorage.getItem('color8');
/*
rgba(255,255,255,1);
//White
#FFFFFF	
*/

//Define as cores do site quando o usuário as escolhe
function colorSet(){
	if(logado === 1 && color_default === 0){
		//Links
		//Buttons
		//Texts
		var color_white = document.querySelectorAll("#div_about a, #div_account_switch a, #div_login_yes a, #nav_language a, #nav_menu a, #txt_forgot, #txt_signup, .item, #div_sidebar_id a,"
			+".btn_button,"
			+".txt_settings_text, .msgln");
		for(i = 0; i < color_white.length; i++){
			color_white[i].style.color = color8;
		}

		//Selected links
		var selectedlink_purplebright = document.querySelectorAll("#div_about a.txt_selected, #div_account_switch a.txt_selected, #div_login_yes a.txt_selected, #nav_language a.txt_selected, #nav_menu a.txt_selected, #txt_forgot.txt_selected, #txt_signup.txt_selected, .item.txt_selected, #div_sidebar_id a.txt_selected");
		for(i = 0; i < selectedlink_purplebright.length; i++){
			selectedlink_purplebright[i].style.color = color1;
		}

		//Buttons and Inputs
		var button = document.querySelectorAll(".btn_button");
		for(i = 0; i < button.length; i++){
			button[i].style.borderTop = '5px solid '+color2;
			button[i].style.borderRight = '5px solid '+color3;
			button[i].style.borderBottom = '5px solid '+color3;
			button[i].style.borderLeft = '5px solid '+color2;
			button[i].style.backgroundColor = color2;
		}


		/*BACKGROUNDS*/
		var background_purplebright = document.querySelectorAll("#form_upload, #div_chat_container");
		for(i = 0; i < background_purplebright.length; i++){
			background_purplebright[i].style.backgroundColor = color1;
		}

		var background_purpledark = document.querySelectorAll("#div_profile");
		for(i = 0; i < background_purpledark.length; i++){
			background_purpledark[i].style.backgroundColor = color3;
		}

		var background_purpledarkest = document.querySelectorAll("#div_header, #div_chat_container form, #div_top, #body_chat");
		for(i = 0; i < background_purpledarkest.length; i++){
			background_purpledarkest[i].style.backgroundColor = color4;
		}

		var background_purplepink = document.querySelectorAll("#form_update, #div_chatbox");
		for(i = 0; i < background_purplepink.length; i++){
			background_purplepink[i].style.backgroundColor = color5;
		}

		var background_graydark = document.querySelectorAll(".div_content ul#ul_search li");
		for(i = 0; i < background_graydark.length; i++){
			background_graydark[i].style.backgroundColor = color6;
		}

		var background_purple = document.querySelectorAll("#img_goup");
		for(i = 0; i < background_purple.length; i++){
			background_purple[i].style.backgroundColor = color7;
		}
	}
}

function colorSetChatbox(){
	var color_white = document.querySelectorAll(".msgln");
	for(i = 0; i < color_white.length; i++){
		color_white[i].style.color = color8;
	}
}