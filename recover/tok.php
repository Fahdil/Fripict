<?php
     require_once __DIR__.'/../pages/parampdo.php';
     $cost = ['cost'=> 12];
    /* $mail = "wwwww@www";
     $topk =bin2hex(openssl_random_pseudo_bytes(24));


        $check = $bdd -> prepare('UPDATE users SET token = ? WHERE email= ?');
        $check -> execute(array($topk,$mail ));*/

        $mail = "fahdilbello390@gmail.com";
        $topk =password_hash("wxcvbn", PASSWORD_BCRYPT, $cost);
   
   
           $check = $bdd -> prepare('UPDATE users SET password = ? WHERE email= ?');
           $check -> execute(array($topk,$mail ));

      

?>