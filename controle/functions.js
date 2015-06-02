function log(){
	/*var check = confirm('Deseja mesmo deslogar do sistema Saga?')
	if(check){
		window.location = '/logout.php';
	}*/
	alert('Funcionalidade não pronta!');
}

function remove_reserva(link){
	counter--;
	div_form_group = link.parentNode;
	div_time = div_form_group.parentNode;
	div_time.remove();
	
}

function reserva(){
	if (counter <= 1) {
		counter++;
		var div = document.getElementById('time');
		var reserva = document.createElement('div')
		reserva.innerHTML = "<div class='form-group'><label for='input_'>Reserva # <a class='btn btn-danger' href='#' onClick='remove_reserva(this);'>remover</a></label><input type='text' name='' class='form-control' id='input_' placeholder='nome' required /><input type='text' name='' class='form-control' id='input_' placeholder='email' style='margin-top: 10px;' /><input type='text' name='' class='form-control' id='input_' placeholder='nick' style='margin-top: 10px;' /><input type='text' name='' class='form-control' id='input_' placeholder='telefone' style='margin-top: 10px;' /><input type='text' name='' class='form-control' id='input_' placeholder='email' style='margin-top: 10px;' /><input type='text' name='' class='form-control' id='input_' placeholder='CPF/Identidade' style='margin-top: 10px;' /></div>"
		div.appendChild(reserva);
	} 
	else{
		alert("Não é possível ter mais do que 2 reservas por time!");
	};
}

function mask(str, textbox, tipo){
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
		var loc = '0,3,4,9';
		var delim = '(,), ,-';

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