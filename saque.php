<!DOCTYPE html>

<?php
	include_once("ContaCorrente.php");
	session_start();
 ?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Saque</title>
</head>
<body>
	<h1>Saque</h1>
	<?php
		if(empty($_POST)){
		$id = $_GET['id'];
		$cc = $_SESSION["cc"][$id];
	?>
	<form action="saque.php" method="post">
		Correntista: <?php echo $cc->get_nome(); ?> (<?php echo $cc->get_nro(); ?>)
		<br/>
		Saldo: <?php echo $cc->get_saldo(); ?>
 		<br/>
		<input type="number" name="valor" />
		<input type="hidden" name="id" value="<?php echo $id ?>" />
		<button>SACAR</button>
	</form>
	<?php
		} else {
			$id = $_POST["id"];
			$valor = $_POST["valor"];

			if($_SESSION["cc"][$id]->verificacao($valor)){
				$_SESSION["cc"][$id]->sacar($valor);
				header("location: listar_cc.php");
			
			} else {
				echo "OPERAÇÃO INVÁLIDA: Saldo insuficiente<br/><br/>";
				echo "<a href='listar_cc.php'>Voltar</a>";
			}
			
		}
	?>
</body>
</html>