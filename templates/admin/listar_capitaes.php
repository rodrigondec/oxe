<?php 
	// conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);

    $capitaes = select_many('*', 'capitaes', $link_cne);

    //var_dump($capitaes);
?>

<div class='text-center'><h2>Capitães</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Sigla time</th>
			<th>Email</th>
			<th>Nick</th>
			<th>Telefone</th>
			<th>CPF</th>
			<th>Alterar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($capitaes as $key => $value) {
	?>
		<tr>
			<td>
				<?php echo $capitaes[$key]['id']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['sigla_time']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['login']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['nick']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['telefone']; ?>
			</td>
			<td>
				<?php echo $capitaes[$key]['cpf']; ?>
			</td>
			<td>
				<?php 
					echo "<a class='btn btn-info' href='/oxe/index.php/admin/alterar?type=2&id=".$capitaes[$key]["id"]."'>Alterar</a>";
				?>
			</td>
		</tr>
	<?php
	    }
	?>
	</tbody>
</table>