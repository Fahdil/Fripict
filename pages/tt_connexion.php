<?php
  session_start(); // Pour les messages

  
  // Contenu du formulaire :
   $email =  htmlentities($_POST['mail']);
  $password = htmlentities($_POST['password']);
   
  // Option pour bcrypt
  $options = [
        'cost' => 12,
  ];
  
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $name, $passwd, $dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }

  // Attention, ici on ne vérifie pas si l'utilisateur existe déjà
  // Cette opération doit être faite, on suppose l'email comme étant
  // Un champ unique !
  //
  ///
  $rechercher=$mysqli->query("SELECT * FROM users WHERE email='$email'");
   if(!$rechercher){
  die ("Echec de la requete : ".$mysqli->error);
 } 
 elseif($rechercher->num_rows == 0) {
  $_SESSION['message'] =  "Echec de connexion, merci de renouveler votre saisie!";
    // Redirection vers la page de connexion 
  // Où le message présent dans la session sera affiché.
  header('Location: connexion.php');
} else {
  
  $resultat=$rechercher->fetch_assoc();
  $passwordhash=$resultat['password'];
   if(password_verify($password, $passwordhash)){ 

    $_SESSION['authentification']=1;
    $_SESSION['email']=$resultat['email'];
  
    $_SESSION['role']=$resultat['role'];

    echo $resultat['role'];
   if ($resultat['role']==1) {
    
    
  $_SESSION['message'] =  "Connexion Réussie";
    // Redirection vers la page d'accueil client
  // Où le message présent dans la session sera affiché.
  header('Location: ajjj_photo.php');
    }elseif ($resultat['role']==0){
      header('Location: connexion.php');
    }
}
else{
  $_SESSION['message'] =  "Echec de connexion, merci de renouveler votre saisie!";
    // Redirection vers la page d'accueil 
  // Où le message présent dans la session sera affiché.
  header('Location: connexion.php');
}
  
}
 

?>