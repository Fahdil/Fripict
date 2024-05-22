<?php
 
// Formulaire de changement de mot de passe 
// quand l'utilisateur entre son mail,
//1-on verifie si il est valide (si le mail existe dans la bdd)
//2-si le mail est valide, on lui envoie le lien de changement de mot de passe via forgetpwd.php 
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

                                

                            <form method="post" action="forgetpwd.php">

                            <h1>BETAPICT</h1>

                            <h2>Password recover</h2>

                            <label for="email">Confirmer Votre mail :</label>
                            <input type="email" name="email" required><br><br>

                            <input type="submit" value="Send recover mail"> <br><br>

                                                <?php
                                                    // Vérifie si le paramètre mail_sent est présent dans l'URL
                                                    if (isset($_GET['mail_sent']) && $_GET['mail_sent'] == 1) {
                                                        echo ' Mail envoyé avec succès ';
                                                    }
                                                ?>

                            </form>



          </section>           
                           

</body>
</html>
