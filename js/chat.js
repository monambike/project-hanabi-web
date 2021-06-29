// Quando o documento estiver pronto para realizar as operações
$(document).ready(function(){
	// USUÁRIO FECHA O CHAT
	// -------------------------------------------------------------
	// Descrição:
	// Quando o usuário decide clicar no botão de fechar o chat.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	$("#exit").click(function(){
		// Abre uma caixa de confirmação
		var exit = confirm("Tem certeza que deseja sair?");

		// Fecha o chat caso o usuário aceite
		if(exit==true){window.location = 'chat.php?logout=true';}
	});
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------
	
	// USUÁRIO ENVIA MENSAGEM
	// -------------------------------------------------------------
	// Descrição:
	// Se o usuário resolve clicar no botão de enviar a mensagem.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	$("#btn_chat_send").click(function(){
		// Ela envia para o chat_log usando o arquivo "chat_send.php".
		var clientmsg = $("#txt_message_send").val();
		$.post("../../php/chat_send.php",{text: clientmsg});
		$("#txt_message_send").val("");

		// Carrega o log no chat
		loadLog;
		return false;
	});
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------


	// CARREGA O CHAT
	// -------------------------------------------------------------
	// Descrição:
	// Faz o chat atualizar sem recarregar a  página  por  conta  do
	// ajax
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	function loadLog(){
		// Variável que recebe o tamanho da "rolagem" do chat de  antes
		var oldscrollHeight = $("#div_chatbox").prop("scrollHeight");

		// Realiza a atualização do chat
		$.ajax({
			url: "../../php/chat_log.html",
			cache: false,
			success: function(html){       
				$("#div_chatbox").html(html); // Insere o log no chat
          		colorSetChatbox();

				var newscrollHeight = $("#div_chatbox").prop("scrollHeight"); // Tamanho da "rolagem" após
				if(newscrollHeight > oldscrollHeight){
					$("#div_chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
				}
			},
		});
	}
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------
	


	// Recarrega o log do chat a cada 500 milisegundos
	setInterval (loadLog, 500);
});