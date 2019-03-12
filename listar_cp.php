-<?php

	include("ContaPoupanca.php");
	session_start();
	
?>

<meta charset="utf-8">
<table border='1'>
	<tr>
		<th>Nro Conta</th>
		<th>Nome</th>
		<th>Data Abertura</th>
		<th>Saldo</th>
		<th>Taxa Rendimento</th>
		<th>Ação</th>

	</tr>
	
	<?php
		foreach($_SESSION["cp"] as $i=>$c){
			$c->exibe_dadosCP($i);
		}
	?>
	
</table>

<a href="cadastro.php">Voltar para cadastro</a>