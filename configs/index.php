<?php
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config_oxe = $services_json["mysql-5.1"][0]["credentials"];
	echo 'OXE:<br>';
	$config['username'] = $mysql_config_oxe["username"];
	$config['password'] = $mysql_config_oxe["password"];
	$config['hostname'] = $mysql_config_oxe["hostname"];
	$config['port'] = $mysql_config_oxe["port"];
	$config['name'] = $mysql_config_oxe["name"];
	
	echo '<br>';
	var_dump($config);

	echo '<br><br>';
	$mysql_config_cne = $services_json["mysql-5.1"][1]["credentials"];
	echo 'CNE:<br>';
	$config['username'] = $mysql_config_cne["username"];
	$config['password'] = $mysql_config_cne["password"];
	$config['hostname'] = $mysql_config_cne["hostname"];
	$config['port'] = $mysql_config_cne["port"];
	$config['name'] = $mysql_config_cne["name"];
	
	echo '<br>';
	var_dump($config);
?>