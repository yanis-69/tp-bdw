
<?php

session_start();
//echo $_SESSION['logged'];
//echo "test";
if( $_SESSION['islog'] == false)
{
    header("Location: connexion.php");
}

?>



<!doctype html>
<html lang="fr">

<head>
<meta charset="utf-8">
<title>Page d'acceuil</title>
<link rel="stylesheet" href="bulma.min.css">
<link rel="stylesheet" href="BDW-Project.css" />
</head>

<body class=body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-end">
    <div class="navbar-item">
      <div class="buttons">
      <form action="" method="POST">
      <input class="button button is-danger" type="submit" name="submit" value="Disconnect">
      </button>
        </form>
        <?php
              
           if(isset($_POST['submit']))
              { if(isset($_SESSION['logged']))
                {
                  include("fonctions/bd.php");
                   include("fonctions/utilisateur.php");
                    // session_destroy();
                    //  session_unset();
                    //   session_reset();
                      $_SESSION['islog'] = false;
                      $_SESSION['password'] ="";
                      $_SESSION['logged'] = NULL;
                      // echo $_SESSION['logged'];
                }
                      
                echo "<script>alert(\" Déconnécté avec succès\")</script>";
                header("Location: index.php");
              }
            
            
              ?>
        
        <a id="button is-light" class="button is-light"  href="poste.php">
          Ajouter des photos
        </a>

        <a id="button is-light" class="button is-light"  href="perso.php">
          Modifier vos photos
        </a>
        <p> Vous êtes connecté en tant que :</p><?php echo $_SESSION['logged'];?>
      </div>
    </div>
  </div>
</nav>

<div class="hero is-warning">  
  <center>
     </br>
     </br>  
      <h4 class="title">Bienvenue : Page d'accueil</h4>
    </br> 
    </br>   
  </center>
</div> 

<center>
  </br>
    <p>⇩ : Voici les différentes photos présentes dans la base de donnée "tp.sql" : ⇩</p>     
</center>

</br>
<a href="categorie.php?id=1" >Catégorie Animaux</a>
</br>
<a href="categorie.php?id=2" >Catégorie Manga</a>
</br>
<a href="categorie.php?id=3" >Catégorie Sport</a>
</br>
<a href="categorie.php?id=4" >Catégorie Voyage</a>
</br>
<a href="categorie.php?id=5" >Catégorie Autre</a>
</br>

</br>

<h2 class=title>Vos photos :</h2>


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


