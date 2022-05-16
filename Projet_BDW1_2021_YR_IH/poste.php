<?php 
session_start();
include("fonctions/bd.php");
    include("fonctions/utilisateur.php");
/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
// Constantes
define('TARGET', 'IMAGE/files/');    // Repertoire cible
define('MAX_SIZE', 100000);    // Taille max en octets du fichier
define('WIDTH_MAX', 2000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 2000);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('gif','png','jpeg','GIF','PNG','JPEG');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
$descr = '';
$categorie = '';
$Idcat = '';
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
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
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
            $descr=$_POST['d'];
            $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
       
              $query = "INSERT INTO photo  VALUES 
              (
                       '',
                       '".$Idcat."',
                       '".$nomImage."', 
                       '".$descr."',
                       '".$_SESSION['logged']."'
              );";
              
              // $query = "SELECT catid FROM categorie WHERE nomCat = '".$cat."';";
              $res = executeQuery($link, $query);
              header("Location: perso.php");
              echo "test avec up";
              
          
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
              
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
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
            <h4 class="title">Ajoutez des photos</h4>
            <h4 class="subtitle">⇩ : Remplir le formulaire ci-dessous : ⇩</h4>
          </br> 
          </br>   
        </center>
      </div> 

    <!-- Debut du formulaire -->
   <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <fieldset>
    </br>
    Description :
            <div class="control">
            <input class="input is-hovered" type="textarea" placeholder="Donnez la description de la photo" name="d" value="" />
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
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :  </label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
        
            <input name="fichier" type="file" id="fichier_a_uploader" />
            </br>
            </br>
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