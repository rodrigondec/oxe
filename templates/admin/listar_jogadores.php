<?php 
	// conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);

    $jogadores = select_many('*', 'jogadores', $link_cne);

    //var_dump($jogadores);
?>

<div class='text-center'><h2>Jogadores</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Sigla time</th>
			<th>Nick</th>
			<th>CPF</th>
			<th>Cidade</th>
			<th>Alterar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($jogadores as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $jogadores[$key]['id']; ?>
			</td>
			<td>
				<?php echo $jogadores[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $jogadores[$key]['sigla']; ?>
			</td>
			<td>
				<?php echo $jogadores[$key]['nick']; ?>
			</td>
			<td>
				<?php echo $jogadores[$key]['cpf']; ?>
			</td>
			<td>
				<?php echo $jogadores[$key]['cidade']; ?>
			</td>
			<td>
				<?php 
					echo "<a class='btn btn-info' href='/oxe/index.php/admin/alterar?type=3&id=".$jogadores[$key]["id"]."'>Alterar</a>";
				?>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>