<html>
	<head>
    	<meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="/estaticos/bootstrap/css/bootstrap.css">
        <title>Info</title>
    </head>
    <body>
    	<div align='center'>
	    	<div style='height:70px'></div>
			<h2>Info</h2>
			<div style='height:20px'></div>
			<form class='navbar-form' action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
				<table style='text-align:right'>
					<tr>
						<td>Login:&nbsp;</td>
						<td><input class='span2' name='login' required/></td>
					</tr>
					<tr>
						<td>Senha:&nbsp;</td>
						<td><input class='span2' name='password' type='password' required/></td>
					</tr>
					<tr>
						<td></td>
						<td style='text-align:left'><button class='btn btn-default' type='submit'>Entrar</button></td>
					</tr>
				</table>
			</form>
		</div>

<?php
	if(count($_POST) > 0){
		if(md5($_POST['login']) == 'caf9b6b99962bf5c2264824231d7a40c' && md5($_POST['password']) == 'caf9b6b99962bf5c2264824231d7a40c'){
			echo '<br>';
			echo md5('info');

			$services_json = json_decode(getenv("VCAP_SERVICES"),true);
			$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

			$config['username'] = $mysql_config["username"];
			$config['password'] = $mysql_config["password"];
			$config['hostname'] = $mysql_config["hostname"];
			$config['port'] = $mysql_config["port"];
			$config['name'] = $mysql_config["name"];
			
			echo '<br><br>';
			var_dump($config);
		}
		else{
			echo 'try again!';
		}
	}
?>
	</body>
</html>