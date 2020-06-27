//INDEX
function indexlanguage(){
	setTimeout(function () {
		//Limpa tudo para evitar bugs e conflitos
		resetindex();
		//Variáveis
		//Textos gerais
		var project = document.getElementById('project');
		var hanabi = document.getElementById('hanabi');
		var welcome = document.getElementById('welcome');
		var label = document.getElementById('index_label');
		var button = document.getElementById('index_button');
		//Idiomas
		var ptbr = document.getElementById('index_pt-br');
		var enus = document.getElementById('index_en-us');
		var eses = document.getElementById('index_es-es');
		var jajp = document.getElementById('index_ja-jp');
		//Idioma Selecionado
		var language = document.getElementById('option_language').value;

		switch(language){
			case 'pt-br':
				document.title = 'PROJETO HANABI';
				project.textContent = 'PROJETO';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'Seja bem-vindo(a)!';
				label.textContent = 'IDIOMA:';
				button.textContent = 'ACESSAR O SITE';
				//Seleciona essa opção
				ptbr.style.display = 'none';
				ptbr.disabled = true;
				ptbr.selected = 'selected';
				document.documentElement.setAttribute('lang', 'pt-BR');
				break;
			case 'en-us':
				document.title = 'PROJECT HANABI';
				project.textContent = 'PROJECT';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'You are welcome!';
				label.textContent = 'LANGUAGE:';
				button.textContent = 'ACCESS THE SITE';
				//Seleciona essa opção
				enus.style.display = 'none';
				enus.disabled = true;
				enus.selected = 'selected';
				document.documentElement.setAttribute('lang', 'en-US');
				break;
			case 'es-es':
				document.title = 'PROYECTO HANABI';
				project.textContent = 'PROYECTO';
				hanabi.textContent = 'HANABI';
				welcome.textContent = 'Sea bienvenido(a)!';
				label.textContent = 'IDIOMA';
				button.textContent = 'ACCEDER AL SITIO';
				//Seleciona essa opção
				eses.style.display = 'none';
				eses.disabled = true;
				eses.selected = 'selected';
				document.documentElement.setAttribute('lang', 'es-ES');
				break;
			case 'ja-jp':
				document.title = 'プロジェクト花火';
				project.textContent = 'プロジェクト';
				hanabi.textContent = '花火';
				welcome.textContent = 'へようこそ！';
				label.textContent = '言語：';
				button.textContent = 'サイトにアクセス';
				//Seleciona essa opção
				jajp.style.display = 'none';
				jajp.disabled = true;
				jajp.selected = 'selected';
				document.documentElement.setAttribute('lang', 'ja-JP');
				break;
		}
	}, 500);
}
//Limpar o index
function resetindex(){
	//Variáveis
	//Textos gerais
	var project = document.getElementById('project');
	var hanabi = document.getElementById('hanabi');
	var welcome = document.getElementById('welcome');
	var label = document.getElementById('index_label');
	var button = document.getElementById('index_button');
	//Idiomas
	var ptbr = document.getElementById('index_pt-br');
	var enus = document.getElementById('index_en-us');
	var eses = document.getElementById('index_es-es');
	var jajp = document.getElementById('index_ja-jp');	

	document.title = '';
	project.textContent = '';
	hanabi.textContent = '';
	welcome.textContent = '';
	label.textContent = '';
	button.textContent = '';
	//Desseleciona todas as opções
	switch(true){
		case ptbr.disabled:
			//pt-br
			ptbr.style.display = 'block';
			ptbr.disabled = false;
			break;
		case enus.disabled:
			//en-us
			enus.style.display = 'block';
			enus.disabled = false;
			break;
		case eses.disabled:
			//es-es
			eses.style.display = 'block';
			eses.disabled = false;
			break;
		case jajp.disabled:
			//ja-jp
			jajp.style.display = 'block';
			jajp.disabled = false;
			break;
	}
}