<?php
if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath = 'uploads/' . $fileName;

    if (file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
    } else {
        echo 'Le fichier demandé n\'existe pas.';
    }
}
?>
