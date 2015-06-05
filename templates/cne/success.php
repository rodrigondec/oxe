<?php 
    include_once(TEMPLATES.'cne/home.php');
?>
<button hidden id='clickButton' onclick="success();">teste</button>
<script type="text/javascript">
	window.onload = function(){
		document.getElementById('clickButton').click();
	}
</script>