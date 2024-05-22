<?php

session_start(); // Pour les massages

  if(isset($_POST["submit"])){
    addproduct();
    productimg();
    echo "ccfv";
  }

?>
<?php
 
     function addproduct(){
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


                ///////cette partie concerne l'ajjout d'un repas'
                                if(htmlentities($_POST['le_nomprod'])!=NULL){
                                  // Contenu du formulaire D'AJOUT DE REPAS' :
                                $nomauth =  htmlentities($_POST['le_nomprod']);
                                $imgname = basename($_FILES["image"]["name"]);
                      
                                
                                if ($stmt = $mysqli->prepare("INSERT INTO qote (auteur, immg) VALUES (?,?)")) {
                                    $stmt->bind_param("ss", $nomauth, $imgname);
                                  

                                    if($stmt->execute()) {
                                      echo "ccfv";
                                      
                                        $_SESSION['message'] = "Ajout réussi";
                                    } else {
                                        $_SESSION['message'] =  "Impossible d'enregistrer";
                                    }
                                  }
                                }

                // Redirection vers la page d'accueil 

               
            } 

?>







<?php
   function productimg(){

               
                    $target_dir = "../quote/"; // répertoire de destination pour enregistrer l'image
                    $target_file = $target_dir . basename($_FILES["image"]["name"]); // chemin complet du fichier à télécharger
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  
                    // Vérifier si l'image est réelle ou fausse
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                      $uploadOk = 1;
                    } else {
                      echo "Le fichier n'est pas une image.";
                      $uploadOk = 0;
                    }
                  
                    // Vérifier si le fichier existe déjà
                    if (file_exists($target_file)) {
                      echo "Le fichier existe déjà.";
                      $uploadOk = 0;
                    }
                  
                    // Vérifier la taille maximale du fichier
                    if ($_FILES["image"]["size"] > 8000000) {
                      echo "Le fichier est trop volumineux.";
                      $uploadOk = 0;
                    }
                  
                    // Autoriser certains formats de fichiers
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"  && $imageFileType != "PNG") {
                      echo "Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
                      $uploadOk = 0;
                    } 
                  
                    // Vérifier si $uploadOk est défini à 0 par une erreur
                    if ($uploadOk == 0) {
                      echo "Désolé, votre fichier n'a pas été téléchargé.";
                  
                    // Si tout est correct, télécharger le fichier
                    } else {
                      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "Le fichier ". htmlspecialchars( basename( $_FILES["image"]["name"])). " a été téléchargé.";
                      } else {
                        echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
                      }
                    }

                      // Utilisation de header("Location: " . $_SERVER['HTTP_REFERER']);
         header("Location: " . $_SERVER['HTTP_REFERER']);
         exit; // Assurez-vous d'utiliser exit() après un header("Location") pour arrêter l'exécution du script actuel
        
            

                  

   }


?>













<?php
        function add_b_file(){
                         $target_dir = "../quote/";
                                    // Étape 1 : Chargez l'image depuis le système de fichiers
                    $target_file = $target_dir . basename($_FILES["image"]["name"]); // chemin complet du fichier à télécharger

                    $imageData = file_get_contents($target_file);

                    // Étape 2 : Connexion à la base de données
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
                          

                    // Étape 3 : Insérez l'image dans la table
                    $stmt = $mysqli->prepare("INSERT INTO quote (immg) VALUES (?)");
                    $stmt->bind_param("b", $imageData);

                    if ($stmt->execute()) {
                        echo "L'image a été insérée avec succès dans la base de données.";
                    } else {
                        echo "Erreur lors de l'insertion de l'image : " . $stmt->error;
                    }

                    // Fermeture de la connexion
                    $stmt->close();
                    $mysqli->close();

        }
?>