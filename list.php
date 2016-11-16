<?php

$citiesList = array(
	1 => 'Esch-sur-Alzette',
	2 => 'Verdun',
	3 => 'Luxembourg',
	4 => 'Metz',
	5 => 'Differdange',
	6 => 'Rosport',
	7 => 'Bascharage',
	8 => 'Clervaux',
	10 => 'Strasbourg',
	11 => 'Nancy',
	18 => 'Thionville',
);
$countriesList = array(
	1 => 'Luxembourg',
	2 => 'France',
	3 => 'Belgique',
	4 => 'Chine',
	5 => 'Bangladesh',
	7 => 'Malaisie',
);
$friendlinessList = array(	
	1 => 'Pas sympa',
	2 => 'Assez ympa',
	3 => 'Sympa',
	4 => 'Très sympa',
	5 => 'Génial',
);
$limit = array(
	1 => '5',
	2 => '10',
	3 => '20',
	4 => '50',
	);


// ---- load config file ----
require'inc/config.php';

$sql= 'SELECT stu_id, stu_lname, stu_fname, cou_name, cit_name, stu_friendliness, stu_email, stu_age, training_tra_id
		FROM student
		INNER JOIN city
		ON student.city_cit_id = city.cit_id
		INNER JOIN Country
		ON city.country_cou_id = country.cou_id
		INNER JOIN training
		ON student.training_tra_id = training.tra_id
		';

//Gestion Search 
//je récupère le mot recherché
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
//var_dump($search);
if (!empty($search)) {
	$sql .= '  WHERE stu_lname like :search OR stu_fname like :search OR stu_email like :search OR cit_name like :search OR cou_name like :search OR stu_age like :search';

}

$session = isset($_GET['session']) ? intval($_GET['session']) : 0;
if (!empty($session)) {
	$sql .= ' WHERE tra_id = :id';
}


//gestion de pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limitA = isset($_GET['limit']) ? intval($_GET['limit']) : '50';
$offset = ($page-1)*$limitA;
$sql .=  " LIMIT $offset, $limitA";


//print_r($sql);
$pdoStatement = $pdo->prepare($sql);
// Requete pas encore exécutée
// Je remplace les paramètres par leurs valeurs
$pdoStatement->bindValue(':id', $session, PDO::PARAM_INT);


if (!empty($search)) {
	//important !!!!mettre les % dans le bindValue
	$pdoStatement->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);

}


//si erreur
if ($pdoStatement->execute() === false) {
	print_r($pdoStatement->errorInfo());
}

//sinon , je récupère les données
else{
	
	$studentListe= $pdoStatement->fetchAll();
	foreach ($studentListe as$key => $value) {
		$studentListe[$key]['stu_age'] = date("Y") - $value['stu_age'];
	//print_r($studentListe);
	}
}

require 'views/header.php';
require 'views/list.php';
require 'views/footer.php';
