<?php
session_start();
$friendlinessList = array(	
	1 => 'Pas sympa',
	2 => 'Assez ympa',
	3 => 'Sympa',
	4 => 'Très sympa',
	5 => 'Génial',
);
//---------------PDO
// définition DSN
$dsn = 'mysql:dbname=wf3;host=localhost;charset=UTF8';
$user = 'root';
$password = 'ahrach';

// Instanciation de PDO
try {
	$pdo = new PDO($dsn, $user, $password);
}
catch (Exception $e) {
	echo $e->getMessage();
}

// -------------function securisation---------------
function securisation($data){
	$data= isset($data) ? htmlspecialchars(strip_tags(trim($data))) : '';
	$data = stripslashes($data);
	return $data;
}


function getSympathieText($data){
	if ($data = 1) {
		$data = 'Pas sympa';
	}elseif ($data = 2) {
		$data = 'Assez ympa';
	}elseif ($data = 3) {
		$data = 'Sympa';
	}elseif ($data = 4) {
		$data = 'Très sympa';
	}elseif ($data = 5) {
		$data = 'Génial';
	}

	return $data;
}













?>