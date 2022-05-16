<?php
session_start();
?>



<!doctype html>
<html lang="fr">

<head>
<meta charset="utf-8">
<title>Page personnel</title>
<link rel="stylesheet" href="bulma.min.css">
<link rel="stylesheet" href="BDW-Project.css" />
</head>

<body class=body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-end">
    <div class="navbar-item">
      <div class="buttons">
      
      <a class="button is-light" href="isconnexion.php">
                Retourner à la page principale
              </a>
        
        <a id="button is-light" class="button is-light"  href="poste.php">
          Ajouter des photos
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
     
      <h4 class="subtitle">Page personnelle de : <?php echo $_SESSION['logged'];?></h4>
    </br> 
    </br>   
  </center>
</div> 

<center>
  </br>
    <p>⇩ : Voici les différentes photos présentes dans la base de donnée "bdd.sql" : ⇩</p>     
</center>

</br>




<h2 class=title>Vos photos :</h2>


  </div>

  
<?php
$dir = "IMAGE/files/";

// Ouvre un dossier bien connu, et liste tous les fichiers
// if (is_dir($dir)) {

    include("fonctions/bd.php");
  include("fonctions/utilisateur.php");

  
 $query = "SELECT * FROM photo where addBy ='".$_SESSION['logged']."';";
   
        $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
        
        $result1 = executeQuery($link, $query);  
     
        while ( $result = mysqli_fetch_assoc($result1) ) {
            //echo $result['nomFich'];
            $tar="IMAGE/files/".$result['nomFich'];
            
        echo "<a href=description.php?link=".$result['nomFich']."&tar=$tar>
          <img src=\"".$tar."\" WIDTH=400;
          HEIGHT=400; />
          </a>";
          echo "</br>";
          /*
 echo "<form action=\"\" method=\"post\">
 photoId
 <div class=\"control\">
  <input class=\"input is-hovered\" type=\"textarea\" name=\"photo\" value=\"".$result['photoId']."\" disabled/>
 </div>
  <fieldset>
  nom de fichier
          <div class=\"control\">
           <input class=\"input is-hovered\" type=\"textarea\" name=\"link\" value=\"".$result['nomFich']."\" disabled/>
          </div>
  description 
          <div class=\"control\">
           <input class=\"input is-hovered\" type=\"textarea\" placeholder=\"Donnez la description de la photo\" name=\"d\" value=\"\" />
          </div>

Catégorie :
<select name=\"my_html_select_box\" >
<option >Animaux </option>
<option >manga</option>
<option>sport</option>
<option>voyage</option>
<option>autre</option>
</select>
</br>
addedBY
          <div class=\"control\">
           <input class=\"input is-hovered\" type=\"textarea\" name=\"d\" value=\"".$result['addBy']."\" disabled/>
          </div>
          
</br>
<a  class=\"button is-light\"  href=\"modifier.php?link=".$result['nomFich']."&photo=".$result['photoId']."&descr=".$_POST['d']."&cat=".$_POST['my_html_select_box']."\">
Supprimer
</a>
    </fieldset>
  </form>";*/
  echo "
     <a  class=\"button is-light\"  href=\"supprimer.php?link=".$result['nomFich']."\">
     Supprimer
   </a>";
 echo "</br>";
 echo "</br>";
        }
/*
?>
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
*/

?>


<?php

include("fonctions/bd.php");
include("fonctions/utilisateur.php");


if(isset($_POST))
{
    //if($_POST["submit"]){
  $categorie = $_POST['my_html_select_box'];
  echo $categorie;
  if($categorie == 'Animaux')
  {
    $Idcat = 1;
  }else if($categorie == 'manga')
  {
    $Idcat = 2;
  }else if($categorie == 'sport')
  {
    $Idcat = 3;
  }else if($categorie == 'voyage')
  {
    $Idcat = 4;
  }else $Idcat = 5;
  // On verifie si le champ est rempli
  
            // On renomme le fichier
           
            $descr=$_POST['d'];
            $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
       
              $query = "UPDATE photo SET photoId='".$_POST['photo']."',fcatId=$Idcat,nomFich='".$_POST['link']."',description=$descr,addBy='".$_SESSION['logged']."'";
              
              // $query = "SELECT catid FROM categorie WHERE nomCat = '".$cat."';";
              $res = executeQuery($link, $query);
              echo "test avec up";  
//}
}

?>

  </div>

<center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>


