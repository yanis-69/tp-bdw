<?php 
session_start();
include("fonctions/bd.php");
    include("fonctions/utilisateur.php");
/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/

/************************************************************
 * Script d'upload
 *************************************************************/
if(isset($_POST))
{
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
       
              $query = "UPDATE photo SET photoId='".$_GET['photo']."',fcatId=$Idcat,nomFich='".$_GET['link']."',description=$descr,addBy='".$_SESSION['logged']."'";
              
              // $query = "SELECT catid FROM categorie WHERE nomCat = '".$cat."';";
              $res = executeQuery($link, $query);
              echo "test avec up";
              
          
          
}


?>
<!doctype html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <title>Ajouter une photo</title>
  <link rel="stylesheet" href="bulma.min.css">
  <link rel="stylesheet" href="BDW-Project.css">
  
  
</head>

<body class=body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              
              <a class="button is-light" href="isconnexion.php">
                Retourner à la page principale
              </a>
              <p> Vous êtes connecté en tant que :</p><?php echo $_SESSION['logged']; ?>
            </div>
          </div>
        </div>
      </nav>
      <div class="hero is-danger">  
        <center>
           </br>
           </br>  
            <h4 class="title">Pinter-Test : Ajoutez des photos</h4>
            <h4 class="subtitle">⇩ : Remplir le formulaire ci-dessous : ⇩</h4>
          </br> 
          </br>   
        </center>
      </div> 

    <!-- Debut du formulaire -->
   <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <fieldset>
    description 
            <div class="control">
             <input class="input is-hovered" type="textarea" placeholder="Donnez le lien de la photo" name="d" value="" />
            </div>
            </br>

Catégorie :
 <select name="my_html_select_box" >
<option >Animaux </option>
<option >manga</option>
<option>sport</option>
<option>voyage</option>
<option>autre</option>
</select>

</br>
          <p>
            
            <input type="submit" name="submit" value="Uploader" />
          </p>
      </fieldset>
    </form>
    <!-- Fin du formulaire -->
  </body>
</html>
     </form>
  </div>





   
 <center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>
</body>
</html>