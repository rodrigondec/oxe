<?php include_once('controle/rotas.php'); ?>
<html>
    <head>
    	<meta charset="UTF-8">
            <meta property="og:image" content="http://organization.aws.af.cm/estaticos/source/imgs/oxe_in_fb.png" />
            <meta property="og:title" content="OxE" />
            <meta property="og:description" content="Organization & Sports" />
            <meta property="og:url" content="http://organization.aws.af.cm/" />
            <link rel="icon" href="/estaticos/source/imgs/oxe.png">

            <link rel="stylesheet" href="/estaticos/estilo.css">
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

            <link rel="stylesheet" href="/estaticos/bootstrap-sweetalert/lib/sweet-alert.css">
            
        <title>OxE</title>
    </head>
    <body>
        <!-- <div class='wrapper'>
            <div class='header'>
        <?php  
            //include_once(TEMPLATES.'/geral/menu.php');
        ?>
            </div>
            <div class='content'> -->
        <?php  
            include_conteudo(); //mostrar o template incluído
        ?>
        	<!-- </div>
            <div class='footer'>
        <?php  
            //include_once(TEMPLATES.'/geral/footer.php');
        ?>
            </div>
        <?php
            //include_once(TEMPLATES.'/oxe/preview.php');
        ?>
        </div> -->
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="/estaticos/functions.js"></script>-->
    <script src="/controle/functions.js"></script>
    <script src="/estaticos/bootstrap-sweetalert/lib/sweet-alert.min.js"></script> 
</html>