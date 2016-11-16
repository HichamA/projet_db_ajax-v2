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


// ---- load config file ----
require'inc/config.php';

$sql= 'SELECT stu_id, stu_lname, stu_fname, cou_name, cit_name, stu_friendliness, stu_email, stu_age, training_tra_id, cit_id, cou_id
		FROM student
		INNER JOIN city
		ON student.city_cit_id = city.cit_id
		INNER JOIN Country
		ON city.country_cou_id = country.cou_id
		INNER JOIN training
		ON student.training_tra_id = training.tra_id
		WHERE stu_id = :stuId
		';

$stuId = isset($_GET['stuId']) ? trim($_GET['stuId']) : '';
//print_r($sql);
$pdoStatement = $pdo->prepare($sql);
// Requete pas encore exécutée
// Je remplace les paramètres par leurs valeurs
$pdoStatement->bindValue(':stuId', $stuId, PDO::PARAM_INT);

//si erreur
if ($pdoStatement->execute() === false) {
	//print_r($pdoStatement->errorInfo());
}

//sinon , je récupère les données
else{
	
	$studentInfo= $pdoStatement->fetchAll();
	foreach ($studentInfo as$key => $value) {
		//$studentInfo[$key]['stu_age'] = date("Y") - $value['stu_age'];
	//print_r($studentInfo);
	}
}



//-------------------------update == add--------------


//---------Form Validation-----------------
// Formulaire soumis
//Initialisation du boolean et variable
$formOk = false;
$nom = $prenom = $email = $citId = $couId = $stuFriendliness= $birthdate ="";
$nomError =$prenomError =$emailError =$citIdError = $couIdError = $sympathieError=$birthdateError=$fileError=$fileExtError=$sizeError=$msg="";



if (!empty($_POST)) {
	$nom = securisation($_POST['studentName']);
	$prenom = securisation($_POST['studentFirstname']);
	$email = securisation($_POST['studentEmail']);
	$birthdate = securisation($_POST['studentBirhtdate']);
	$citId = securisation($_POST['cit_id']);
	//$couId = securisation($_POST['cou_id']);
	$sympathie = securisation($_POST['stu_friendliness']);


	// Validation des données
	//je valide le file upload
	$formOk = true;

	//-----------gestion des upload-----------
	if (sizeof($_FILES) > 0) {
		//je récupère les données du fichier 'filForm'
		$fileUpload = $_FILES['fileForm'];
		//verification des fichier (sécurité)
		$extension = substr($fileUpload['name'], -4);
		//check 
		//if ($extension != '.php')
		// verification de taille du fichier max(200ko)
		if ($fileUpload["size"] > 200000) {
   	 		$sizeError= 'Sorry, your file is too large.';
   	 		$formOk = false;
		}


		// autorisation des formats
		if($extension = "jpg" && $extension = "png" && $extension = "jpeg"
		&& $extension = "gif" ){
			// verification de taille du fichier max(200ko)
			if ($fileUpload["size"] < 200000) {	
			//je téléverse le fichier
				if (move_uploaded_file($fileUpload['tmp_name'], 'filesupstu/'.$fileUpload['name'])) {
					$msg = 'file uploaded succefuly<br>';
				}else{

					$fileError='uploading Error .';
					$formOk = false;
				}
			}else{
				$sizeError= 'Sorry, your file is too large.';
   	 			$formOk = false;
			}
		}else{
				$fileExtError='you are a little SOB ^^  va fan culo.';
		}		$formOk = false;
		
	}


	//je valide le nom
	if (empty($nom)) {
		$nomError= 'Please enter you last name';
		$formOk = false;
	}
	else if (strlen($nom) < 2) {
		$nomError='Name invalid (2 characteres minimum)';
		$formOk = false;
	}
	//je valide le prenom
	if (empty($prenom)) {
		$prenomError= 'Please choose enter your First name';
		$formOk = false;
	}
	else if (strlen($prenom) < 2) {
		$prenomError='Le prénom invalid (2 characteres minimum)';
		$formOk = false;
	}
	//je valide l'email
	if (empty($email)) {
		$emailError ='Please enter your Email ';
		$formOk = false;
	}//  autre condition de validation email	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailError='Format email Invalid'; 
  		$formOk = false;
	}

	//je valide la date de naissance
	if (empty($birthdate)) {
		$birthdateError ='Format birthdate invalid';
		$formOk = false;
	}
	//je valide la ville de résidence
	if ($citId=="0") {
		$citIdError ='Please choose a city ';
		$formOk = false;
	}

	//je valide la sympathie
	if ($sympathie=="") {
		$sympathieError ='Friendliness value is invalid';
		$formOk = false;
	}
		
	
	//je valide le formulaire
	if ($formOk) {
		echo 'formulaire ok<br>';
		echo 'nom='.$nom.'<br>prenom='.$prenom.'<br>';
		echo 'Email='.$email.'<br>';
		echo 'Birtdate='.$birthdate.'<br>';
		echo 'Ville de résidence='.$citId.'<br>';
		$sql = "Update  `student` SET `city_cit_id`= :citycitid,  `stu_lname`= :stulname, `stu_fname`=:stufname , `stu_email`= :stuemail, `stu_age`= :stuage , `stu_friendliness`=:stufriendliness 
		WHERE stu_id = $stuId";
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



//------------------------end update = add


require 'views/header.php';
require 'views/update.php';
require 'views/footer.php';



}