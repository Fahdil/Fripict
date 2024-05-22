<?php
//chaque utilisateur possede un tokken unique a la creation de son compte
//ici on on verifie si le mail est valide puis 
//1-on cree un token de recuperation de mot de passe
//2-on l'associe avec le token unique de l'utilisateur
//3-on envoie le tout à l'utilisateur grace a la fonction  send_link() qui prend en parametre le mail et le lien de recuperation

     require_once __DIR__.'/../pages/parampdo.php';


     
       
   if(isset($_POST['email']) && !empty($_POST['email'])){

     $recove_mail = htmlspecialchars($_POST['email']);

        $check = $bdd -> prepare('SELECT token FROM users WHERE email = ?');
        $check -> execute(array($recove_mail));
        
        $data =$check->fetch();
        $row = $check->rowCount();

        if($row){
                $token = bin2hex(openssl_random_pseudo_bytes(24));
                $token_user=$data['token'];

                $insert=$bdd -> prepare('INSERT INTO password_recover(token, token_user) VALUE (?,?)');
                $insert -> execute(array($token,$token_user));

                $link='http://betapictss/recover/pwdchange.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

               // echo "<a href='$link'>lien</a>";

                //puis on envoie ce lien par mail (a faire)
                send_link($recove_mail, $link );


        }else{
            echo "pas d'utilisateur avec ce mail";
        }
                
   }



   // fonction pour Envoie du mail

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

   function send_link($mail_user, $link){
    
    require 'C:/wamp64/www/betapic/PHPMailer/src/Exception.php';
    require 'C:/wamp64/www/betapic/PHPMailer/src/PHPMailer.php';
    require 'C:/wamp64/www/betapic/PHPMailer/src/SMTP.php';
      
        $subject="Mail recover from Betapict ";
        $message4="La team Betapict";
        //$message= $link;
        //$message2= "l'equipe mon site";
        $message3="mmarc71779@gmail.com";

       

       
        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug=0;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';               // Adresse IP ou DNS du serveur SMTP
            $mail->Port = 465;                          // Port TCP du serveur SMTP
            $mail->SMTPAuth = 1;                        // Utiliser l'identification
        
            if ($mail->SMTPAuth) {
                $mail->SMTPSecure = 'ssl';               // Protocole de sécurisation des échanges avec le SMTP
                $mail->Username = 'mmarc71779@gmail.com';   // Adresse email à utiliser
                $mail->Password = 'umkonptumqlrzqvn';      // Mot de passe de l'adresse email à utiliser Mmarc71779@gmail.com123
            }
        
            $mail->CharSet = 'UTF-8'; // Format d'encodage à utiliser pour les caractères
        
            $mail->smtpConnect();
        
            $mail->From = $message3;                 // L'email à afficher pour l'envoi
            $mail->FromName = $message4;             // L'alias à afficher pour l'envoi
        
            $mail->AddAddress(trim($mail_user));
        
            $mail->Subject = $subject;                      // Le sujet du mail
            $mail->WordWrap = 50; 			       // Nombre de caractères pour le retour à la ligne automatique
            //$mail->AltBody = "$message\n$message3\n$message2"; 	       // Texte brut
            $mail->IsHTML(true);                                  // Préciser qu'il faut utiliser le texte brut
            //$mail->MsgHTML("$message3<br><br>$message<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$message2");            // Forcer le contenu du body HTML pour ne pas avoir l'erreur "body is empty" même si on utilise l'email en contenu alternatif
        

            $mail->MsgHTML(" <p>Hello $mail_user,</p>
    
            <p>We have received a request to reset the password for your account. If you did not make this request, please ignore this email.</p>
        
            <p>To reset your password, please click on the link below:</p>
        
            <p><a href=$link>Reset Password</a></p>
        
            <p>The link expires in 5 minutes, so please make sure to do it promptly.</p>
        
            <p>If the link does not work, copy and paste the following URL into your browser: $link</p>
        
            <p>Thank you,<br>
            The Betapictss Team </p>");




            if ($mail->send()) {

                header("Location: fom_forget.php?mail_sent=1 ");     
                exit;
                     //ob_start() ; // Démarrez la mise en mémoire tampon

                     //echo "send";

                 
                    //ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur   
            } else {
                throw new Exception("L'envoi du courrier a échoué");
            }
        } catch (Exception $e) {
            
 

            //ob_start() ; // Démarrez la mise en mémoire tampon
          echo "error";
          

          /*  header("Location: me_contacter.php?messagecon=2");     
                exit;*/
            //ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur    

        }
   }
   
  

?>