<!DOCTYPE html>

<?php
	include_once("ContaCorrente.php");
	session_start();
 ?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Depósito</title>
</head>
<body>
	<h1>Depósito</h1>
	<?php
		if(empty($_POST)){
		$id = $_GET['id'];
		$cc = $_SESSION["cc"][$id];
	?>
	<form action="deposito.php" method="post">
		Correntista: <?php echo $cc->get_nome(); ?> (<?php echo $cc->get_nro(); ?>)
		<br/>
		Saldo: <?php echo $cc->get_saldo(); ?>
 		<br/>
		<input type="number" name="valor" />
		<input type="hidden" name="id" value="<?php echo $id ?>" />
		<button>DEPOSITAR</button>
	</form>
	<?php
		} else {
			$id = $_POST["id"];
			$valor = $_POST["valor"];
			$_SESSION["cc"][$id]->depositar($valor);
			
			header("location: listar_cc.php");
			}
	?>
</body>
</html>