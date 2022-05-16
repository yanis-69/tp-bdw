

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
              <form action="" method="post">
              <a id="btn-open-login-modal" class="button is-light"  href="register.php">
                Inscription
              </a>
              </form>
              <?php
              /*
                if(isset($_POST['deco']))
              { if(isset($_SESSION['logged']))
                {
                  include("fonctions/bd.php");
                   include("fonctions/utilisateur.php");
                    session_destroy();
                     session_unset();
                      session_reset();
                      echo $_SESSION['islog'] = false;
                       echo $_SESSION['logged'];
                }
              }
            }
            */
              ?>
              <p> Vous êtes connecté en tant que :</p><?php session_start(); echo $_SESSION['logged']; ?>
            
              
            </div>
          </div>
        </div>
      </nav>

    <div class="hero is-danger">  
        <center>
           </br>
           </br>  
            <h4 class="title"> Page de connexion </h4>
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
           <input type="submit" name="submit" value="Se Connecter">
        </form>
    </div>

    
    <?php 
    include("fonctions/bd.php");
    include("fonctions/utilisateur.php");
    session_unset();
     session_reset();
    
    if(isset($_POST["submit"])){
      
       $link=getConnection($dbHost, $dbUser, $dbPwd, $dbName);
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $ok = getUser($pseudo,$password,$link);
        if($ok == true)
        {
          // echo "connexion réussi";
          
          $_SESSION['logged']= $pseudo;
          $_SESSION['passwd']= $password;
          $_SESSION['islog'] = true;
         
          echo "<script>alert(\" Connecté avec succes \")</script>";
          header("Location: isconnexion.php");
        }else echo "<script>alert(\" erreur de connection \")</script>";
        closeConnexion($link);
        //echo $_SESSION['logged'];
        
    }
   
    ?>
<center><p class="findepage">Projet BDW1 réalisé par Ilyess HAMANI & Yanis REZAOUI</p></center>    
</body>
</html>