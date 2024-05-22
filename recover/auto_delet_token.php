<?php
// Script de nettoyage
require '../pages/parampdo.php'; // Assurez-vous d'inclure le fichier de connexion à la base de données

$sql = "DELETE  FROM  password_recover WHERE expiry_time <= NOW()";
$result = $conn->query($sql);

if ($result) {
    echo "Nettoyage terminé avec succès.";
} else {
    echo "Erreur lors du nettoyage : " . $conn->error;
}

$conn->close();
?>
<?php /*
// Script de nettoyage
require_once __DIR__.'/../parampdo.php'; // Assurez-vous d'inclure le fichier de connexion à la base de données


$delete = $bdd -> prepare('DELETE  FROM  password_recover WHERE expiry_time <= NOW()');
$delete -> execute();

if ($result) {
    echo "Nettoyage terminé avec succès.";
} else {
    echo "Erreur lors du nettoyage : " ;
}

*/
?>
