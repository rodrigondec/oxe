<script type="text/javascript">
	var counter = 0;
</script>
<div class='form-boot'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<div id='time'>
	  	<div class='form-group'>
	    	<label for='input_nome_time'>Time</label>
	    	<input type='text' name='nome_time' class='form-control' id='input_nome_time' placeholder='Nome do time' required />
	    	<input type='text' name='sigla_time' class='form-control' id='input_sigla_time' placeholder='Sigla do time' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_capitao'>Capitão</label>
	    	<input type='text' name='nome_capitao' class='form-control' id='input_capitao' placeholder='nome' required />
	    	<input type='text' name='email_capitao' class='form-control' placeholder='email' style='margin-top: 10px;' required />
	    	<div class="input-group">
	    		<input type='password' name='password_capitao' class='form-control' placeholder='password' style='margin-top: 10px;' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Ao realizar o cadastro do seu time, é criado um login para o capitão. Desse modo permitando realizar alterações em seu time." style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='nick_capitao' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='telefone_capitao' class='form-control' placeholder='telefone' style='margin-top: 10px;' required />
	    	<input type='text' name='cpf_capitao' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #2</label>
	    	<input type='text' name='nome_integrante_2' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='nick_integrante_2' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='cpf_integrante_2' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #3</label>
	    	<input type='text' name='nome_integrante_3' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='nick_integrante_3' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='cpf_integrante_3' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #4</label>
	    	<input type='text' name='nome_integrante_4' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='nick_integrante_4' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='cpf_integrante_4' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #5</label>
	    	<input type='text' name='nome_integrante_5' class='form-control' placeholder='nome' required />
	    	<input type='text' name='nick_integrante_5' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='cpf_integrante_5' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	</div>
	  	<!-- 
	  		<div class='form-group'>
	  			<label id='reserva_"+counter+"' for='input_reserva'>
	  				Reserva #"+counter+" <a class='btn btn-danger' href='#' onClick='remove_reserva(this);'>
	  					remover
  					</a>
				</label>
				<input type='text' name='nome_reserva[]' class='form-control' id='input_reserva' placeholder='nome' required />
				<input type='text' name='nick_reserva[]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
				<input type='text' name='cpf_reserva[]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
			</div>
		-->
	  	<div id='buttons'>
	  	<button type='submit' class='btn btn-default'>Submit</button>
	  	<a class='btn btn-info' href='#' onClick='reserva();'>Adicionar reserva</a>
	  	</div>
	</form>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>