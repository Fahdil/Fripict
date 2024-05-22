
                             
                  
                  
               
                        function telechargerImage_jpg(id_telechargement, nom) {
                            // Récupérer l'élément image
                            var image = document.getElementById(id_telechargement);
                            
                            // Récupérer le lien de l'image
                            var imageSrc = image.src;

                            // Extension
                            var nomexten = nom + ".jpg";

                            // Créer un élément <a> pour le téléchargement
                            var lienTelechargement = document.createElement('a');
                            lienTelechargement.href = imageSrc;
                            lienTelechargement.download = nomexten; // Le nom par défaut pour le téléchargement
                            lienTelechargement.style.display = 'none'; // Cacher le lien

                            // Ajouter le lien au DOM
                            document.body.appendChild(lienTelechargement);

                            // Cliquez sur le lien pour déclencher le téléchargement
                            lienTelechargement.click();

                            // Supprimer le lien du DOM
                            document.body.removeChild(lienTelechargement);

                          
                        }
                  



                    
                        function telechargerImage_png(id_telechargement, nom) {
                            // Récupérer l'élément image
                            var image = document.getElementById(id_telechargement);
                        
                            // Récupérer le lien de l'image
                            var imageSrc = image.src;
                        
                            // Extension
                            var nomexten = nom + ".png";
                        
                            // Créer un élément <a> pour le téléchargement
                            var lienTelechargement = document.createElement('a');
                            lienTelechargement.href = imageSrc;
                            lienTelechargement.download = nomexten; // Utilisez la variable nomexten ici
                            lienTelechargement.style.display = 'none'; // Cacher le lien
                        
                            // Ajouter le lien au DOM
                            document.body.appendChild(lienTelechargement);
                        
                            // Cliquez sur le lien pour déclencher le téléchargement
                            lienTelechargement.click();
                        
                            // Supprimer le lien du DOM
                            document.body.removeChild(lienTelechargement);
                        }
                  
                
         


