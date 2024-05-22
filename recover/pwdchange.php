<?php

//ici on verifie si il y a bien pour l'utilisateur un tokken present dans ma table password_recover
require_once __DIR__.'/../pages/parampdo.php';
       
   if(isset($_GET['u']) && isset($_GET['token']) && !empty($_GET['token']) && !empty($_GET['u'])){

        $u=htmlspecialchars(base64_decode($_GET['u']));
        $token=htmlspecialchars(base64_decode($_GET['token']));


        $check = $bdd -> prepare('SELECT * FROM password_recover WHERE token = ? AND token_user= ?');
        $check -> execute(array($token, $u));

        $row = $check->rowCount();
 
        if ($row) {

            $get = $bdd -> prepare('SELECT token FROM users WHERE token = ?');
            $get -> execute(array($u));
            $data_u =$get->fetch();
                if(hash_equals($data_u['token'], $u)){
                        header('Location: change.php?u='.base64_encode($u));
                }else{
                    echo 'Erreur de compte';
                }
        }else {
            echo "le compte n'est pas valide";
        }

   }else {
      echo "lien non valide" ;
   }
   


?>