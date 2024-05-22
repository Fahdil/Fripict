

<?php
          
        /*  if (isset($_POST["nombre_telechargement"])) {
            echo $_SESSION['nombre_telechargement'];
            $_SESSION['nombre_telechargement'] =$_POST["nombre_telechargement"];
            $_SESSION['nombre_telechargement']+=1;
             echo $_SESSION['nombre_telechargement'];

             
    
        } */

         // Utilisation de header("Location: " . $_SERVER['HTTP_REFERER']);
         header("Location: " . $_SERVER['HTTP_REFERER']);
         exit; // Assurez-vous d'utiliser exit() après un header("Location") pour arrêter l'exécution du script actuel
        
  

?>