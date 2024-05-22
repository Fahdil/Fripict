<?php
  session_start();

  include 'header.php';      
  include 'nav_crea_inscr.php';

  $messagecon = ""; // Initialisez une variable pour stocker le message
  $messa=0;

if (isset($_GET['messagecon'])) {
 
    if ($_GET['messagecon'] == 1) {
      $messa=$_GET['messagecon'];
        $messagecon = "E-mail has been sent successfully.";
    } elseif ($_GET['messagecon'] == 2) {
      $messa=$_GET['messagecon'];
        $messagecon = "The mail has not been sent, please try again.";
    }
    
}else echo"";
 

?>
  <section class="inscription">
 

        <h1  class="form2_inscription" id="connexionh1">Contact us</h1>



          <div class="container">
            <form class="row g-2 " action="tt_contacter.php" method="post" id="form2" > 


            <?php
                

              
                  if ($messa == 1) {   ?>  
                    <label id="erreur_succes" for="mail" class="form-label">  <?php echo  $messagecon; ?> </label><?php
                  } elseif ($messa == 2) {  ?>
                    <label id="erreur_succes" for="mail" class="form-label">  <?php echo  $messagecon; ?> </label>
            <?php    }
                  

              ?>

              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Object</label>
                <input type="text" class="form-control" id="m_Objet" name="m_Objet">
              </div>

              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="m_Nom_pre" name="m_Nom_pre">
              </div>

              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Phone Number</label>
                <input type="tel" pattern="[0-9+ ]*" class="form-control" id="m_Numero" onkeyup="ajouterEspace()" name="m_Numero" placeholder="+33 00 00 00 00 00">
    
              </div>

              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" id="m_Email" aria-describedby="email" required name="m_Email" placeholder="prenom.nom@aazzz.org">
              </div>

              


              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Message</label>
                <textarea id="m_Message" name="m_Message" rows="7" cols="50"> </textarea>
              </div>

              <div class="row my-3" id="div_button_ins">
                    <div ><button class="btn btn-outline-primary" type="submit">Submit</button></div>              
              </div>
                    
            </form>
          </div>




                    

    
  </section>

                  <script>
                        function ajouterEspace() {
                            // Récupérer la valeur de l'input
                            var input = document.getElementById("m_Numero");
                            var valeur = input.value;

                            // Supprimer tous les espaces actuels
                            valeur = valeur.replace(/\s/g, "");

                            // Ajouter un espace après chaque série de trois caractères
                            valeur = valeur.replace(/(\d{3})(?=\d)/g, "$1 ");

                            // Réaffecter la valeur à l'input
                            input.value = valeur;
                        }

                      
                         

                   
                       

                    </script>

    
                    
<?php 
  include 'footer.php';
?> 
