
<?php

  session_start();
 //echo $_SESSION['logged'];
 //echo "test";
  
?>



<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title> page d'acceuil </title>
  <link rel="stylesheet" href="bulma.min.css">
  <link rel="stylesheet" href="BDW-Project.css" />
</head>

<body class=body>

  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        
          <a class="button is-light"  href="connexion.php">
            Se connecter
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="hero is-warning">  
    <center>
       </br>
       </br>  
        <h4 class="title">Page d'accueil</h4>
    
      </br> 
      </br>   
    </center>
  </div> 

  <center>
    </br>
      <p>Veuillez vous connecter pour voir les photos ou pour poster</p>     
  </center>


  
 
    </div>

    
<?php
$dir = "IMAGE/files/";

// Ouvre un dossier bien connu, et liste tous les fichiers
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false ) {
          if(!is_writable($file)){
          $tar = $dir.$file;
          echo "<a href=description.php?link=$file&tar=$tar>
          <img src=\"".$tar."\" WIDTH=400;
          HEIGHT=400; />
          </a>";
          }
        }
        closedir($dh);
    }
}


?>



    </div>

  
<center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>


