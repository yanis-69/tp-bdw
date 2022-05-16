
<!doctype html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <title>Page de Connexion</title>
  <link rel="stylesheet" href="bulma.min.css">
  <link rel="stylesheet" href="BDW-Project.css">
  
</head>


<body class=body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              
              <a id="btn-open-login-modal" class="button is-light"  href="index.php">
                Retourner à la page principale
              </a>
              <a id="btn-open-login-modal" class="button is-light"  href="connexion.php">
                Se connecter
              </a>
            </div>
          </div>
        </div>
      </nav>

    <div class="hero is-link">  
        <center>
           </br>
           </br>  
            <h4 class="title">Page d'inscription </h4>
            <h4 class="subtitle">⇩ : Veuillez entrez vos identifiants : ⇩</h4>
          </br> 
          </br>   
        </center>
      </div> 

    <div class="image">
        <img  src="https://i.pinimg.com/originals/38/22/35/382235c3d49f2616f999756ee22c6f85.jpg"/>
    </div>

    <div class="connexion">
        <form action="" method="post">
            Nom d'utilisateur
            <div class="control">
           <input class="input is-hovered" type="text" placeholder="Insérez votre identifiant" name="pseudo" value="">
            </div>
            Mot de passe
            <div class="control">
           <input class="input is-hovered" type="password" placeholder=" Insérez votre mot de passer " name="password" value="">
            </div>
        </br>
           <input type="submit" name="submit" value="S'inscrire">
        </form>
    </div>

    
    <?php 
    include("fonctions/bd.php");
    include("fonctions/utilisateur.php");
    $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
    if($_POST)
    {
    if(isset($_POST['submit']))
    {
        $ok = checkAvailability($_POST['pseudo'], $link);
        if($ok == true)
        {
         register($_POST['pseudo'], $_POST['password'], $link);
         $reussi = getUser($_POST['pseudo'], $_POST['password'], $link);
         if($reussi == true)
         {
            echo "<script>alert(\" Comptre cree avec succès !\")</script>";
            header("Location: connexion.php");
         }else {echo "<script>alert(\" erreur lors de la création du compte \")</script>";}
        
        }else {echo "<script>alert(\" Ce compte existe déjà\")</script>";}

    }
}
   
    ?>
<center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>    
</body>
</html>