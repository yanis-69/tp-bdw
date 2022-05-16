
<?php
session_start();
//echo $_SESSION['logged'];
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
          <a id="button is-light" class="button is-light"  href="perso.php">
          Modifier vos photos
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
        <h4 class="title">Pinter-Test : Description de la photo sélectionée</h4>
        <h4 class="subtitle">⇩ : Voici les informations concernant la photo : ⇩</h4>
      </br> 
      </br>   
    </center>
  </div> 
  <?php
  echo "<IMG SRC=\"".$_GET['tar']."\"
  WIDTH=400;
  HEIGHT=400;";
  include("fonctions/bd.php");
  include("fonctions/utilisateur.php");

  
 $query = "SELECT * FROM photo where nomFich = '".$_GET['link']."' ;";
   
        $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
        
        $result1 = executeQuery($link, $query);   
        $result = mysqli_fetch_assoc($result1); // On fetch tout
       
        //  print_r($result);
        echo "</br>";
        echo "</br>";
        
     echo" Nom du fichier
        <div class=\"control\">
       <input class=\"input is-hovered\" type=\"text\" value=\"".$result['nomFich']."\" disabled>
        </div>";

      echo " Description du fichier
        <div class=\"control\">
       <input class=\"input is-hovered\" type=\"text\" value=\"".$result['description']."\" disabled>
        </div>";

        $Idcat = "";
        if($result['fcatId'] == 1)
  {
    $Idcat = 'Animaux';
  }else if($result['fcatId'] == 2)
  {
    $Idcat = 'manga';
  }else if($result['fcatId'] == 3)
  {
    $Idcat = 'sport';
  }else if($result['fcatId'] == 4)
  {
    $Idcat = 'voyage';
  }else $Idcat = 'autre';
        
        echo " Catégorie appartenant au fichier :
        <a href=\"categorie.php?id=".$result['fcatId']."\" /> $Idcat </a>";
        //echo "$Idcat";
       echo "</br>";
        echo " poster par :
        <div class=\"control\">
       <input class=\"input is-hovered\" type=\"text\" value=\"".$result['addBy']."\" disabled>
        </div>";
        
 ?>
  


  <center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>