<?php 
        session_start(); // Pour les messages

       

       /* if(isset($_POST['m_Objet'])){
            $subject=htmlentities($_POST['m_Objet']);
        }
        if(isset($_POST['m_nom_pre'])){
            $message4=htmlentities($_POST['m_Mom_pre']);
        }
        if(isset($_POST['m_message'])){
            $message=htmlentities($_POST['m_Message']);
        }
        if(isset($_POST['m_Numero']) ){
          /*  if (preg_match('/^[0-9]+$/', htmlentities($_POST['m_Numero']))) {
                header("Location: me_contacter.php");     
                exit;
            }else {
                $message2= htmlentities($_POST['m_Numero']);
            }
            
        }
        if(isset($_POST['m_Email'])){
            $message3=htmlentities($_POST['m_Email']);
        }*/

        $subject=htmlentities($_POST['m_Objet']);
        $message4=htmlentities($_POST['m_Nom_pre']);
        $message=htmlentities($_POST['m_Message']);
        $message2= htmlentities($_POST['m_Numero']);
        $message3=htmlentities($_POST['m_Email']);

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'C:/wamp64/www/betapic/PHPMailer/src/Exception.php';
        require 'C:/wamp64/www/betapic/PHPMailer/src/PHPMailer.php';
        require 'C:/wamp64/www/betapic/PHPMailer/src/SMTP.php';

       
        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug=2;
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
        
            $mail->AddAddress(trim('marc32994@gmail.com'));
        
            $mail->Subject = $subject;                      // Le sujet du mail
            $mail->WordWrap = 50; 			       // Nombre de caractères pour le retour à la ligne automatique
            $mail->AltBody = "$message\n$message3\n$message2"; 	       // Texte brut
            $mail->IsHTML(false);                                  // Préciser qu'il faut utiliser le texte brut
            $mail->MsgHTML("$message\n$message3\n$message2");            // Forcer le contenu du body HTML pour ne pas avoir l'erreur "body is empty" même si on utilise l'email en contenu alternatif
        
            if ($mail->send()) {
               
                     //ob_start() ; // Démarrez la mise en mémoire tampon

                   

                    header("Location: me_contacter.php?messagecon=1");     
                        exit;
                    //ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur   
            } else {
                throw new Exception("L'envoi du courrier a échoué");
            }
        } catch (Exception $e) {
            

            //ob_start() ; // Démarrez la mise en mémoire tampon

          

            header("Location: me_contacter.php?messagecon=2");     
                exit;
            //ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur    

        }
        

        ?>

