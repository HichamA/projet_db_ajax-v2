<pre><?php
// A mettre au début du début du début 
session_start();

// Je supprime une variable en session
unset($_SESSION['userID']);

if (isset($_GET['all'])) {
	session_unset();
}

echo 'supprimé';
header('location: index.php');

?></pre>