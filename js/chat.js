$(document).ready(function(){
	//Se o usuário quiser sair do chat
	$("#exit").click(function(){
		//Abre uma caixa de confirmação
		var exit = confirm("Tem certeza que deseja sair?");
		if(exit==true){window.location = 'chat.php?logout=true';}
	});

	//Se o usuário escolhe enviar a mensagem
	$("#btn_chat_send").click(function(){
		//Ela envia para o chat_log usando o arquivo 'chat_send.php'
		var clientmsg = $("#txt_message_send").val();
		$.post("../../php/chat_send.php",{text: clientmsg});
		$("#txt_message_send").val("");

		loadLog;
		return false;
	});

	//Faz o chat atualizar sem recarregar a página graças ao ajax
	function loadLog(){
		var oldscrollHeight = $("#div_chatbox").prop("scrollHeight"); //Tamanho da 'rolagem' antes

		$.ajax({
			url: "../../php/chat_log.html",
			cache: false,
			success: function(html){       
				$("#div_chatbox").html(html); //Insere o log no chat
          		colorSetChatbox();

				var newscrollHeight = $("#div_chatbox").prop("scrollHeight"); //Tamanho da 'rolagem' depois
				if(newscrollHeight > oldscrollHeight){
					$("#div_chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
				}
			},
		});
	}
	setInterval (loadLog, 500); //2500
});