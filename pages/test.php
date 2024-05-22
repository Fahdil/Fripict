

<?php
          
  

?>
            <!-- cet id est utiliser dans search.css-->
            <div id="div_test_responsivite">

                        <div>
                                    <?php   
                                    if(isset($_SESSION['authentification'])){


                                                    if ( $_SESSION['authentification']==1) {
                                                    
                                                    include 'nadmin.php';

                                                    
                                                    }else{
                                                    include 'navindex.php';
                                                    }

                                                    }else{
                                                    include 'navindex.php';
                                                    }

                                    ?>
                        </div>


                        <div>
                                       <?php
                                            
                                            include 'navprod.php';
                                            
                                        ?>
                        </div>

                        <div>
                                       <?php
                                            
                                            include 'search.php';
                                        
                                        
                                        ?>
                        </div>


                        
                
            </div>

            


