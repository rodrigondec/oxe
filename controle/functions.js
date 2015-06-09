function log_out(){
	swal({
  		title: "",
  		text: "Quer mesmo deslogar?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonClass: "btn-danger",
  		confirmButtonText: "logout!",
  		closeOnConfirm: false
	},
	function(){
	  window.location = '/oxe/logout.php';
	});
}

function login_errado(){
	swal({
		title: "Login inválido!",
		text: "Verifique e insira novamente seu login e senha",
		type: "error",
		closeOnConfirm: false,
		html: false
	});	
}

function success(){
	swal({
		title: "",
		text: "Seu time foi inscrito com sucesso!",
		type: "success",
		closeOnConfirm: false,
		html: false
	}, 
	function(){
		window.location = '/oxe/index.php/cne/home';
	});	
}

function success_alt(){
	swal({
		title: "",
		text: "Dados alterados com sucesso!",
		type: "success",
		closeOnConfirm: false,
		html: false
	}, 
	function(){
		window.location = '/oxe/index.php/cne/time';
	});	
}

function remove_reserva(link){
	label = link.parentNode;
	counter = true;
	div_form_group = label.parentNode;
	div = div_form_group.parentNode;
	div.remove();
	swal("", "Reserva removido com sucesso!", "success");
}

function reserva(){
	if (counter) {
		counter = false;
		var div = document.getElementById('time');
		var reserva = document.createElement('div')
		reserva.innerHTML = "<div class='form-group'><label id=\'reserva\' for=\'input_reserva\'>Reserva <a class=\'btn btn-danger\' href=\'#\' onClick=\'remove_reserva(this);\'>remover</a></label><input type=\'text\' name=\'reserva[nome]\' class=\'form-control\' id=\'input_reserva\' placeholder=\'nome\' required /><input type=\'text\' name=\'reserva[nick]\' class=\'form-control\' placeholder=\'nick\' style=\'margin-top: 10px;\' required /><input type=\'text'\ name=\'reserva[cpf]\' onKeypress='mask(this,\"cpf\");' class=\'form-control\' placeholder=\'CPF\' maxlength=\'14\' style=\'margin-top: 10px;\' required /></div>";
		div.appendChild(reserva);
		swal("", "Reserva adicionado com sucesso!", "success");
	} 
	else{
		swal("", "Não é permitido ter mais do que 1 reserva por time", "error");
	};
}

function upper(textbox) {
    textbox.value = textbox.value.toUpperCase();
}

function lower(textbox){
	textbox.value = textbox.value.toLowerCase();
}

function form_breached(){
	swal({
		title: "Erro!",
		text: "Ocorreu um comportamento inesperado no sistema!\nFavor tentar preencher novamente o formulário",
		type: "error",
		closeOnConfirm: false,
		html: false
	}, 
	function(){
		window.location = '/oxe/index.php/cne/inscricao';
	});	
}

function dado_duplicado(id, str){
	swal({
		title: "Cadastro do "+id+" duplicado!",
		text: str,
		type: "error",
		closeOnConfirm: false,
		html: false
	}, 
	function(){
		window.location = '/oxe/index.php/cne/inscricao';
	});
}

function dado_alt(id, str){
	swal({
		title: "Cadastro do "+id+" duplicado!",
		text: str,
		type: "error",
		closeOnConfirm: false,
		html: false
	}, 
	function(){
		window.location = '/oxe/index.php/cne/time';
	});
}

function validar_email(textbox){
	usuario = textbox.value.substring(0, textbox.value.indexOf("@")); 
	dominio = textbox.value.substring(textbox.value.indexOf("@")+ 1, textbox.value.length); 

	if(!((usuario.length >=1) && 
		(dominio.length >=3) && 
		(usuario.search("@")==-1) && 
		(dominio.search("@")==-1) && 
		(usuario.search(" ")==-1) && 
		(dominio.search(" ")==-1) && 
		(dominio.search(".")!=-1) && 
		(dominio.indexOf(".") >=1) && 
		(dominio.lastIndexOf(".") < dominio.length - 1))) { 
		swal('Email inválido!', 'Favor digite um email válido no campo indicado', 'error');
	} 
}

function mask(textbox, tipo){
	str = textbox.value;
	if (tipo == 'cpf'){
		var loc = '3,7,11';
		var delim = '.,.,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str;
	}

	if (tipo == 'telefone'){
		var loc = '0,3,4,6,11';
		var delim = '(,), , ,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str
	}	
}