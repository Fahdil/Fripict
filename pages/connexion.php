<?php
        session_start();
        
  $titre = "connexion";
  include 'header.php';
  include 'nav_crea_inscr.php';

?>
  <section class="inscription">

        
          <div class="container">
          
            <form class="row g-2 " action="tt_connexion.php" method="post" id="form2"> 
               <h1  class="form2_inscription" id="connexionh1">Connexion</h1>
              <div class="col-md-9" id="div_separator">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="email" required name="mail" placeholder="prenom.nom@aazzz.org">
              </div>
              <div class="col-md-9" id="div_separator">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" required name="password">
              </div>
              <div class="row my-3" id="div_button_ins">
                  <div > 
                         <button class="btn btn-outline-primary" type="submit">Se connecter</button>
                         <a href="/recover/fom_forget.php">Mot de passe oublié</a>
                  </div> 
                    
              </div> 
                    
            </form>
          </div>
    
  </section>
    
                    
<?php 
  include 'footer.php';
?> 
