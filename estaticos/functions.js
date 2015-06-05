function log_out(){
	var check = confirm('Deseja mesmo deslogar do sistema OxE?')
	if(check){
		window.location = '/oxe/logout.php';
	}
}

function remove_reserva(link){
	label = link.parentNode;
	if(counter == 2 && label.id == 'reserva_1'){
		label_input_2 = document.getElementById('reserva_2');
		label_input_2.id = 'reserva_1';
		label_input_2.innerHTML = "Reserva #"+1+" <a class='btn btn-danger' href='#' onClick='remove_reserva(this);'>remover</a>"
	};
	counter--;
	div_form_group = label.parentNode;
	div = div_form_group.parentNode;
	div.remove();
	swal("", "Reserva removido com sucesso!", "success");
}

function reserva(){
	if (counter <= 1) {
		counter++;
		var div = document.getElementById('time');
		var reserva = document.createElement('div')
		reserva.innerHTML = "<div class=\'form-group\'><label id=\'reserva_"+counter+"\' for=\'input_reserva\'>Reserva #"+counter+" <a class=\'btn btn-danger\' href=\'#\' onClick=\'remove_reserva(this);\'>remover</a></label><input type=\'text\' name=\'reserva_"+counter+"[nome]\' class=\'form-control\' id=\'input_reserva\' placeholder=\'nome\' required /><input type=\'text\' name=\'reserva_"+counter+"[nick]\' class=\'form-control\' placeholder=\'nick\' style=\'margin-top: 10px;\' required /><input type=\'text\' name=\'reserva_"+counter+"[cpf]\' class=\'form-control\' placeholder=\'CPF/Identidade\' style=\'margin-top: 10px;\' required /></div>";
		div.appendChild(reserva);
		swal("", "Reserva adicionado com sucesso!", "success");
	} 
	else{
		swal("Não foi possível adicionar o reserva!", "Não pode ter mais do que 2 reservas por time", "error");
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