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
<script type="text/javascript">
	var counter = true;
</script>
<?php 
    if(count($_POST) > 0 && isset($_POST['reserva'])):
?>
<script type="text/javascript">
	counter = false;
</script>
<?php 
    endif;
?>
<div class='centered-20'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post' id='myForm'>
		<div id='time'>
	  	<div class='form-group'>
	    	<label for='input_nome_time'>Time</label>
	    	<input type='text' name='time[nome]' class='form-control' id='input_nome_time' placeholder='Nome do time' value='<?php if(count($_POST) > 0){echo $_POST['time']['nome'];} ?>' required />
	    	<input type='text' name='time[sigla]' class='form-control' id='input_sigla_time' placeholder='Sigla do time' maxlength="4" style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['time']['sigla'];} ?>' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_capitao'>Capitão</label>
	    	<input type='text' name='capitao[nome]' class='form-control' id='input_capitao' placeholder='nome' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['nome'];} ?>' required />
	    	<input type='text' name='capitao[login]' onblur='lower(this);validar_email(this);' class='form-control' placeholder='email' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['login'];} ?>' required />
	    	<div class="input-group">
	    		<input type='password' name='capitao[senha]' class='form-control' placeholder='senha' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['senha'];} ?>' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Será criado um login para o capitão','Com esse login o capitão poderá alterar os dados de seu time.\nO login será o email do capitão', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='capitao[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['nick'];} ?>' required />
	    	<div class="input-group">
				<input type='text' name='capitao[cidade]' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['cidade'];} ?>' />
	  			<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
  			</div>
	    	<div class="input-group">
	    		<input type='text' name='capitao[telefone]' onKeypress='mask(this,"telefone");' class='form-control' placeholder='telefone' maxlength='16' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['telefone'];} ?>' required />
      			<span class="input-group-btn">
        			<a href="#" class="btn btn-info" onclick="swal('','Digite seu número com o 9º dígito.\nExemplo: (84) 9 9818-4097', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='capitao[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['capitao']['cpf'];} ?>' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #2</label>
	    	<input type='text' name='integrante_2[nome]' class='form-control' id='input_' placeholder='nome' value='<?php if(count($_POST) > 0){echo $_POST['integrante_2']['nome'];} ?>' required />
	    	<input type='text' name='integrante_2[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_2']['nick'];} ?>' required />
	    	<div class="input-group">
	    		<input type='text' name='integrante_2[cidade]' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_2']['cidade'];} ?>' />
	    		<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='integrante_2[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_2']['cpf'];} ?>' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #3</label>
	    	<input type='text' name='integrante_3[nome]' class='form-control' id='input_' placeholder='nome' value='<?php if(count($_POST) > 0){echo $_POST['integrante_3']['nome'];} ?>' required />
	    	<input type='text' name='integrante_3[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_3']['nick'];} ?>' required />
	    	<div class="input-group">
	    		<input type='text' name='integrante_3[cidade]' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_3']['cidade'];} ?>' />
	    		<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='integrante_3[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_3']['cpf'];} ?>' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #4</label>
	    	<input type='text' name='integrante_4[nome]' class='form-control' id='input_' placeholder='nome' value='<?php if(count($_POST) > 0){echo $_POST['integrante_4']['nome'];} ?>' required />
	    	<input type='text' name='integrante_4[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_4']['nick'];} ?>' required />
	    	<div class="input-group">
	    		<input type='text' name='integrante_4[cidade]' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_4']['cidade'];} ?>' />
	    		<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='integrante_4[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_4']['cpf'];} ?>' required />
	  	</div>
	  	<div class='form-group'>
	    	<label for='input_'>Integrante #5</label>
	    	<input type='text' name='integrante_5[nome]' class='form-control' placeholder='nome' value='<?php if(count($_POST) > 0){echo $_POST['integrante_5']['nome'];} ?>' required />
	    	<input type='text' name='integrante_5[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_5']['nick'];} ?>' required />
	    	<div class="input-group">
	    		<input type='text' name='integrante_5[cidade]' class='form-control' placeholder='Cidade' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_5']['cidade'];} ?>' />
	    		<span class="input-group-btn">
        			<a href="#" class="btn btn-warning" onclick="swal('Restrição para o campo cidade nos jogadores!','O time deverá ter pelo menos 3 jogadores com o campo cidade preenchido.\nApenas preencher esse campo se a cidade pertencer ao nordeste.', 'info');" style='margin-top: 10px;'>?</a>
      			</span>
			</div>
	    	<input type='text' name='integrante_5[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php if(count($_POST) > 0){echo $_POST['integrante_5']['cpf'];} ?>' required />
	  	</div>
	  	<?php 
		    if(count($_POST) > 0 && isset($_POST['reserva'])):
		?>
		<div>
		  	<div class='form-group'>
	  			<label id='reserva' for='input_reserva'>
	  				Reserva 
	  				<a class='btn btn-danger' href='#' onClick='remove_reserva(this);'>
	  					remover
					</a>
				</label>
	  			<input type='text' name='reserva[nome]' class='form-control' id='input_reserva' placeholder='nome' value='<?php echo $_POST['reserva']['nome']; ?>' required />
	  			<input type='text' name='reserva[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php echo $_POST['reserva']['nick']; ?>' required />
	  			<input type='text' name='reserva[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $_POST['reserva']['cpf']; ?>' required />
			</div>
		</div>
		<?php 
		    endif;
		?>
	  	</div>
	  	<div id='buttons'>
		  	<button type='submit' class='btn btn-default'>Submit</button>
		  	<a class='btn btn-info' href='#' onClick='reserva();'>Adicionar reserva</a>
	  	</div>
	</form>
