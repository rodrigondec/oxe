<?php
	/*//AppFog MySQL
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
    $mysql_config = $services_json["mysql-5.1"][0]["credentials"];
	// Configurações do Projeto
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	define('TEMPLATES', ARQUIVOS.'/templates');

	// Configurações do Banco de Dados
	define('DB_NAME', $mysql_config["name"]);
	define('DB_USER', $mysql_config["username"]);
	define('DB_PASS', $mysql_config["password"]);
	define('DB_HOST', $mysql_config["hostname"]);
	define('DB_PORT', $mysql_config["port"]);*/


	//XAMPP
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
	define('DB_HOST', 'localhost'); //Windows


	ob_start(); //Criando Buffer
	session_start();
	date_default_timezone_set('America/Recife');
	include_once('banco.php');
	include_once('functions.php');
	include_once(ARQUIVOS.'/'.BASE.'/estaticos/PHPMailer/PHPMailerAutoload.php');
?>