<?php 
	// conexão com banco database cne
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME, $link);
?>

<div class='text-center header-3'><h2>Alterar</h2></div>
<div class='centered-20'>
	<form id='myForm' action='<?php echo $_SERVER['PHP_SELF'].'?type='.$_GET['type'].'&id='.$_GET['id']; ?>' method='post'>
	  	<div class='form-group'>

<?php
    if($_GET['type'] == '1'):
    	$time = select('*', 'times', 'id', $_GET['id'], $link);
    	//var_dump($time);
?>

<!-- FORMULÁRIO TIME -->

<label for='input_nome_time'>Time</label>
<input type='text' name='nome' class='form-control' id='input_nome_time' placeholder='Nome do time' value='<?php echo $time["nome"]; ?>' required />
<input type='text' name='sigla' class='form-control' placeholder='Sigla do time' maxlength="4" style='margin-top: 10px;' value='<?php echo $time["sigla"]; ?>' required />

<?php
    elseif($_GET['type'] == '2'):
    	$capitao = select('*', 'capitaes', 'id', $_GET['id'], $link);
?>

<!-- FORMULÁRIO CAPITAO -->
<label for='input_nome_time'>Capitão</label>
<input type='text' name='nome' class='form-control' id='input_capitao' placeholder='nome' value='<?php echo $capitao["nome"]; ?>' required />
<input type='text' name='login' onblur='lower(this);validar_email(this);' class='form-control' placeholder='email' style='margin-top: 10px;' value='<?php echo $capitao["login"]; ?>' required />
<input type='text' name='nick' class='form-control' placeholder='nick' style='margin-top: 10px;' required value='<?php echo $capitao["nick"]; ?>' />
<div class="input-group">
	<input type='text' name='cidade' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php echo $capitao["cidade"]; ?>' />
	<span class="input-group-btn">
	<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
	</span>
</div>
<div class="input-group">
	<input type='text' name='telefone' onKeypress='mask(this,"telefone");' class='form-control' placeholder='telefone' maxlength='16' style='margin-top: 10px;' required value='<?php echo $capitao["telefone"]; ?>' />
		<span class="input-group-btn">
		<a href="#" class="btn btn-info" onclick="swal('','Digite seu número com o 9º dígito.\nExemplo: (84) 9 9818-4097', 'info');" style='margin-top: 10px;'>?</a>
		</span>
</div>
<input type='text' name='cpf' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $capitao["cpf"]; ?>' required />

<?php
    elseif($_GET['type'] == '3'):
    	$jogador = select('*', 'jogadores', 'id', $_GET['id'], $link);
?>

<!-- FORMULÁRIO JOGADOR -->
<label for='input_nome_jogador'>Jogador</label>
<input type='text' name='nome' class='form-control' id='input_nome_jogador' placeholder='Nome do jogador' value='<?php echo $jogador["nome"]; ?>' required />
<input type='text' name='nick' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php echo $jogador["nick"]; ?>' required />
<div class="input-group">
	<input type='text' name='cidade' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php echo $jogador["cidade"]; ?>' />
	<span class="input-group-btn">
	<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
	</span>
</div>
<input type='text' name='cpf' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $jogador["cpf"]; ?>' required />

	  		  	
<?php
    endif;
?>
    	</div>
	  	<div id='buttons'>
		  	<button type='submit' class='btn btn-default'>Submit</button>
	  	</div>
	</form>
</div>

