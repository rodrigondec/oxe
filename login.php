<?php include_once('controle/globais.php') ?>
<html>
	<meta charset="UTF-8">
            <link rel="icon" href="/oxe/estaticos/source/imgs/oxe.png">

            <link rel="stylesheet" type="text/css" href="/oxe/estaticos/estilo.css">
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
            
        <title>OxE</title>
    </head>
    <body>

    	<div class='wrapper'>
            <div class='header'>
        <?php  
            include_once(TEMPLATES.'/geral/menu.php');
        ?>
            </div>
            <div class='content'>
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
        	</div>
            <div class='footer'>
        <?php  
            include_once(TEMPLATES.'/geral/footer.php');
        ?>
            </div>
        <?php
            //include_once(TEMPLATES.'/oxe/preview.php');
        ?>
        </div>



    	
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="/controle/functions.js"></script>-->
    <script type="text/javascript" src="/oxe/controle/functions.js"></script>
</html>