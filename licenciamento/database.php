<?php
/**
	Sistema de licenciamento
	
Desenvolvido por Joobs; @JoobsGets

Você pode copiar o que eu faço, mas não o que eu sei. 
Não retire os créditos cabaço.

Dados da tabela:
CREATE TABLE clientes_dados (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, address VARCHAR(20), plugin VARCHAR(20), iniciou CURRENT_TIMESTAMP);
**/
$server = 'localhost';
$username = 'root';
$password = 'Connect54!';
$database = 'BootingDB';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8;", $username, $password);
} catch(PDOException $e){
	echo json_encode(array('status'=> 'error', 'message'=> 'Servidor off-line '. $e->getMessage()));
}
?>