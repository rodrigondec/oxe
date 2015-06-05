<?php 
    // conexão com banco database oxe
    $link_oxe = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link_oxe) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_OXE, $link_oxe);

    // conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);
?>
<script type="text/javascript">
	var counter = 0;
</script>
<div class='form-boot-20'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<div id='time'>
	  	<div class='form-group'>
	    	<label for='input_nome_time'>Time</label>
	    	<input type='text' name='time[nome]' class='form-control' id='input_nome_time' placeholder='Nome do time' required />
	    	<input type='text' name='time[sigla]' class='form-control' id='input_sigla_time' placeholder='Sigla do time' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_capitao'>Capitão</label>
	    	<input type='text' name='capitao[nome]' class='form-control' id='input_capitao' placeholder='nome' required />
	    	<input type='text' name='capitao[login]' class='form-control' placeholder='email' style='margin-top: 10px;' required />
	    	<div class="input-group">
	    		<input type='password' name='capitao[senha]' class='form-control' placeholder='senha' style='margin-top: 10px;' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Ao realizar o cadastro do seu time, é criado um login para o capitão. Desse modo permitando realizar alterações em seu time." style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='capitao[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='capitao[telefone]' class='form-control' placeholder='telefone' style='margin-top: 10px;' required />
	    	<input type='text' name='capitao[cpf]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #2</label>
	    	<input type='text' name='integrante_2[nome]' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='integrante_2[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='integrante_2[cpf]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #3</label>
	    	<input type='text' name='integrante_3[nome]' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='integrante_3[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='integrante_3[cpf]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #4</label>
	    	<input type='text' name='integrante_4[nome]' class='form-control' id='input_' placeholder='nome' required />
	    	<input type='text' name='integrante_4[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='integrante_4[cpf]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #5</label>
	    	<input type='text' name='integrante_5[nome]' class='form-control' placeholder='nome' required />
	    	<input type='text' name='integrante_5[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<input type='text' name='integrante_5[cpf]' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
	  	</div>
	  	<!-- <div class='form-group'>
	  		<label id='reserva_"+counter+"' for='input_reserva'>Reserva #"+counter+" <a class='btn btn-danger' href='#' onClick='remove_reserva(this);'>remover</a></label>
	 		<input type='text' name='reserva_"+counter+"['nome']' class='form-control' id='input_reserva' placeholder='nome' required />
	 		<input type='text' name='reserva_"+counter+"['nick']' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	 		<input type='text' name='reserva_"+counter+"['cpf']' class='form-control' placeholder='CPF/Identidade' style='margin-top: 10px;' required />
 		</div> -->

	  	</div>
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
<?php 
    if(count($_POST) > 0){
    	$time = array();
    	$capitao = array();
    	$integrantes = array();
    	$id_integrantes = array();
    	foreach ($_POST as $variante => $bloco) {
    		if($variante == 'time'){
    			$time = $bloco;
    		}
    		else if($variante == 'capitao'){
    			$capitao = $bloco;
    			$capitao['sigla_time'] = $time['sigla'];
    		}
    		else{
    			$integrantes[$variante] = $bloco;
    		}
    		
    	}

    	insert($capitao, 'capitaes', $link_cne);
    	$id_capitao = select('id', 'capitaes', 'cpf', $capitao['cpf'], $link_cne);
    	
    	foreach ($integrantes as $num_integrante => $integrante) {
    		insert($integrante, 'jogadores', $link_cne);echo '<br><br>';
    		$id_integrantes[$num_integrante] = select('id', 'jogadores', 'cpf', $integrante['cpf'], $link_cne);
    	}
    	
    	$time['id_capitao'] = $id_capitao['id'];

    	foreach ($id_integrantes as $num_integrante => $integrante) {
    		//var_dump($id_integrante);echo '<br><br>';
    		$time['id_'.$num_integrante] = $integrante['id'];
    	}

    	insert($time, 'times', $link_cne);

    	ob_clean();
		header('LOCATION: /oxe/index.php/cne/success/');
    }
?>