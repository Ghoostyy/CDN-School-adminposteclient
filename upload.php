<html>
    <head>
        <meta http-equiv="refresh" content="3;url=index.php">
    </head>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = isset($_POST['upload_dir']) ? 'uploads/' . $_POST['upload_dir'] : 'uploads'; // Répertoire par défaut : 'uploads'
    $uploadDir = rtrim($uploadDir, '/'); // Supprime le slash final s'il existe

    $targetFile = $uploadDir . '/' . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Vérifie si le fichier existe déjà
    if (file_exists($targetFile)) {
        echo "Le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifie la taille du fichier (limite à 5 Mo ici)
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Le fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Vérifie si $uploadOk est à 0 à cause d'une erreur
    if ($uploadOk == 0) {
        echo "Le fichier n'a pas été upload.";
    } else {
        // Crée le dossier s'il n'existe pas
        if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Télécharge le fichier sur le serveur
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "Le fichier " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a été upload dans le répertoire $uploadDir.";
        } else {
            echo "Une erreur s'est produite lors de l'upload du fichier.";
        }
    }
}
?>
