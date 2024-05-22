<?php
     session_start();

        if(isset($_SESSION['authentification'])){


          if ( $_SESSION['authentification']==1) {
          
          include 'header.php';
          include 'nadmin.php';
       
            
          }else{
            header('Location: connexion.php');
          }

        }else{
          header('Location: connexion.php');
        }

       
       
   
   
  

?>
    <h1  class="form2_inscription" margin-tpr="3%">Nouvelle Image </h1>
    <div class="container">
      
      <form class="row g-2 " action="tt_add_pict.php" method="post" id="form2" enctype="multipart/form-data"> 
        <div class="col-md-9">
          <label for="nom" class="form-label">Nom du produit </label>
          <input type="text" class="form-control" id="nom" required name="le_nomprod">
        </div>
        <div class="col-md-9">
          <label for="prenom" class="form-label">Categorie</label>
              <select class="form-control" id="prenom" name="le_typeprod" required >
                  <option value="art">Arts</option>
                  <option value="animaux">Animaux</option>
                  <option value="ange">Anges</option>
                  <option value="nature">Nature</option>
                  <option value="animes">Animes</option>
                  <option value="nouriture">Nouritures et Cuisine</option>
                  <option value="dessins">Dessins</option>
                  <option value="couleur">Couleurs</option>
                  <option value="wallpapper">wallpapper</option>
                  <option value="homme">Hommes</option>
                  <option value="objet">Appareils et objets</option>
                  <option value="demons">Démons</option>
                  <option value="extraterestre">Extraterestres</option>
                  <option value="Mythologie">mythologie</option>
                  <option value="autres">Autres</option>
              </select>
        </div>
        <div class="col-md-9">
          <label for="pass" class="form-label">img</label>
          <input type="text" class="form-control" id="pass" required name="img">
        </div>
        <div class="col-md-9" id="ajoutrepas">
          <label for="pass" class="form-label">Description</label>
          <input type="text" class="form-control" id="pass" required name="le_description">
        </div>
        <div class="col-md-9">
        <label for="pass" class="form-label">Ajouter une image</label>


        <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 300px; max-height: 300px;">
        

            
                <input id="imageInput" type="file" name="image" enctype="multipart/form-data" onchange="afficherImage()" required>
            
        </div>
        <div class="row my-3">
      <div class="d-grid gap-2 d-md-block">
        <button class="btn_add_product_on_add_product" type="submit" name="submit">Ajouter</button></div>   
      </div>
              
      </form>
 
      
    </div>





    <script>
        function afficherImage() {
            var imageInput = document.getElementById('imageInput');
            var imagePreview = document.getElementById('imagePreview');

            if (imageInput.files && imageInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
                    
<?php 
  include 'footer.php';
?> 