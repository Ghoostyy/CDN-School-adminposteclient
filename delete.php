<html>
    <head>
        <meta http-equiv="refresh" content="3;url=index.php">
    </head>
</html>

<?php

function is_dir_empty($dir) {
  return is_dir($dir) && (count(scandir($dir)) == 2);
}

function remove_recursive($filepath) {
    if (file_exists($filepath)) {
        $files = glob("$filepath/*");
        
        foreach ($files as $file) {
            if ($file == ".." || $file == "." || $file == "") {
                continue;
            }

            if (is_dir($file)) {
                if (is_dir_empty($file)) {
                    rmdir($file);
                } else {
                    remove_recursive($file);
                }
            } else if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($filepath);
    }
}

if (isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];
    $filePath = 'uploads/' . $fileToDelete;

    if (file_exists($filePath)) {
        if (isset($_GET['dir'])) {
            remove_recursive($filePath);
            echo "Le dossier $fileToDelete a été supprimé.";
        } else {
            unlink($filePath);
            echo "Le fichier $fileToDelete a été supprimé.";
        }
    } else {
        echo "Le fichier $fileToDelete n'existe pas.";
    }
} else {
    echo "Aucun fichier spécifié pour la suppression.";
}
?>