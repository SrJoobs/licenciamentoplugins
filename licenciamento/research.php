<?php
/*
	Sistema de licenciamento
	
Desenvolvido por Joobs; @JoobsGets

Você pode copiar o que eu faço, mas não o que eu sei. 
Não retire os créditos cabaço.
*/

if(empty($_GET['address'])){
	echo json_encode(array('status'=> 'error', 'message'=> 'O endereço de IP informado não é válido'));
	die();
}
if(empty($_GET['plugin'])){
	echo json_encode(array('status'=> 'error', 'message'=> 'O serviço informado não é válido'));
	die();
}
require 'database.php';

$address= $_GET['address'];
$plugin= $_GET['plugin'];

$records = $conn->prepare('SELECT * FROM `clientes_dados` WHERE address = :address');
$records->bindParam(':address', $address);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

if(empty($results)):
	echo json_encode(array('status'=> 'denied', 'message'=> 'Você NÃO está na lista de clientes.'));
	die();
else:
	if($results['plugin'] === $plugin):
		echo json_encode(array('status'=> 'authorized', 'message'=> 'Você está na lista de clientes.'));
		die();
	else:
		echo json_encode(array('status'=> 'denied', 'message'=> 'Você NÃO está na lista de clientes.'));
		die();
	endif;
endif;

?>