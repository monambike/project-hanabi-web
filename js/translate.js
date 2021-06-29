//INDEX
function indexlanguage(){
	setTimeout(function () {
		// Chama a função que limpa tudo para evitar bugs e con-
		// flitos
		resetindex();


		// VARIÁVEIS
		// -------------------------------------------------------------
		// Descrição:
		// Variáveis que vão ser utilizadas nessa função.
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



		// Textos gerais
		// -------------------------------------------------------------
		// Descrição:
		// Itens de texto gerais do site.
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		var project = document.getElementById('project');
		var hanabi = document.getElementById('hanabi');
		var welcome = document.getElementById('welcome');
		var label = document.getElementById('index_label');
		var button = document.getElementById('index_button');
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// -------------------------------------------------------------
		
		
		// Idioma
		// -------------------------------------------------------------
		// Descrição:
		// Variáveis relacionadas à idioma.
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// Idiomas disponíveis.
		var ptbr = document.getElementById('index_pt-br');
		var enus = document.getElementById('index_en-us');
		var eses = document.getElementById('index_es-es');
		var jajp = document.getElementById('index_ja-jp');
		// Idioma selecionado pelo usuário.
		var language = document.getElementById('option_language').value;
		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// -------------------------------------------------------------



		// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		// -------------------------------------------------------------



		// Define os textos de acordo com a linguagem selecionada.
		switch(language){
			// PT-BR (Português, Brasil).
			case 'pt-br':
				document.title = 'PROJETO HANABI';
				project.textContent = 'PROJETO';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'Seja bem-vindo(a)!';
				label.textContent = 'IDIOMA:';
				button.textContent = 'ACESSAR O SITE';
				// Seleciona essa opção
				ptbr.style.display = 'none';
				ptbr.disabled = true;
				ptbr.selected = 'selected';
				document.documentElement.setAttribute('lang', 'pt-BR');
				break;
			// EN-US (Inglês, Estados Unidos)
			case 'en-us':
				document.title = 'PROJECT HANABI';
				project.textContent = 'PROJECT';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'You are welcome!';
				label.textContent = 'LANGUAGE:';
				button.textContent = 'ACCESS THE SITE';
				// Seleciona essa opção
				enus.style.display = 'none';
				enus.disabled = true;
				enus.selected = 'selected';
				document.documentElement.setAttribute('lang', 'en-US');
				break;
			// ES-ES (Espanhol, Espanha)
			case 'es-es':
				document.title = 'PROYECTO HANABI';
				project.textContent = 'PROYECTO';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'Sea bienvenido(a)!';
				label.textContent = 'IDIOMA';
				button.textContent = 'ACCEDER AL SITIO';
				// Seleciona essa opção
				eses.style.display = 'none';
				eses.disabled = true;
				eses.selected = 'selected';
				document.documentElement.setAttribute('lang', 'es-ES');
				break;
			// JA-JP (Japonês, Japão)
			case 'ja-jp':
				document.title = 'プロジェクト花火';
				project.textContent = 'プロジェクト';
				hanabi.textContent = '花火';
				welcome.textContent = 'へようこそ！';
				label.textContent = '言語：';
				button.textContent = 'サイトにアクセス';
				// Seleciona essa opção
				jajp.style.display = 'none';
				jajp.disabled = true;
				jajp.selected = 'selected';
				document.documentElement.setAttribute('lang', 'ja-JP');
				break;
		}
	}, 500);
}


// FUNÇÃO QUE LIMPA O ÍNDEX
// -------------------------------------------------------------
// Descrição:
// Função que limpa o índex
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function resetindex(){
	// VARIÁVEIS
	// -------------------------------------------------------------
	// Descrição:
	// Variáveis que são utilizadas nessa função específica.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// Textos gerais
	// -------------------------------------------------------------
	// Descrição:
	// Itens gerais de texto do site.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	var project = document.getElementById('project');
	var hanabi = document.getElementById('hanabi');
	var welcome = document.getElementById('welcome');
	var label = document.getElementById('index_label');
	var button = document.getElementById('index_button');
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------

	// Idiomas
	// -------------------------------------------------------------
	// Descrição:
	// Idiomas disponíveis para tradução.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	var ptbr = document.getElementById('index_pt-br');
	var enus = document.getElementById('index_en-us');
	var eses = document.getElementById('index_es-es');
	var jajp = document.getElementById('index_ja-jp');
	// -------------------------------------------------------------
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------





	// Reseta o título do site
	document.title = '';
	// Reseta o conteúdo dos textos gerais
	project.textContent = '';
	hanabi.textContent = '';
	welcome.textContent = '';
	label.textContent = '';
	button.textContent = '';

	// Tira a seleção de todas as opções selecionadas.
	switch(true){
		// PT-BR (Português, Brasil).
		case ptbr.disabled:
			ptbr.style.display = 'block';
			ptbr.disabled = false;
			break;
		case enus.disabled:
		// EN-US (Inglês, Estados Unidos)
			enus.style.display = 'block';
			enus.disabled = false;
			break;
		case eses.disabled:
		// ES-ES (Espanhol, Espanha)
			eses.style.display = 'block';
			eses.disabled = false;
			break;
		// JA-JP (Japonês, Japão)
		case jajp.disabled:
			ja-jp 
			jajp.style.display = 'block';
			jajp.disabled = false;
			break;
	}
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// -------------------------------------------------------------