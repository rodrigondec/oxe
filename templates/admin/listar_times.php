<?php 
	// conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);

    $times = select_many('*', 'times', $link_cne);

    //var_dump($times);
?>

<div class='text-center'><h2>Times</h2></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Sigla</th>
			<th>Cidade</th>
			<th>Posição</th>
			<th>Pago</th>
			<th>Id capitão</th>
			<th>Id integrante 2</th>
			<th>Id integrante 3</th>
			<th>Id integrante 4</th>
			<th>Id integrante 5</th>
			<th>Id reserva</th>
			<th>Alterar</th>
			<th>Confirmar</th>
			<th>Invalidar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	    foreach ($times as $key => $value):
	?>
		<tr>
			<td>
				<?php echo $times[$key]['id']; ?>
			</td>
			<td>
				<?php echo $times[$key]['nome']; ?>
			</td>
			<td>
				<?php echo $times[$key]['sigla']; ?>
			</td>
			<td>
				<?php echo $times[$key]['cidade']; ?>
			</td>
			<td>
				<?php echo $times[$key]['posicao']; ?>
			</td>
			<td>
				<?php 
					if($times[$key]['pago'] == '1'){
						echo 'sim';
					}
					else{
						echo 'nao';
					}
					
				?>
			</td>
			<td>
				<?php echo $times[$key]['id_capitao']; ?>
			</td>
			<td>
				<?php echo $times[$key]['id_integrante_2']; ?>
			</td>
			<td>
				<?php echo $times[$key]['id_integrante_3']; ?>
			</td>
			<td>
				<?php echo $times[$key]['id_integrante_4']; ?>
			</td>
			<td>
				<?php echo $times[$key]['id_integrante_5']; ?>
			</td>
			<td>
				<?php echo $times[$key]['id_reserva']; ?>
			</td>
			<td>
				<?php 
					echo "<a class='btn btn-info' href='/oxe/index.php/admin/alterar?type=2&id=".$times[$key]["id"]."'>Alterar</a>";
				?>
			</td>
			<td>
				<?php 
					echo "<a class='btn btn-warning'";
					if($times[$key]['pago'] == '1'){
						echo " disabled";
					}
					echo " href='/oxe/index.php/admin/confirmar?id=".$times[$key]["id"]."'>Confirmar</a>";
				?>
			</td>
			<td>
				<?php 
					echo "<a class='btn btn-danger'";
					if($times[$key]['pago'] == '1'){
						echo " disabled";
					}
					echo " href='/oxe/index.php/admin/invalidar?id=".$times[$key]["id"]."'>Invalidar</a>";
				?>
			</td>
		</tr>
	<?php
	    endforeach;
	?>
	</tbody>
</table>