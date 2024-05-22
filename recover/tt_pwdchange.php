<?php
//ici on fait le changement de mot de passe 
//puis on supprime de la table recover le token utiliser pour le changement de mot de passe 
require_once __DIR__.'/../pages/parampdo.php';
       
   if(isset($_POST['password']) && isset($_POST['password_rep']) && isset($_POST['token']) ){

       if(!empty($_POST['password']) && !empty($_POST['password_rep']) && !empty($_POST['token'])){
      
            $password=htmlspecialchars(($_POST['password']));
            $password_rep=htmlspecialchars(($_POST['password_rep']));
            $token=htmlspecialchars($_POST['token']);

            $check = $bdd -> prepare('SELECT * FROM users WHERE token = ?');
            $check -> execute(array($token));

            $row = $check->rowCount();

            if($row){
                        if ($password == $password_rep) {
                            $cost = 12; 
                            $options = [
                                'cost' => $cost,
                            ];

                            
                           
                            $password=password_hash($password, PASSWORD_BCRYPT, $options);

                            $update= $bdd -> prepare('UPDATE users SET password = ? WHERE token = ?');
                            $update -> execute(array($password, $token));


                            $delete = $bdd -> prepare('DELETE  FROM  password_recover WHERE token_user = ?');
                            $delete -> execute(array($token));

                            echo "Mot de passe modifié";

                        }else {
                            echo "Mon de passe non valide";
                        }


            }else {
                echo "compte non valide ";
            }

       }

   }
              

?>