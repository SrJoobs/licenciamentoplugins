<?php
/*
	Sistema de licenciamento
	
Desenvolvido por Joobs; @JoobsGets

Você pode copiar o que eu faço, mas não o que eu sei. 
Não retire os créditos cabaço.
*/

$message = '';
if(empty($_GET['key'])){
	$message = 'Chave de administrador inválida! 1';
}

if($_GET['key'] !== "123321"){
	$message = 'Chave de administrador inválida! 2';
}


require 'database.php';

if(!empty($_GET['address']) && !empty($_GET['plugin'])){
	$sql = "INSERT INTO `clientes_dados` (`address`, `plugin`) VALUES (:address, :plugin)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':address', $_GET['address']);
	$stmt->bindParam(':plugin',$_GET['plugin']);

	if( $stmt->execute()):
		$message = "Você cadastrou um novo cliente! <br> IP:" .$_GET['address']. "<br>". $_GET['plugin'];
	else:
		$message = 'Não foi possível cadastrar um novo cliente';
	endif;
}

echo $message;
?>