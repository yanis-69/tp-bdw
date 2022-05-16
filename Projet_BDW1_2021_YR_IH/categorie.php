<?php 
session_start();
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
  
  <nav class="navbar"  role="navigation" aria-label="main navigation">
    <div  class="navbar-end">
      <div  class="navbar-item">
        <div class="buttons">
          
          <a id="btn-open-login-modal" class="button is-light"  href="isconnexion.php">
            Retourner à la page principale
          </a>
          <a id="button is-light" class="button is-light" href="perso.php">
            Retourner à vos photos
          </a>
          <p> Vous êtes connecté en tant que :</p><?php echo $_SESSION['logged']; ?>
        
          <form name="log">
          <div class="control">
            <input name="champ_log" class="input" type="text" placeholder="Attente de connexion" id="login" disabled>
          </div>
          </form>
        </div>
      </div>
    </div>
  </nav>

<div class="hero is-success">  
    <center>
       </br>
       </br>  
        <h4 class="title">Modifier de la photo sélectionée</h4>
        <h4 class="subtitle">⇩ : Voici les informations concernant la photo : ⇩</h4>
      </br> 
      </br>   
    </center>
  </div> 
 

  <?php


    include("fonctions/bd.php");
  include("fonctions/utilisateur.php");

  
 $query = "SELECT * FROM photo where fcatId='".$_GET['id']."';";
   
        $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
        
        $result1 = executeQuery($link, $query);  
     
        while ( $result = mysqli_fetch_assoc($result1) ) {
            //echo $result['nomFich'];
            $tar="IMAGE/files/".$result['nomFich'];
     echo "<img src=\"".$tar."\" WIDTH=400;HEIGHT=400; />";
         }
         ?>
  

  <center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>