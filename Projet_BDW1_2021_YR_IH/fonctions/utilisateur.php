<?php


/*Cette fonction prend en entrée un pseudo à ajouter à la relation utilisateur et une connexion et 
retourne vrai si le pseudo est disponible (pas d'occurence dans les données existantes), faux sinon*/
function checkAvailability($pseudo, $link)
{
	$query = "SELECT name FROM identifiant WHERE name = '". $pseudo ."';";
	$result = executeQuery($link, $query);
	return mysqli_num_rows($result) == 0;
}

/*Cette fonction prend en entrée un pseudo et un mot de passe, associe une couleur aléatoire dans le tableau de taille fixe  
array('red', 'green', 'blue', 'black', 'yellow', 'orange') et enregistre le nouvel utilisateur dans la relation utilisateur via la connexion*/
function register($pseudo, $hashPwd, $link)
{
	$query = "INSERT INTO identifiant VALUES ('". $pseudo ."', '". $hashPwd ."');";
	executeUpdate($link, $query);
}

/*Cette fonction prend en entrée un pseudo et mot de passe et renvoie vrai si l'utilisateur existe (au moins un tuple dans le résultat), faux sinon*/
function getUser($pseudo, $hashPwd, $link)
{
	$query = "SELECT name FROM identifiant WHERE name = '". $pseudo ."' AND passwd = '". $hashPwd ."';";
	$result = executeQuery($link, $query);
	return (mysqli_num_rows($result) == 1);
}

?>