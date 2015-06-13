<?php
	//AppFog MySQL
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
    $mysql_config_oxe = $services_json["mysql-5.1"][0]["credentials"];
	// Configurações do Projeto
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	define('TEMPLATES', ARQUIVOS.'/templates');
	define('LOGIN', ARQUIVOS.'/login.php');
	define('CONFIGS', ARQUIVOS.'/configs/index.php');
	define('PHPMYADMIN', ARQUIVOS.'/admin/index.php');

	// Configurações do Banco de Dados OxE
	define('DB_NAME_OXE', $mysql_config_oxe["name"]);
	define('DB_USER_OXE', $mysql_config_oxe["username"]);
	define('DB_PASS_OXE', $mysql_config_oxe["password"]);
	define('DB_HOST_OXE', $mysql_config_oxe["hostname"]);
	define('DB_PORT_OXE', $mysql_config_oxe["port"]);

	$mysql_config_cne = $services_json["mysql-5.1"][1]["credentials"];

	// Configurações do Banco de Dados CNE
	define('DB_NAME_CNE', $mysql_config_cne["name"]);
	define('DB_USER_CNE', $mysql_config_cne["username"]);
	define('DB_PASS_CNE', $mysql_config_cne["password"]);
	define('DB_HOST_CNE', $mysql_config_cne["hostname"]);
	define('DB_PORT_CNE', $mysql_config_cne["port"]);


	/*//XAMPP
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	define('BASE', 'OxE');
	define('TEMPLATES', ARQUIVOS.'/'.BASE.'/templates/');
	define('LOGIN', ARQUIVOS.'/'.BASE.'/login.php');
	define('CONFIGS', ARQUIVOS.'/'.BASE.'/configs/index.php');
	define('PHPMYADMIN', ARQUIVOS.'/'.BASE.'/admin/index.php');
	
	define('DB_NAME_OXE', 'oxe');
	define('DB_NAME_CNE', 'cne');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_HOST', 'localhost'); //Windows*/


	ob_start(); //Criando Buffer
	session_start();
	date_default_timezone_set('America/Recife');
	include_once('banco.php');
	include_once('functions.php');
	include_once(ARQUIVOS.'/'.BASE.'/estaticos/PHPMailer/PHPMailerAutoload.php');
?>