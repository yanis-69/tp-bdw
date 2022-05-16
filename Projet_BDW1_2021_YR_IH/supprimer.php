<?php 
session_start();

    include("fonctions/bd.php");
    include("fonctions/utilisateur.php");
    $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
   $query = "DELETE FROM photo WHERE nomFich = '".$_GET['link']."';";
   $result = executeQuery($link, $query);
   if($result == true)
   {
    header("Location: perso.php");
   }
  
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Description Photo</title>
  <link rel="stylesheet" href="bulma.min.css">
  <link rel="stylesheet" href="BDW-Project.css">

</head>
<body class=body>
  

  <center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>
