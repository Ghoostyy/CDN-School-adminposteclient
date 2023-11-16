<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDN EPSI Solutions</title>
</head>
<body>
    <h1>CDN EPSI Solutions</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="upload_dir">Répertoire d'upload :</label>
        <input type="text" name="upload_dir" id="upload_dir">
        <label for="file">Sélectionnez un fichier :</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload">
    </form>
    <hr>
    <h2>Liste des fichiers :</h2>
    <?php include 'list_files.php'; ?>
</body>
</html>