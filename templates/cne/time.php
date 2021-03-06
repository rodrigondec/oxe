<?php 
	// conexão com banco database cne
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME, $link);

    $capitao = select('*', 'capitaes', 'login', $_SESSION['login'], $link);
    $time = select('*', 'times', 'sigla', $capitao['sigla'], $link);

    $integrantes['integrante_2'] = select('*', 'jogadores', 'id', $time['id_integrante_2'], $link);
    $integrantes['integrante_3'] = select('*', 'jogadores', 'id', $time['id_integrante_3'], $link);
    $integrantes['integrante_4'] = select('*', 'jogadores', 'id', $time['id_integrante_4'], $link);
    $integrantes['integrante_5'] = select('*', 'jogadores', 'id', $time['id_integrante_5'], $link);
    $integrantes['reserva'] = select('*', 'jogadores', 'id', $time['id_reserva'], $link);

    if(!$integrantes['reserva']){
    	unset($integrantes['reserva']);
    }

?>
<div class='text-center header-3'><h2>Time</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
			<th>Posição</th>
			<th>Pagamento</th>
			<th>Alterar</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?php echo $time['nome']; ?>
			</td>
			<td>
				<?php echo $time['sigla']; ?>
			</td>
			<td>
				<?php 
				    echo $time['posicao'];
				?>
			</td>
			<td>
				<?php 
					if($time['pago'] == '1'){
						echo 'Realizado!';
					}
					else{
						echo 'Não realizado!';
					}
				?>
			</td>
			<td>
				<?php 
				    echo "<a class='btn btn-info' href='/index.php/cne/alterar?type=1&id=".$time["id"]."'>";
				?>
					Alterar
				</a>
			</td>
		</tr>
	</tbody>
</table>

<div class='text-center header-3'><h2>Capitão</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Nick</th>
			<th>Cidade</th>
			<th>Telefone</th>
			<th>CPF</th>
			<th>Alterar</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?php echo $capitao['nome']; ?>
			</td>
			<td>
				<?php echo $capitao['login']; ?>
			</td>
			<td>
				<?php echo $capitao['nick']; ?>
			</td>
			<td>
				<?php echo $capitao['cidade']; ?>
			</td>
			<td>
				<?php echo $capitao['telefone']; ?>
			</td>
			<td>
				<?php echo $capitao['cpf']; ?>
			</td>
			<td>
				<?php 
				    echo "<a class='btn btn-info' href='/index.php/cne/alterar?type=2&id=".$capitao["id"]."'>Alterar</a>";
				?>
			</td>
		</tr>
	</tbody>
</table>

<div class='text-center header-3'>
	<h2>
		Jogadores
	<?php 
		if(!isset($integrantes['reserva'])):
	?>
		<a class='btn btn-info' href="/index.php/cne/add_reserva">Cadastrar reserva</a>
	<?php		
		elseif(isset($integrantes['reserva'])):
	?>
		<a class='btn btn-danger' href="/index.php/cne/remove_reserva">Remover reserva</a>
	<?php
		endif;
	?>
	</h2>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Nick</th>
			<th>Cidade</th>
			<th>CPF</th>
			<th>Alterar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($integrantes as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $integrantes[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $integrantes[$key]['nick']; ?>
			</td>
			<td>
				<?php echo $integrantes[$key]['cidade']; ?>
			</td>
			<td>
				<?php echo $integrantes[$key]['cpf']; ?>
			</td>
			<td>
				<?php 
				    echo "<a class='btn btn-info' href='/index.php/cne/alterar?type=3&id=".$integrantes[$key]["id"]."'>";
				?>
					Alterar
				</a>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>

