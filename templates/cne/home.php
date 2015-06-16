<div class='text-center centered-20'>
<img style='width: 35%;margin-bottom:4%;' src="/oxe/estaticos/source/imgs/cne_orig.png">
	<p class="text-justify ident">
		O primeiro Campeonato de League of Legends organizado pela OxE é o Campeonato Nordeste – CNE e será uma 
		competição a nível Nordeste. Sua primeira edição será online e contará com até 64 equipes* que contenham pelo 
		menos 3 membros comprovadamente nordestinos em cada partida, ou seja, poderá ser jogado por times com membros 
		residindo em qualquer lugar do mundo, desde que atenda a exigência de 3 jogadores nascidos na região nordeste 
		(tolerância igual a de campeonatos oficiais organizados pela Riot Games, empresa criadora do jogo). Isso aumentará 
		a competitividade do evento e dará uma visibilidade imensamente superior que a de um campeonato que se restringisse 
		exclusivamente a uma única região.
		<strong>Para se inscrever no campeonato CNE, basta aceitar as regras demostradas abaixo.</strong>
		<p>Caso não consiga ver as regras a baixo, clicke no link ao lado <a href="/oxe/estaticos/source/docs/cne_regras_in.pdf" target="_blank"><strong><u>Regras</u></strong></a></p>
	</p>
	<div class='regras'>
		<h3>Regras</h3>	 
		<embed src="/oxe/estaticos/source/docs/cne_regras_in.pdf">
		<div>
		<?php 
		    if(!isset($_SESSION['privilegio'])):
		?>
			<form method='post'>
				<br />
				<div align='left'>
					<input id='check_input' type='checkbox' name='accept' value='true' required />
					<strong>Eu li e concordo com as regras do CNE</strong>
				</div>
				<br />
				<button class='btn' type='button' onclick="sa('', 'É necessário aceitar as regras do CNE para se inscrever!', '', '');">Recuso!</button>
				<button class='btn btn-info' type'submit' onclick="accept_regras();">Aceito!</button>
			</form>
			<?php 
			    endif;
			?>
		</div>
	</div>
</div>
<?php  
	if(count($_POST) > 0) {
		ob_clean();
		header('LOCATION: /oxe/index.php/cne/inscricao');
	}
    
?>