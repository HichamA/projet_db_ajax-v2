<?php


// ---- load config file ----
require'inc/config.php';

$sql= "SELECT stu_id, stu_lname, stu_fname, cou_name, cit_name, stu_friendliness, stu_email, stu_age, training_tra_id, stu_id
		FROM student
		INNER JOIN city
		ON student.city_cit_id = city.cit_id
		INNER JOIN Country
		ON city.country_cou_id = country.cou_id
		INNER JOIN training
		ON student.training_tra_id = training.tra_id
		WHERE stu_id = :id
		";


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$pdoStatement = $pdo->prepare($sql);
// Requete pas encore exécutée
// Je remplace les paramètres par leurs valeurs
$pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

echo '
	<table class="table">
			<thead >
				<tr class="info">
					<td>Nom</td>
					<td>Prénom</td>
					<td>Email</td>
					<td>Ville</td>
					<td>Pays</td>
					<td>Session</td>
					<td>Sympathie</td>
					<td>Année de naissance</td>
				</tr>
			</thead>
			<tbody>

';
//si erreur
if ($pdoStatement->execute() === false) {
	print_r($pdoStatement->errorInfo());
}

//sinon , je récupère les données
else{
		
	$studentInfo= $pdoStatement->fetchAll();
	foreach ($studentInfo as $currentEtudiant){

		echo'
				<tr>
					<td>
						<a href="update.php?stuId='.$currentEtudiant['stu_id'].' ">'.$currentEtudiant['stu_lname']. 	
						'</a>
					</td>
					<td>'.$currentEtudiant['stu_fname'].'</td>
					<td>'.$currentEtudiant['stu_email'].'</td>
					<td>'.$currentEtudiant['cit_name'].'</td>
					<td>'.$currentEtudiant['cou_name'].'</td>
					<td>'.$currentEtudiant['training_tra_id'].'</td>
					<td>'.$currentEtudiant['stu_friendliness'].'</td>
					<td>'.$currentEtudiant['stu_age'].'</td>
				</tr>
			</tbody>
		
		</table>'
	}
	//echo '<br><br>';
	//echo $value['stu_fname']. ' '.$value['stu_lname'];
}

require 'views/header.php';
require 'views/student.php';
require 'views/footer.php';