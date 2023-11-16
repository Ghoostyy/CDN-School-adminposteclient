<?php
$path = "";

if (isset($_GET['path'])) {
    $fileName = $_GET['path'];
    $filePath = 'uploads/' . $fileName;

    if (!file_exists($filePath)) {
        echo 'Erreur: mauvais chemin';
        return;   
    }

    $path = $_GET['path'] .'/';
}

$goodPath = str_replace("uploads/", "", $path) . "";

$files = glob("uploads/$path*");

if (!empty($files)) {
    echo '<ul>';
    foreach ($files as $file) {
        if (is_dir($file) && $file != '.' && $file != '') {
            $link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $fileName = basename($file);
            echo '<li>';
            echo '<a href="' . $link . '?path=' . $goodPath . $fileName . '">' . $fileName . '</a>';
            echo ' | ';
            echo '<a href="delete.php?dir=true&file=' . urlencode($goodPath . $fileName) . '">Supprimer</a>';
            echo '</li>';
            continue;
        }

        $fileName = basename($file);
        echo '<li>';
        echo '<a href="' . $file . '" download>' . $fileName . '</a>';
        echo ' | ';
        echo '<a href="download.php?file=' . urlencode($goodPath . $fileName) . '">Télécharger</a>';
        echo ' | ';
        echo '<a href="delete.php?file=' . urlencode($goodPath . $fileName) . '">Supprimer</a>';
        echo '</li>';
    }
    echo '</ul>';
}
?>
