<?php

$studentListe = array();
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



// ---- load config file ----

require'inc/config.php';

//---------Form Validation-----------------
// Formulaire soumis
//Initialisation du boolean et variable
$formOk = false;
$nom = $prenom = $email = $citId = $couId = $stuFriendliness= $birthdate ="";
$nomError =$prenomError =$emailError =$citIdError = $couIdError = $sympathieError=$birthdateError="";



if (!empty($_POST)) {
	$nom = securisation($_POST['studentName']);
	$prenom = securisation($_POST['studentFirstname']);
	$email = securisation($_POST['studentEmail']);
	$birthdate = securisation($_POST['studentBirhtdate']);
	$citId = securisation($_POST['cit_id']);
	//$couId = securisation($_POST['cou_id']);
	$sympathie = securisation($_POST['stu_friendliness']);
	
	// Validation des données
	//je valide le nom
	$formOk = true;
	if (empty($nom)) {
		$nomError= 'Le nom est vide';
		$formOk = false;
	}
	else if (strlen($nom) < 2) {
		$nomError='Le nom est incorrect (2 caractères minimum)';
		$formOk = false;
	}
	//je valide le prenom
	if (empty($prenom)) {
		$prenomError= 'Le prénom est vide';
		$formOk = false;
	}
	else if (strlen($prenom) < 2) {
		$prenomError='Le prénom est incorrect (2 caractères minimum)';
		$formOk = false;
	}
	//je valide l'email
	if (empty($email)) {
		$emailError ='L\'Email est vide';
		$formOk = false;
	}//  autre condition de validation email	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailError='Format email Invalid'; 
  		$formOk = false;
	}

	//je valide la date de naissance
	if (empty($birthdate)) {
		$birthdateError ='La date de naissance est vide';
		$formOk = false;
	}
	//je valide la ville de résidence
	if ($citId=="0") {
		$citIdError ='La ville de résidence est vide';
		$formOk = false;
	}

	//je valide la sympathie
	if ($sympathie=="") {
		$sympathieError ='La valeur de la sympathie est incorrect';
		$formOk = false;
	}
		
	
	//je valide le formulaire
	if ($formOk) {
		echo 'formulaire ok<br>';
		echo 'nom='.$nom.'<br>prenom='.$prenom.'<br>';
		echo 'Email='.$email.'<br>';
		echo 'Birtdate='.$birthdate.'<br>';
		echo 'Ville de résidence='.$citId.'<br>';
		$sql = "INSERT INTO `student`( `city_cit_id`,  `stu_lname`, `stu_fname`, `stu_email`, `stu_age`, `stu_friendliness`) 
		VALUES (:citycitid,:stulname,:stufname,:stuemail,:stuage, :stufriendliness)";
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':citycitid', $citId, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stulname', $nom, PDO::PARAM_STR);
		$pdoStatement->bindValue(':stufname', $prenom, PDO::PARAM_STR);
		$pdoStatement->bindValue(':stuemail', $email, PDO::PARAM_STR);
		$pdoStatement->bindValue(':stuage', $birthdate, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stufriendliness', $sympathie, PDO::PARAM_STR);
		
		// J'exécute
		if (!$pdoStatement->execute()) {
			print_r($pdoStatement->errorInfo());
		}else{
			$resList = $pdoStatement->fetchAll();			
		}
	}

}
		
	

// Sinon, GET => j'affiche le formulaire
if (!$formOk) {




require 'views/header.php';
require 'views/add.php';
require 'views/footer.php';

}

