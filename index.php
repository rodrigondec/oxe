<?php include_once('controle/rotas.php'); ?>
<html>
    <head>
    	<meta charset="UTF-8">
            <!--<link rel="stylesheet" type="text/css" href="/estaticos/estilo.css">-->
            <!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

			<!-- Optional theme -->
			<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> -->
        <title>OxE</title>
    </head>
    <body>
        <?php  
            include_once(TEMPLATES.'/geral/menu.php');
        	include_conteudo(); //mostrar o template incluído
        ?>
        
    </body>
	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="/controle/functions.js"></script>-->
    <script type="text/javascript" src="/oxe/controle/functions.js"></script>
</html>