<?php
	$permissao = true;
	if(!isset($_SESSION['privilegio'])){
        swal('Permissão negada!', 'Você não tem privilégios para acessar essa pagina!', 'error', '/');
        $permissao = false;
    }
    else if(isset($_SESSION['privilegio'])){
    	if($_SESSION['privilegio'] == 'capitao'){
    		if($_GET['type'] == 1){
    			if($_SESSION['time'] != $time['sigla']){
    				swal('Permissão negada!', 'Você não tem privilégios para acessar essa pagina!', 'error', '/');
    				$permissao = false;
    			}
    		}
    		else if($_GET['type'] == 2){
    			if($_SESSION['time'] != $capitao['sigla']){
    				swal('Permissão negada!', 'Você não tem privilégios para acessar essa pagina!', 'error', '/');
    				$permissao = false;
    			}
    		}
    		else if($_GET['type'] == 3){
    			if($_SESSION['time'] != $jogador['sigla']){
    				swal('Permissão negada!', 'Você não tem privilégios para acessar essa pagina!', 'error', '/');
    				$permissao = false;
    			}
    		}
    	}
    }

    if(count($_POST) > 0 && !isset($_GET['rt']) && $permissao){

    	$inserir = true;

    	if($_GET['type'] == '1'){
    		// VERIFICAÇÃO DO TIME
    		try{
    			$check_time_nome = select('*', 'times', 'nome', $_POST['nome'], $link);
		    	if(isset($check_time_nome['nome'])){
		    		if($check_time_nome['id'] != $time['id']){
		    			throw new Exception("O nome ".$check_time_nome['nome']." já está cadastrado!");
		    		}
		    	}

		    	$check_time_sigla = select('*', 'times', 'sigla', $_POST['sigla'], $link);
		    	if(isset($check_time_sigla['sigla'])){
		    		if($check_time_sigla['id'] != $time['id']){
		    			throw new Exception("O nome ".$check_time_sigla['sigla']." já está cadastrado!");
		    		}
		    	}
    		} catch (Exception $e){
    			$inserir = false;
    			$mensagem = $e->getMessage();
    			swal('Dado duplicado!', $mensagem, 'error', '/index.php/cne/alterar?type='.$_GET['type'].'&id='.$_GET['id']);
    		}
    		// END VERIFICAÇÃO

    		if($inserir){
    			// UPDATE TIME
    			update($_POST, 'times', 'id', $time['id'], $link);

    			// UPDATE SIGLA DO TIME NO INTEGRANTES
		    	$capitao['sigla'] = $_POST['sigla'];
		    	update($capitao, 'capitaes', 'id', $time['id_capitao'], $link);

		    	$integrantes['integrante_2']['sigla'] = $_POST['sigla'];
		    	$integrantes['integrante_3']['sigla'] = $_POST['sigla'];
		    	$integrantes['integrante_4']['sigla'] = $_POST['sigla'];
		    	$integrantes['integrante_5']['sigla'] = $_POST['sigla'];

		    	if($time['id_reserva']){
		    		$integrantes['reserva']['sigla'] = $_POST['sigla'];
		    	}

		    	foreach ($integrantes as $key => $value) {
		    		update($integrantes[$key], 'jogadores', 'id', $time['id_'.$key], $link);
		    	}

		    	$_SESSION['time'] = $_POST['sigla'];

		    	swal('', 'Dados alterados com sucesso!', 'success', '/index.php/cne/time');
    		}

	    	
    	}
    	else if($_GET['type'] == '2'){
    		// VERIFICAÇÃO CIDADE

    		$check_cidades = true;
    		$counter_cidades = 0;
    		if($_POST['cidade'] != ''){
    			$counter_cidades++;
    		}

    		$time = select('*', 'times', 'sigla', $capitao['sigla'], $link);

    		$integrantes['integrante_2'] = select('*', 'jogadores', 'id', $time['id_integrante_2'], $link);
    		$integrantes['integrante_3'] = select('*', 'jogadores', 'id', $time['id_integrante_3'], $link);
    		$integrantes['integrante_4'] = select('*', 'jogadores', 'id', $time['id_integrante_4'], $link);
    		$integrantes['integrante_5'] = select('*', 'jogadores', 'id', $time['id_integrante_5'], $link);
    		$integrantes['reserva'] = select('*', 'jogadores', 'id', $time['id_reserva'], $link);

    		if(!$integrantes['reserva']){
    			unset($integrantes['reserva']);
    		}

    		foreach ($integrantes as $key => $value) {
    			if($integrantes[$key]['cidade'] != ''){
	    			$counter_cidades++;
	    		}
	   		}

    		try {
	    		if($counter_cidades < 3){
	    			throw new Exception("Exception cidades!");
		    	}
	    	} catch (Exception $e) {
	    		$check_cidades = false;
	    		php_form('Dados incompletos!', 'É necessário ter pelo menos 3 jogadores inscritos pertencentes à cidades nodestinas.', true);
	    	}

    		if(!$check_cidades){
	    		$inserir = false;
	    	}

	    	// END VERIFICAÇÃO DAS CIDADES
    		// VERIFICAÇÃO DO CAPITÃO

    		try {
    			$jog = false;
    			$check_capitao_login = select('login', 'capitaes', 'login', $_POST['login'], $link);
				if(isset($check_capitao_login['login'])){
					if($check_capitao_login['id'] != $capitao['id']){
			    		throw new Exception("O email ".$check_capitao_login['login']." já está cadastrado!");
		    		}
		    	}

		    	$check_capitao_nick = select('nick', 'capitaes', 'nick', $_POST['nick'], $link);
		    	if(!$check_capitao_nick){
		    		$check_capitao_nick = select('nick', 'jogadores', 'nick', $_POST['nick'], $link);
		    		$jog = true;
		    	}
		    	if(isset($check_capitao_nick['nick'])){
		    		if($check_capitao_nick['id'] != $capitao['id'] || $jog){
			    		throw new Exception("O nick ".$check_capitao_nick['nick']." já está cadastrado!");
		    		}
		    	}

                $jog = false;

		    	$check_capitao_cpf = select('cpf', 'capitaes', 'cpf', $_POST['cpf'], $link);
		    	if(!$check_capitao_cpf){
		    		$check_capitao_cpf = select('cpf', 'jogadores', 'cpf', $_POST['cpf'], $link);
		    		$jog = true;
		    	}
		    	if(isset($check_capitao_cpf['cpf'])){
		    		if($check_capitao_cpf['id'] != $capitao['id'] || $jog){
			    		throw new Exception("O cpf ".$check_capitao_cpf['cpf']." já está cadastrado!");
		    		}
		    	}
    		} catch (Exception $e) {
    			$inserir = false;
    			$mensagem = $e->getMessage();
    			swal('Dado duplicado!', $mensagem, 'error', '/index.php/cne/alterar?type='.$_GET['type'].'&id='.$_GET['id']);
    		}

    		// END VERIFICAÇÃO

    		if($inserir){
    			update($_POST, 'capitaes', 'id', $capitao['id'], $link);
		    	swal('', 'Dados alterados com sucesso!', 'success', '/index.php/cne/time');
    		}
    	}
    	else if($_GET['type'] == '3'){
    		// VERIFICAÇÃO CIDADE

    		$check_cidades = true;
    		$counter_cidades = 0;

    		$time = select('*', 'times', 'sigla', $jogador['sigla'], $link);

    		$integrantes['capitao'] = select('*', 'capitaes', 'id', $time['id_capitao'], $link);
    		$integrantes['integrante_2'] = select('*', 'jogadores', 'id', $time['id_integrante_2'], $link);
    		$integrantes['integrante_3'] = select('*', 'jogadores', 'id', $time['id_integrante_3'], $link);
    		$integrantes['integrante_4'] = select('*', 'jogadores', 'id', $time['id_integrante_4'], $link);
    		$integrantes['integrante_5'] = select('*', 'jogadores', 'id', $time['id_integrante_5'], $link);
    		$integrantes['reserva'] = select('*', 'jogadores', 'id', $time['id_reserva'], $link);

    		foreach ($integrantes as $key => $value) {
    			if($key != 'capitao' && $integrantes[$key]['id'] == $jogador['id']){
    				unset($integrantes[$key]);
    			}
    			if($key == 'reserva' && !$integrantes['reserva']){
	    			unset($integrantes['reserva']);
    			}
    		}

    		if($_POST['cidade'] != ''){
    			$counter_cidades++;
    		}

    		foreach ($integrantes as $key => $value) {
    			if($integrantes[$key]['cidade'] != ''){
	    			$counter_cidades++;
	    		}
	   		}

    		try {
	    		if($counter_cidades < 3){
	    			throw new Exception("Exception cidades!");
		    	}
	    	} catch (Exception $e) {
	    		$check_cidades = false;
	    		php_form('Dados incompletos!', 'É necessário ter pelo menos 3 jogadores inscritos pertencentes à cidades nodestinas.', true);
	    	}

    		if(!$check_cidades){
	    		$inserir = false;
	    	}

	    	// END VERIFICAÇÃO DAS CIDADES
    		// VERIFICAÇÃO DO JOGADOR

    		try {
    			$cap = false;
    			$check_jogador_nick = select('nick', 'jogadores', 'nick', $_POST['nick'], $link);
    			if(!$check_jogador_nick){
		    		$check_jogador_nick = select('nick', 'capitaes', 'nick', $_POST['nick'], $link);
		    		$cap = true;
		    	}
		    	if(isset($check_jogador_nick['nick'])){
		    		if($check_jogador_nick['id'] != $jogador['id'] || $cap){
			    		throw new Exception("O nick ".$check_jogador_nick['nick']." já está cadastrado!");
		    		}
		    	}

                $cap = false;

		    	$check_jogador_cpf = select('cpf', 'jogadores', 'cpf', $_POST['cpf'], $link);
		    	if(!$check_jogador_cpf){
		    		$check_jogador_cpf = select('cpf', 'capitaes', 'cpf', $_POST['cpf'], $link);
		    		$cap = true;
		    	}
		    	//var_dump($check_jogador_cpf);
		    	if(isset($check_jogador_cpf['cpf'])){
		    		if($check_jogador_cpf['id'] != $jogador['id'] || $cap){
			    		throw new Exception("O cpf ".$check_jogador_cpf['cpf']." já está cadastrado!");
		    		}
		    	}
    		} catch (Exception $e) {
    			$inserir = false;
    			$mensagem = $e->getMessage();
    			swal('Dado duplicado!', $mensagem, 'error', '/index.php/cne/alterar?type='.$_GET['type'].'&id='.$_GET['id']);
    		}
    		
    		// END VERIFICAÇÃO

	    	if($inserir){
	    		update($_POST, 'jogadores', 'id', $jogador['id'], $link);
				swal('', 'Dados alterados com sucesso!', 'success', '/index.php/cne/time');
	    	}

    	}
    }
?>