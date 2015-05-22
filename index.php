<?php include_once('controle/rotas.php'); ?>
<html>
    <head>
    	<meta charset="UTF-8">
            <link rel="icon" href="/oxe/estaticos/imgs/logo.png">

            <!--<link rel="stylesheet" type="text/css" href="/estaticos/estilo.css">-->
            <!-- Latest compiled and minified CSS -->
			<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->

            <!-- MELHORES TEMAS -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/sandstone/bootstrap.min.css"> -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/slate/bootstrap.min.css">

            <!-- OUTROS -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cyborg/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/simplex/bootstrap.min.css"> -->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css"> -->
            
            

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="/controle/functions.js"></script>-->
    <script type="text/javascript" src="/oxe/controle/functions.js"></script>
</html>