<div class='text-center centered-20'>
<img style='width: 35%;margin-bottom:4%;' src="/oxe/estaticos/source/imgs/cne_orig.png">

	<!-- <div>
		<h1 style='font-family:fireye; color:#005C83;'><b>CNE</b></h1>
	</div> -->
	<p class="text-justify ident">
		O primeiro Campeonato de League of Legends organizado pela OxE é o Campeonato do Nordeste – CNE e será uma 
		competição a nível Nordeste. Sua primeira edição será online e contará com até 64 equipes* que contenham pelo 
		menos 3 membros comprovadamente nordestinos em cada partida, ou seja, poderá ser jogado por times com membros 
		residindo em qualquer lugar do mundo, desde que atenda a exigência de 3 jogadores nascidos na região nordeste 
		(tolerância igual a de campeonatos oficiais organizados pela Riot Games, empresa criadora do jogo). Isso aumentará 
		a competitividade do evento e dará uma visibilidade imensamente superior que a de um campeonato que se restringisse 
		exclusivamente a uma única região.
		Suas partidas serão exibidas na página www.twitch.tv/oxetv.
	</p>
	<div style="background-color:white">
		<h3 style='color: black'>Regras</h3>	 
		<embed style="border:2px solid gray" src="/oxe/estaticos/source/docs/cne_regras.pdf" width='100%;' height='300px;'>
		<div>
			<form>
				<br />
				<div align='left' style='margin-left:2%;color:black'>
					<input type='checkbox' name='accept' required />Eu li e concordo com as regras do CNE.
				</div>
				<br /><button class='btn'>Recuso!</button>
				<button class='btn btn-info' type'submit'>Aceito!</button>
			</form>
			
		</div>
		
	</div>
</div>
<?php  
    if(!isset($_SESSION['privilegio'])){
?>
	<a href="/oxe/index.php/cne/inscricao">CNE</a>!@#$"
<?php

    }
?>

