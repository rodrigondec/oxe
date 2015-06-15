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
	<form id='myForm' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	  	<div class='form-group'>
			<label for='input_nome_reserva'>Reserva</label>
			<input type='text' name='nome' class='form-control' id='input_nome_reserva' placeholder='Nome do reserva' value='<?php  if(count($_POST) > 0){echo $_POST["nome"];} ?>' required />
			<input type='text' name='nick' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php  if(count($_POST) > 0){echo $_POST["nick"];} ?>' required />
			<input type='text' name='cpf' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php  if(count($_POST) > 0){echo $_POST["cpf"];} ?>' required />
		</div>
	  	<div id='buttons'>
		  	<button type='submit' class='btn btn-default'>Submit</button>
	  	</div>
	</form>
</div>
<?php 
    if(count($_POST) > 0 && !isset($_GET['rt'])){
    	$inserir = true;
    	
    	try {
    		$check_reserva_nick = select('nick', 'jogadores', 'nick', $_POST['nick'], $link);
			if(!$check_reserva_nick['nick']){
	    		$check_reserva_nick = select('nick', 'capitaes', 'nick', $_POST['nick'], $link);
	    	}
	    	if(isset($check_reserva_nick['nick'])){
	    		throw new Exception("O nick ".$check_reserva_nick['nick']." já está cadastrado!");
	    	}
	    	$check_reserva_cpf = select('cpf', 'jogadores', 'cpf', $_POST['cpf'], $link);
    		if(!$check_reserva_cpf['cpf']){
	    		$check_reserva_cpf = select('cpf', 'capitaes', 'cpf', $_POST['cpf'], $link);
	    	}
    		if(isset($check_reserva_cpf['cpf'])){
    			throw new Exception("O cpf ".$check_reserva_cpf['cpf']." já está cadastrado!");
	    	}
    	} catch (Exception $e) {
    		$inserir = false;
			$mensagem = $e->getMessage();
			php_form('Dado Duplicado', $mensagem);
    	}

    	if($inserir){
    		$_POST['sigla'] = $_SESSION['time'];
    		insert($_POST, 'jogadores', $link);
    		$id = select('id', 'jogadores', 'cpf', $_POST['cpf'], $link);
    		$id_reserva['id_reserva'] = $id['id'];
    		update($id_reserva, 'times', 'sigla', $_SESSION['time'], $link);
    		swal('', 'Reserva adicionado com sucesso!', 'success', '/index.php/cne/time');
    	}
    }
?>