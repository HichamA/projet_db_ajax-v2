<?php

// ---- load config file ----
require'inc/config.php';

$sql = "
	SELECT
  tra_id,
  tra_start_date,
  tra_end_date,
  loc_name,
  COUNT(*) AS nb
FROM
  training
LEFT OUTER JOIN
  student ON student.training_tra_id = training.tra_id
LEFT OUTER JOIN
  location ON training.location_loc_id = location.loc_id
GROUP BY
  tra_id,
  tra_start_date,
  tra_end_date,
  loc_name

  ";

// J'exécute ma requete SELECT
$pdoStatement = $pdo->query($sql);
// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
// Sinon, je récupère les données
else {
	// Je récupère toutes les données
	$session = $pdoStatement->fetchAll();

	//print_r($session);
}





// VIEW
require 'views/header.php';
require 'views/home.php';
require 'views/footer.php';

