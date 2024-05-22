<?php

        
       
/* Formulaire de changement de mot de passe 
on verifie si il y a bien un token present pour cet utilisateur
on verifie si les mots de passes son conforme puis on le renvoie vers tt_pwdchange.php pour le changement de MDP*/

require_once __DIR__.'/../pages/parampdo.php';       
   if(isset($_GET['u']) && !empty($_GET['u']) ){
        $token = htmlspecialchars(base64_decode($_GET['u']));

        $check = $bdd -> prepare('SELECT * FROM password_recover WHERE token_user = ?');
        $check -> execute(array($token));
        $row = $check->rowCount();

        if($row == 0){
            echo "veillez reessayer";
        }else{
           
        }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" href="../stylcss/recover.css">
</head>
<body>

    

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
 
    <?php if (isset($success)) : ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <section id="section_recover" class="section_recover">

                    

                    <form method="post" action="tt_pwdchange.php">

                    <h1>BETAPICT</h1>

                    <h2>Password recover</h2>
                        
                        <input type="hidden" name="token" value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>" /><br>

                        <div>
                            <label for="password">Nouveau mot de passe :</label>
                            <input type="password" name="password" required><br><br>
                        </div>

                        <div>
                            <label for="password_rep">Confirmer le nouveau mot de passe :</label>
                            <input type="password" name="password_rep" required><br><br>
                        </div>

                        <input type="submit" value="Changer le mot de passe">
                    </form>
        
    </section>

    

</body>
</html>
