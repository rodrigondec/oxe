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
	    	<input type='text' name='capitao[login]' onkeyup='lower(this);' class='form-control' placeholder='email' style='margin-top: 10px;' required />
	    	<div class="input-group">
	    		<input type='password' name='capitao[senha]' class='form-control' placeholder='senha' style='margin-top: 10px;' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Será criado um login para o capitão','Com esse login o capitão poderá alterar os dados de seu time. O login será o email do capitão', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='capitao[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required />
	    	<div class="input-group">
	    		<input type='text' name='capitao[telefone]' onKeypress='mask(this,"telefone");' class='form-control' placeholder='telefone' maxlength='16' style='margin-top: 10px;' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-info" onclick="swal('','Digite seu número com o 9º dígito.\nExemplo: (84) 9 9818-4097', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='capitao[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' required />
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
<?php 
    if(count($_POST) > 0){
    	var_dump($_POST);
    	if(count($_POST) < 6 || count($_POST) > 8){
    		echo "<button hidden id='clickButton' onClick='form_breached();'>teste</buttom>
    		<script type='text/javascript'>
    		window.onload = function(){
    			document.getElementById('clickButton').click();
    		}
    		</script>"; 
    	}
    	else{
    		/* VERIFICAÇÃO DOS DADOS. CHECAGEM PARA DUPLICATAS */
    		$time = array();
    		$capitao = array();
    		$integrantes = array();
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

	    	$check_time_nome = select('nome', 'times', 'nome', $time['nome'], $link_cne);
	    	if(isset($check_time_nome['nome'])){
	    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"time\", \"O nome ".$check_time_nome['nome']." já está cadastrado!\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
	    			</script>";
	    	}

	    	$check_time_sigla = select('sigla', 'times', 'sigla', $time['sigla'], $link_cne);
	    	if(isset($check_time_sigla['sigla'])){
	    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"time\", \"A sigla ".$check_time_sigla['sigla']." já está cadastrada!\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
	    			</script>";
	    	}

	    	$check_capitao_login = select('login', 'capitaes', 'login', $capitao['login'], $link_cne);
			if(isset($check_capitao_login['login'])){
	    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"capitão\", \"O email ".$check_capitao_login['login']." já está cadastrado!\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
	    			</script>";
	    	}

	    	$check_capitao_nick = select('nick', 'capitaes', 'nick', $capitao['nick'], $link_cne);
	    	if(isset($check_capitao_nick['nick'])){
	    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"capitão\", \"O nick ".$check_capitao_nick['nick']." já está cadastrado!\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
	    			</script>";
	    	}

	    	$check_capitao_cpf = select('cpf', 'capitaes', 'cpf', $capitao['cpf'], $link_cne);
	    	if(isset($check_capitao_cpf['cpf'])){
	    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"capitão\", \"O cpf ".$check_capitao_cpf['cpf']." já está cadastrado!\");'>teste</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
	    			</script>";
	    	}

	    	$check_integrantes = array();
	    	foreach ($integrantes as $key => $value) {
	    		$check_integrantes[$key] = select('nick', 'jogadores', 'nick', $integrantes[$key]['nick'], $link_cne);
	    		if(isset($check_integrantes[$key]['nick'])){
		    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"jogador ".$integrantes[$key]['nome']."\", \"O nick ".$integrantes[$key]['nick']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
		    			</script>";
		    	}
	    		$check_integrantes[$key] = select('cpf', 'jogadores', 'cpf', $integrantes[$key]['cpf'], $link_cne);
	    		if(isset($check_integrantes[$key]['cpf'])){
		    		echo "<button hidden id='clickButton' onClick='dado_duplicado(\"jogador ".$integrantes[$key]['nome']."\", \"O cpf ".$integrantes[$key]['cpf']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
		    			</script>";
		    	}
	    	}
	    	/* END VERIFICAÇÃO */
    	}

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

    	echo 'verificar a inscrição do time';
    	//ob_clean();
		//header('LOCATION: /oxe/index.php/cne/success/');
    }

    $nome_cap = 'rodrigo';
    $nome_time = 'Failboat';

    $para = 'rodrigondec@gmail.com';
    $assunto = 'Campeonato CNE';

    $mensagem = 'Prezado '.$nome_cap.', ';
    $mensagem .= 'seu time '.$nome_time.' foi inscrito com sucesso no campeonato CNE. ';
    $mensagem .= 'Favor realizar o pagamento da taxa de isncrição através de uma transferência. ';
    $mensagem .= 'Seu time terá a vaga reservada durante 2 dias úteis. Caso a transferência não seja realizada ';
    $mensagem .= 'até o término desse prazo, seu time perderá a preferência para as 64 vagas reservadas, podendo assim ';
    $mensagem .= 'ficar de fora do campeonato. ';
    $mensagem .= 'Os dados da conta bancária são: Agência 1668-3  //  Conta 40302-4 // Rodrigo Nunes de Castro ';
    $mensagem .= 'Att, Equipe OxE';

    send_mail($para, $assunto, $mensagem);
?>