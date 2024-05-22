<?php 

            session_start();

            $_SESSION['authentification']=98610247;

            session_unset(); 
            session_destroy(); 

            header('Location: index.php');

?>