<?php 
    session_start();
    include 'header.php';

         
        

    include 'test.php';


   /* include 'header.php';
    include 'navindex.php';
    include 'navprod.php';
    include 'search.php';

    session_start();

    if(isset($_SESSION['authentification'])){


      if ( $_SESSION['authentification']==1) {
        
      include 'header.php';
      include 'nadmin.php';
      include 'navprod.php';
      include 'search.php';
   
        
      }else{
        include 'header.php';
        include 'navindex.php';
        include 'navprod.php';
        include 'search.php';
      }

    }else{
        include 'header.php';
        include 'navindex.php';
        include 'navprod.php';
        include 'search.php';
    }*/

  
?>

        <?php
        // ici j'essaie de recuperer la categorie et l'objet de recherche de l'utilisateur et je les attributs la
        //valeur all si ils sont nuls

   

                    if(isset($_GET['search'])) {
                        $_SESSION['search'] = htmlentities($_GET['search']);
                        $search= $_SESSION['search'];    
                    }
                    else{
                        $_SESSION['search'] ="all"; 
                        $search= $_SESSION['search']; 
                    }     

                    if(isset($_GET['categorieviser'])){
                        $_SESSION['categorieviser'] =$_GET['categorieviser'];
                        $categorie= $_SESSION['categorieviser'];
                        
                      } else {
                        $_SESSION['categorieviser'] ="all";
                        $categorie= $_SESSION['categorieviser'];
                        
                      }
                     

       

                        require_once("param.inc.php");
                        $mysqli = new mysqli($host, $name, $passwd, $dbname);
                        $mysqli->set_charset("utf8");

                        if ($categorie == "all" && $search == "all") {
                            $requete = "SELECT COUNT(id) as total FROM product";
                        } elseif ($categorie == "all" && $search != "all") {
                            $requete = "SELECT COUNT(id) as total FROM product WHERE (nom_p='$search' OR commentaire LIKE '%$search%')";
                        } elseif($categorie != "all" && $search == "all") {
                            $requete = "SELECT COUNT(id) as total FROM product WHERE  categorie='$categorie'";
                        }elseif($categorie != "all" && $search != "all") {
                            $requete = "SELECT COUNT(id) as total FROM product WHERE (nom_p LIKE '%$search%' OR commentaire LIKE '%$search%') AND categorie='$categorie' ";
                        }
                         //executer la requete
                        $result = $mysqli->query($requete);

                        if ($result) {
                            //quand la requete marche, on recupere le resultat dans row
                            $row = $result->fetch_assoc();
                            //puis on atribut a total, la valeur de notre count
                            $total = $row['total'];
                            //fermeture de la connexion
                            $mysqli->close();
                            
                                  
                        } else {
                            // Gestion des erreurs :
                            echo "Erreur de requête : " . $mysqli->error;
                            // fermeture de la connexion en cas d'erreur
                            $mysqli->close();
                        }

                          // gestion de l'affichage page par page

                          $nombre_element_par_page=72;
                          $nombre_de_page= ceil($total/$nombre_element_par_page);

                              //on recupere la page
                              if (isset($_GET["page"])) {
                                $_SESSION['page'] = $_GET["page"];
                                $page =$_SESSION['page'];

                            } else {
                                $_SESSION['page'] = 1;
                                $page =$_SESSION['page'];
                                
                            }
                              
                              
                          //on atribut une valeur pour le début de l'affichage en fonction de chaque page
                              $debut=($page-1)*$nombre_element_par_page;


         ?>





    <main id="main_features"> <?php //Le css utilisans cet id est dans index.css ?>
    <?php // id=main_features permet de manipuler toute la nav et est utiliser dans search.css WhERE type='$type' or nom_p='$type' ?>
        
    <?php //Le css du formulaire est réaliser dans search.css ?>


            <section id="features_section_show_product">
        <?php /*<h1> <?php echo $categorie  ?> </h1>
                 <h1> <?php echo $search  ?> </h1>
                 <h1> <?php echo $debut  ?> </h1>
                 <h1> <?php echo $nombre_element_par_page  ?> </h1>
                 <h1> <?php echo $total  ?> </h1> */?>

                        
          
                    <?php

                  
                    require_once("param.inc.php");
                    $mysqli = new mysqli($host, $name, $passwd, $dbname);
                    $mysqli->set_charset("utf8");
                    if ( $categorie=="all" and $search=="all" ) {
                        $requete = "SELECT * FROM product ORDER BY id LIMIT $debut, $nombre_element_par_page ";
                    }
                    elseif( $categorie=="all" and $search!="all" ) {
                        $requete = "SELECT * FROM product WHERE (nom_p LIKE '%$search%' or commentaire LIKE '%$search%') ORDER BY id LIMIT $debut, $nombre_element_par_page ";
                    }
                    elseif($categorie != "all" && $search == "all"){
                        $requete = "SELECT * FROM product WHERE categorie='$categorie' ORDER BY id LIMIT $debut, $nombre_element_par_page"; 
                    }
                    elseif($categorie != "all" && $search != "all"){
                        $requete = "SELECT * FROM product WHERE (nom_p LIKE '%$search%' OR commentaire LIKE '%$search%') AND categorie='$categorie' ORDER BY id LIMIT $debut, $nombre_element_par_page"; 
                    }
                    $resultats = $mysqli->query($requete);
                    while ($ligne = $resultats->fetch_assoc()) {
                        $compteur=0;
                    ?>
                     
                    

                   
                             <form class="form3" action="tt_location.php" method="POST">

                            
                            <div>

                                <script src="tt_downloadb.js"></script>
                                
                                
                                <img id="<?php echo $ligne['id'];?>" src="images/<?php echo $ligne['img']?>" alt="<?php echo $ligne['nom_p']; ?>">
                               
                                <?php //<p> download <i class="fa fa-download" aria-hidden="true"></i></p>?>
                                <button id="jpg" onclick="telechargerImage_jpg(<?php echo $ligne['id'];?>,'<?php echo $ligne['nom_p'];?>')" type="submit">jpg</button>
                                <button id="png" onclick="telechargerImage_png(<?php echo $ligne['id'];?>,'<?php echo $ligne['nom_p'];?>')" type="submit">png</button>
                                <h5><?php if($categorie =='couleur'){echo $ligne['nom_p'];} else echo" ";  ?></h5>
                            
                            </div>   
                                </form>
                  


                  


                    <?php 
                    
                    }

                    

                    $mysqli->close();
                    ?>     
                               
            
            </section>
         

    </main>
        
    <!-- Pagination le css concernant cette partie est dans search.css 
                                    <div class="pagination">
                                        <button id="prev">Précédent</button>
                                        <span>VOIR PLUS</span>
                                        <button id="next">Suivant</button>
                                    </div>-->

                                    <div class="pagination">
                                         <?php 

                                                for ($i=1; $i <=$nombre_de_page ; $i++) { 
                                                    echo "<a href='index.php?page=$i&categorieviser=$categorie&search=$search'>$i</a>&nbsp;";
                                                    
                                                    
                                                }

                                               
                                            ?>
                                    </div>
        
          

<?php include 'footer.php' ?>






