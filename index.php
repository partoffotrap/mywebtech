<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyGallery</title>
</head>
<body>
<h1>Добро пожаловать в мою галерею</h1>
<form method="post" enctype="multipart/form-data" action="loadimages.php">
     Добавить новый файл в галерею:
    <input type="file" name="image" accept=".jpeg,.png,.jpg">
    <input type="submit" value="Upload">
</form>
<div style="display:flex; padding: 10px; column-gap:15px; flex-wrap: wrap">
<?php
include 'gallery.php';
ShowingImages('upload/', 200);
?>
</div>
</body>
</html>