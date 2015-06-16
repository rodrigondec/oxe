<?php 
	// conexão com banco database cne
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME, $link);

    $time = select('*', 'times', 'sigla', $_SESSION['time'], $link);

    delete($time['id_reserva'], 'jogadores', $link);
    swal('', 'Reserva removido com sucesso!', 'success', '/oxe/index.php/cne/time');
?>