</div>
<?php 
    if(count($_POST) > 0 && !isset($_GET['rt'])){
    	//var_dump($_POST);
    	if(count($_POST) < 6 || count($_POST) > 7){
    		swal('Erro!', 'Ocorreu um comportamento inesperado no sistema! \nFavor tentar preencher novamente o formulário', 'error', '/index.php/cne/inscricao');
    	}
    	else{
    		// TRATAMENTO DOS DADOS
    		$_POST['capitao']['senha'] = md5($_POST['capitao']['senha']);

    		$time = array();
    		$capitao = array();
    		$integrantes = array();
    		foreach ($_POST as $variante => $bloco) {
	    		if($variante == 'time'){
	    			$time = $bloco;
	    		}
	    		else if($variante == 'capitao'){
	    			$capitao = $bloco;
	    			$capitao['sigla'] = $time['sigla'];
	    		}
	    		else{
	    			$integrantes[$variante] = $bloco;
	    		}
	    	}

	    	// VERIFICAÇÃO DAS CIDADES
	    	
	    	$check_cidades = true;
	    	$counter_cidades = 0;
	    	if($capitao['cidade'] != ''){
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
	    		php_form('Dados incompletos!', 'É necessário ter pelo menos 3 jogadores inscritos pertencentes à cidades nodestinas.');
	    	}
	    	

	    	// END VERIFICAÇÃO DAS CIDADES
    		// VERIFICAÇÃO DOS DADOS. CHECAGEM PARA DUPLICATAS 

	    	$inserir = true;
	    	if(!$check_cidades){
	    		$inserir = false;
	    	}

	    	try {
	    		$check_time_nome = select('nome', 'times', 'nome', $time['nome'], $link);
		    	if(isset($check_time_nome['nome'])){
		    		throw new Exception("time;O nome ".$check_time_nome['nome']." já está cadastrado!");
		    	}

		    	$check_time_sigla = select('sigla', 'times', 'sigla', $time['sigla'], $link);
		    	if(isset($check_time_sigla['sigla'])){
		    		throw new Exception("time;A sigla ".$check_time_sigla['sigla']." já está cadastrado!");
		    	}

		    	$check_capitao_login = select('login', 'capitaes', 'login', $capitao['login'], $link);
				if(isset($check_capitao_login['login'])){
					throw new Exception("capitão;O email ".$check_capitao_login['login']." já está cadastro!");
		    	}

		    	$check_capitao_nick = select('nick', 'capitaes', 'nick', $capitao['nick'], $link);
		    	if(!$check_jogador_nick){
		    		$check_capitao_nick = select('nick', 'jogadores', 'nick', $capitao['nick'], $link);
		    	}
		    	if(isset($check_capitao_nick['nick'])){
		    		throw new Exception("capitão;O nick ".$check_capitao_nick['nick']." já está cadastrado!");
		    	}

		    	$check_capitao_cpf = select('cpf', 'capitaes', 'cpf', $capitao['cpf'], $link);
		    	if(!$check_jogador_cpf){
		    		$check_capitao_cpf = select('cpf', 'jogadores', 'cpf', $capitao['cpf'], $link);
		    	}
		    	if(isset($check_capitao_cpf['cpf'])){
		    		throw new Exception("capitão;O cpf ".$check_capitao_cpf['cpf']." já está cadastrado!");
		    	}

		    	$check_integrantes = array();
		    	foreach ($integrantes as $key => $value) {
		    		$check_integrantes[$key] = select('nick', 'jogadores', 'nick', $integrantes[$key]['nick'], $link);
		    		if(!$check_jogador_nick){
			    		$check_jogador_nick = select('nick', 'capitaes', 'nick', $integrantes[$key]['nick'], $link);
			    	}
		    		if(isset($check_integrantes[$key]['nick'])){
		    			throw new Exception("jogador ".$integrantes[$key]['nome'].";O nick ".$integrantes[$key]['nick']." já está cadastrado!");
			    	}
		    		$check_integrantes[$key] = select('cpf', 'jogadores', 'cpf', $integrantes[$key]['cpf'], $link);
		    		if(!$check_jogador_cpf){
			    		$check_jogador_cpf = select('cpf', 'capitaes', 'cpf', $integrantes[$key]['cpf'], $link);
			    	}
		    		if(isset($check_integrantes[$key]['cpf'])){
		    			throw new Exception("jogador ".$integrantes[$key]['nome'].";O cpf ".$integrantes[$key]['cpf']." já está cadastrado!");
			    	}
		    	}
		    	// END VEFICICAÇÃO PARA DUPLICATAS NO BANCO 
		    	// INICIANDO VERIFICAÇÃO PARA DUPLICATAS NO PRÓPRIO FORM 

		    	foreach ($integrantes as $key => $value) {
		    		if($capitao['nick'] == $integrantes[$key]['nick']){
		    			throw new Exception("capitão;O nick ".$capitao['nick']." já está cadastrado!");
		    		}

		    		if($capitao['cpf'] == $integrantes[$key]['cpf']){
		    			throw new Exception("capitão;O cpf ".$capitao['cpf']." já está cadastrado!");
		    		}
		    	}

		    	foreach ($integrantes as $key => $value) {
		    		foreach ($integrantes as $key2 => $value2) {
		    			if($key != $key2){
		    				if($integrantes[$key]['nick'] == $integrantes[$key2]['nick']){
		    					throw new Exception("jogador ".$integrantes[$key]['nome'].";O nick ".$integrantes[$key]['nick']." já está cadastrado!");
		    				}
		    				if($integrantes[$key]['cpf'] == $integrantes[$key2]['cpf']){
		    					throw new Exception("jogador ".$integrantes[$key]['nome'].";O cpf ".$integrantes[$key]['cpf']." já está cadastrado!");
		    				}

		    			}
		    		}
		    	}		
	    	} catch (Exception $e) {
	    		$inserir = false;
	    		$mensagem = explode(';', $e->getMessage());
	    		//var_dump($mensagem);
	    		php_form('Cadastro do '.$mensagem[0].' duplicado!', $mensagem[1]);
	      	}

	    	// END VERIFICAÇÃO	
    	}
    	if($inserir){
    		// INSERT DADOS
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
	    			$capitao['sigla'] = $time['sigla'];
	    		}
	    		else{
	    			$integrantes[$variante] = $bloco;
	    			$integrantes[$variante]['sigla'] = $time['sigla'];
	    		}
	    	}
	    	
	    	insert($capitao, 'capitaes', $link);
	    	$id_capitao = select('id', 'capitaes', 'cpf', $capitao['cpf'], $link);
	    	
	    	foreach ($integrantes as $num_integrante => $integrante) {
	    		insert($integrante, 'jogadores', $link);
	    		$id_integrantes[$num_integrante] = select('id', 'jogadores', 'cpf', $integrante['cpf'], $link);
	    	}
	    	
	    	$time['id_capitao'] = $id_capitao['id'];

	    	foreach ($id_integrantes as $num_integrante => $integrante) {
	    		//var_dump($id_integrante);echo '<br><br>';
	    		$time['id_'.$num_integrante] = $integrante['id'];
	    	}

	    	insert($time, 'times', $link);

	    	$id_time = select('id', 'times', 'sigla', $time['sigla'], $link);

	    	$update_time = array();
	    	$update_time['posicao'] = $id_time['id'];
	    	$update_time['pago'] = 0;
	    	update($update_time, 'times', 'id', $id_time['id'], $link);
	    	
	    	// END INSERT
	    	// SEND MAIL 

	    	if(intval($id_time['id']) <= 64){
	    		$para = $capitao['login'];
	    		$assunto = 'Campeonato CNE';

	    		$nome_cap = $capitao['nome'];
			    $nome_time = $time['nome'];

			    $mensagem = "Prezado ".$nome_cap.",";
			    $mensagem .= "\n\n";
				$mensagem .= "Seu time ".$nome_time." foi inscrito com sucesso no CNE – Sua inscrição é a de número ".$id_time['id'].". ";
				$mensagem .= "Favor realizar o pagamento da taxa de inscrição através de transferência ou depósito bancário.";
				$mensagem .= "\n\n";

				$mensagem .= "Os dados da conta (Banco do Brasil) são:";
				$mensagem .= "\n\t";
				$mensagem .= "Agência 1668-3";
				$mensagem .= "\n\t";
				$mensagem .= "Conta 40302-4";
				$mensagem .= "\n\t";
				$mensagem .= "Rodrigo Nunes de Castro";
				$mensagem .= "\n\n";

				$mensagem .= "Seu time terá a vaga reservada durante 2 dias úteis. Caso a transferência não seja realizada ";
				$mensagem .= "até o término desse prazo, sua equipe será reposicionada para o final da lista ";
				$mensagem .= "de inscrições, podendo assim ficar de fora do campeonato.";
	        	$mensagem .= "\n\n";
	        
				$mensagem .= "Atenciosamente,";
			    $mensagem .= "\n";
			    $mensagem .= "Equipe OxE";

			    send_mail($para, $assunto, $mensagem);

			    $mensagem_admin = "O time ".$nome_time." foi inscrito no campeonato CNE.";
			    $mensagem_admin .= "\n\n";
			    $mensagem_admin .= "Dados:";
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "ID time: ".$id_time['id'];
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "Nome capitão: ".$nome_cap;
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "Email do capitão: ".$capitao['login'];
			    $mensagem_admin .= "\n\n";
			    $mensagem_admin .= "Atenciosamente,";
			    $mensagem_admin .= "\n";
			    $mensagem_admin .= "Equipe OxE";

			    send_mail('rodrigondec@gmail.com', 'Time '.$nome_time.' inscrito no CNE', $mensagem_admin);
			    //send_mail('darlanbx@gmail.com', $assunto, $mensagem);
			    //send_mail('wanderson.bruno2@gmail.com', $assunto, $mensagem);
			    //send_mail('thyagocmodesto@hotmail.com.br', $assunto, $mensagem);
			    //send_mail('tiagofcap@gmail.com', $assunto, $mensagem);
	    	}
	    	else if(intval($id_time['id']) > 64){
	    		$para = $capitao['login'];
	    		$assunto = 'Campeonato CNE';

	    		$nome_cap = $capitao['nome'];
			    $nome_time = $time['nome'];

			    $mensagem = "Prezado ".$nome_cap.",";
			    $mensagem .= "\n\n";
			    $mensagem .= "Seu time ".$nome_time." foi inscrito com sucesso no CNE – Sua inscrição é a de número ".$id_time['id'].". ";
			    $mensagem .= "Atualmente, todas as 64 vagas estão reservadas e seu time encontra-se na lista de espera.";
			    $mensagem .= "\n\n";
			    
			    $mensagem .= "Sua equipe poderá participar do CNE em 2 casos:";
			    $mensagem .= "\n\n\t";
			    $mensagem .= "1º - Caso algum dos primeiros 64 times inscritos não pague a taxa de inscrição, desista da ";
			    $mensagem .= "inscrição ou esteja com algum tipo de irregularidade comprovada, este será excluído ou recolocado ";
			    $mensagem .= "para o final da lista de inscrições, tendo sua vaga ocupada pelos times da lista de espera.";
			    $mensagem .= "\n\n\t";
			    $mensagem .= "2º - Se a lista de espera alcançar o nº de 64 equipes, iremos abrir as 64 vagas extras e se ";
			    $mensagem .= "esses times realizarem o pagamento da taxa de inscrição no prazo previsto o CNE ocorrerá com 128 times.";
			    $mensagem .= "\n\n";

			    $mensagem .= "Se sua equipe for selecionada para as vagas residuais entraremos em contato com os ";
			    $mensagem .= "dados bancários para a realização do pagamento da taxa de inscrição no prazo previsto.";
			    $mensagem .= "\n\n";

			    $mensagem .= "Atenciosamente,";
			    $mensagem .= "\n";
			    $mensagem .= "Equipe OxE";

			    send_mail($para, $assunto, $mensagem);

			    $mensagem_admin = "O time ".$nome_time." foi inscrito no campeonato CNE.";
			    $mensagem_admin .= "\n\n";
			    $mensagem_admin .= "Dados:";
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "ID time: ".$id_time['id'];
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "Nome capitão: ".$nome_cap;
			    $mensagem_admin .= "\n\t";
			    $mensagem_admin .= "email do capitão: ".$capitao['login'];
			    $mensagem_admin .= "\n\n";
			    $mensagem_admin .= "Atenciosamente,";
			    $mensagem_admin .= "\n";
			    $mensagem_admin .= "Equipe OxE";

			    send_mail('rodrigondec@gmail.com', 'Time '.$nome_time.' inscrito no CNE', $mensagem_admin);
			    //send_mail('darlanbx@gmail.com', $assunto, $mensagem);
			    //send_mail('wanderson.bruno2@gmail.com', $assunto, $mensagem);
			    //send_mail('thyagocmodesto@hotmail.com.br', $assunto, $mensagem);
			    //send_mail('tiagofcap@gmail.com', $assunto, $mensagem);
	    	}
	    	// END SEND MAIL 

	    	swal('', 'Seu time foi inscrito com sucesso!', 'success', '/index.php/login');
    	}
    }
?>