<?php include_once('controle/globais.php') ?>
<html>
	<head>
    	<meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="/estaticos/bootstrap/css/bootstrap.css">
        <title>OxE</title>
    </head>
    <body>
    	
    	<div >
			<h2>OxE</h2>
			<div style='height:20px'></div>
			<form class='navbar-form' action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
				<table style='text-align:right'>
					<tr>
						<td>Login:&nbsp;</td>
						<td><input class='span2' name='login' required/></td>
					</tr>
					<tr>
						<td>Senha:&nbsp;</td>
						<td><input class='span2' name='senha' type='password' required/></td>
					</tr>
					<tr>
						<td></td>
						<td style='text-align:left'><button class='btn btn-default' type='submit'>Entrar</button></td>
					</tr>
				</table>
			</form>
		</div>
		<?php 
			if (count($_POST) > 0){
				$sql='SELECT * FROM users WHERE login =\''.$_POST['login'].'\';';
				$resultado=mysql_query($sql);
				$usuario=mysql_fetch_assoc($resultado);

				if ($usuario && $usuario['senha'] == md5($_POST['senha'])) {
					$_SESSION['login'] = $usuario['login'];
					$_SESSION['sistema'] = $usuario['sistema'];
					ob_clean();
					header('LOCATION: /');
				}
				else {
					ob_clean();
					header('LOCATION: /login.php/');
				}
			}
		?>
    </body>
</html>