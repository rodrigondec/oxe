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
<input type='text' name='time[nome]' class='form-control' id='input_nome_time' placeholder='Nome do time' value='<?php echo $time["nome"]; ?>' required />
<input type='text' name='time[sigla]' class='form-control' placeholder='Sigla do time' maxlength="3" style='margin-top: 10px;' value='<?php echo $time["sigla"]; ?>' required />

<?php
    }
    else if($_GET['type'] == '2'){
    	$capitao = select('*', 'capitaes', 'id', $_GET['id'], $link_cne);
?>

<!-- FORMULÁRIO CAPITAO -->
<label for='input_nome_time'>Capitão</label>
<input type='text' name='capitao[nome]' class='form-control' id='input_capitao' placeholder='nome' value='<?php echo $capitao["nome"]; ?>' required />
<input type='text' name='capitao[login]' onblur='lower(this);validar_email(this);' class='form-control' placeholder='email' style='margin-top: 10px;' value='<?php echo $capitao["login"]; ?>' required />
<input type='text' name='capitao[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' required value='<?php echo $capitao["nick"]; ?>' />
<div class="input-group">
	<input type='text' name='capitao[telefone]' onKeypress='mask(this,"telefone");' class='form-control' placeholder='telefone' maxlength='16' style='margin-top: 10px;' required value='<?php echo $capitao["telefone"]; ?>' />
		<span class="input-group-btn">
		<a href="#" class="btn btn-info" onclick="swal('','Digite seu número com o 9º dígito.\nExemplo: (84) 9 9818-4097', 'info');" style='margin-top: 10px;'>?</a>
		</span>
</div>
<input type='text' name='capitao[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $capitao["cpf"]; ?>' required />

<?php
    }
    else if($_GET['type'] == '3'){
    	$jogador = select('*', 'jogadores', 'id', $_GET['id'], $link_cne);
?>

<!-- FORMULÁRIO JOGADOR -->
<label for='input_nome_jogador'>Jogador</label>
<input type='text' name='jogador[nome]' class='form-control' id='input_nome_jogador' placeholder='Nome do jogador' value='<?php echo $jogador["nome"]; ?>' required />
<input type='text' name='jogador[nick]' class='form-control' placeholder='nick' style='margin-top: 10px;' value='<?php echo $jogador["nick"]; ?>' required />
<input type='text' name='jogador[cpf]' onKeypress='mask(this,"cpf");' class='form-control' placeholder='CPF' maxlength='14' style='margin-top: 10px;' value='<?php echo $jogador["cpf"]; ?>' required />
	  		  	
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
    	var_dump($_POST);
    }
?>