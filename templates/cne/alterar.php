<?php 
	// conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);
?>

<div class='text-center'><h2>Alterar</h2></div>
<div class='form-boot-20'>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?type='.$_GET['type'].'&id='.$_GET['id']; ?>' method='post'>
	  	<div class='form-group'>

<?php

    if($_GET['type'] == '1'){
    	$time = select('*', 'times', 'id', $_GET['id'], $link_cne);
    	var_dump($time);
?>

<!-- FORMULÁRIO TIME -->

<label for='input_nome_time'>Time</label>
<input type='text' name='nome' class='form-control' id='input_nome_time' placeholder='Nome do time' value='<?php echo $time["nome"]; ?>' required />
<input type='text' name='sigla' class='form-control' placeholder='Sigla do time' maxlength="3" style='margin-top: 10px;' value='<?php echo $time["sigla"]; ?>' required />

<?php
    }
    else if($_GET['type'] == '2'){
    	$capitao = select('*', 'capitaes', 'id', $_GET['id'], $link_cne);
?>

<!-- FORMULÁRIO CAPITAO -->
<label for='input_nome_time'>Capitão</label>
<input type='text' name='nome' class='form-control' id='input_capitao' placeholder='nome' value='<?php echo $capitao["nome"]; ?>' required />
<input type='text' name='login' onblur='lower(this);validar_email(this);' class='form-control' placeholder='email' style='margin-top: 10px;' value='<?php echo $capitao["login"]; ?>' required />
<input type='text' name='nick' class='form-control' placeholder='nick' style='margin-top: 10px;' required value='<?php echo $capitao["nick"]; ?>' />
<div class="input-group">
	<input type='text' name='telefone' onKeypress='mask(this,"telefone");' class='form-control' placeholder='telefone' maxlength='16' style='margin-top: 10px;' required value='<?php echo $capitao["telefone"]; ?>' />
		<span class="input-group-btn">
		<a href="#" class="btn btn-info" onclick="swal('','Digite seu número com o 9º dígito.\nExemplo: (84) 9 9818-4097', 'info');" style='margin-top: 10px;'>?</a>
		</span>
</div>
<input type='text' name='cpf' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $capitao["cpf"]; ?>' required />

<?php
    }
    else if($_GET['type'] == '3'){
    	$jogador = select('*', 'jogadores', 'id', $_GET['id'], $link_cne);
?>

<!-- FORMULÁRIO JOGADOR -->
<label for='input_nome_jogador'>Jogador</label>
<input type='text' name='nome' class='form-control' id='input_nome_jogador' placeholder='Nome do jogador' value='<?php echo $jogador["nome"]; ?>' required />
<input type='text' name='nick' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php echo $jogador["nick"]; ?>' required />
<input type='text' name='cpf' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $jogador["cpf"]; ?>' required />
	  		  	
<?php
    }
?>
    	</div>
	  	<div id='buttons'>
		  	<button type='submit' class='btn btn-default'>Submit</button>
	  	</div>
	</form>
</div>

<?php
    if(count($_POST) > 0){
    	if($_GET['type'] == '1'){
    		$check_time_nome = select('*', 'times', 'nome', $_POST['nome'], $link_cne);
	    	if(isset($check_time_nome['nome'])){
	    		if($check_time_nome['id'] != $time['id']){
	    			echo "<button hidden id='clickButton' onClick='dado_alt(\"time\", \"O nome ".$check_time_nome['nome']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	$check_time_sigla = select('*', 'times', 'sigla', $time['sigla'], $link_cne);
	    	if(isset($check_time_sigla['sigla'])){
	    		if($check_time_sigla['id'] != $time['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"time\", \"A sigla ".$check_time_sigla['sigla']." já está cadastrada!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	update($_POST, 'times', 'id', $time['id'], $link_cne);
	    	$time_sigla['sigla_time'] = $_POST['sigla'];
	    	update($time_sigla, 'capitaes', 'id', $time['id_capitao'], $link_cne);

	    	echo "<button hidden id='clickButton' onclick='success_alt();'>teste</button>
			<script type='text/javascript'>
				window.onload = function(){
					document.getElementById('clickButton').click();
				}
			</script>";
    	}
    	else if($_GET['type'] == '2'){
    		$check_capitao_login = select('*', 'capitaes', 'login', $_POST['login'], $link_cne);
			if(isset($check_capitao_login['login'])){
				if($check_capitao_login['id'] != $capitao['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"capitão\", \"O email ".$check_capitao_login['login']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	$check_capitao_nick = select('*', 'capitaes', 'nick', $_POST['nick'], $link_cne);
	    	if(isset($check_capitao_nick['nick'])){
	    		if($check_capitao_nick['id'] != $capitao['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"capitão\", \"O nick ".$check_capitao_nick['nick']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	$check_capitao_cpf = select('*', 'capitaes', 'cpf', $_POST['cpf'], $link_cne);
	    	if(isset($check_capitao_cpf['cpf'])){
	    		if($check_capitao_cpf['id'] != $capitao['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"capitão\", \"O cpf ".$check_capitao_cpf['cpf']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	update($_POST, 'capitaes', 'id', $capitao['id'], $link_cne);

	    	echo "<button hidden id='clickButton' onclick='success_alt();'>teste</button>
			<script type='text/javascript'>
				window.onload = function(){
					document.getElementById('clickButton').click();
				}
			</script>";
    	}
    	else if($_GET['type'] == '3'){
    		$check_jogador_nick = select('*', 'jogadores', 'nick', $_POST['nick'], $link_cne);
	    	if(isset($check_jogador_nick['nick'])){
	    		if($check_jogador_nick['id'] != $jogador['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"jogador\", \"O nick ".$check_jogador_nick['nick']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	$check_jogador_cpf = select('*', 'jogadores', 'cpf', $_POST['cpf'], $link_cne);
	    	if(isset($check_jogador_cpf['cpf'])){
	    		if($check_jogador_cpf['id'] != $jogador['id']){
		    		echo "<button hidden id='clickButton' onClick='dado_alt(\"jogador\", \"O cpf ".$check_jogador_cpf['cpf']." já está cadastrado!\");'>teste</button>
		    		<script type='text/javascript'>
		    			window.onload = function(){
		    				document.getElementById('clickButton').click();
		    			}
	    			</script>";
	    		}
	    	}

	    	update($_POST, 'jogadores', 'id', $jogador['id'], $link_cne);

	    	echo "<button hidden id='clickButton' onclick='success_alt();'>teste</button>
			<script type='text/javascript'>
				window.onload = function(){
					document.getElementById('clickButton').click();
				}
			</script>";
    	}
    }
?>