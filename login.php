<?php 
    // conexão com banco database oxe
    $link_oxe = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    if (!$link_oxe) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_OXE, $link_oxe);

    // conexão com banco database cne
    $link_cne = mysql_connect(DB_HOST, DB_USER, DB_PASS, true);
    if (!$link_cne) {
        die('Erro de conexão com o banco de dados: '.mysql_error());
    } else if (isset($debug)) {
        echo '<p>Conectado ao banco com sucesso</p>';
    }
    mysql_select_db(DB_NAME_CNE, $link_cne);
?>
<div align='center' style='margin-top:5%; margin-bottom:2%;'>
	<h2>Login</h2>
</div>
<div class='form-boot-40'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
			<div class='form-group'>
			<input type='text' name='login' class='form-control' id='input_login' placeholder='Login' required />
			<input type='password' name='senha' class='form-control' id='input_senha' placeholder='Senha' style='margin-top: 10px;' required />
			</div>
			<div id='buttons'>
				<button type='submit' class='btn btn-default'>Submit</button>
			</div>
		</form>
	</div>

<?php 
	if (count($_POST) > 0){
		$usuario = select('*', 'admins', 'login', $_POST['login'], $link_oxe);
		if($usuario && $usuario['senha'] == md5($_POST['senha'])){
			$_SESSION['login'] = $usuario['login'];
			$_SESSION['privilegio'] = 'admin';
			ob_clean();
			header('LOCATION: /oxe/');
		}
		else{
			$usuario = select('*', 'capitaes', 'login', $_POST['login'], $link_cne);
			if($usuario && $usuario['senha'] == md5($_POST['senha'])){
				$_SESSION['login'] = $usuario['login'];
				$_SESSION['privilegio'] = 'capitao';
				ob_clean();
				header('LOCATION: /oxe/');
			}
			else{
				echo 'login errado';
			}
		}
	}
?>