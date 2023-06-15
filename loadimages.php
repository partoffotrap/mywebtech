<?php
include 'ImageResize.php';
use Gumlet\ImageResize;
if (!empty($_FILES)) {
    $uploadDir = 'upload/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    $upload = "upload/full/" . $_FILES['image']['name'];
    $allowedImageTypes = array('image/png', 'image/jpeg');
    $imageMaxSize = 5 * 1024 * 1024; // 5 MB

    // проверка на существование файла
    if (file_exists($uploadFile)) {
        redirectToIndex('error');
    }

    // тип файла
    if (!in_array($_FILES['image']['type'], $allowedImageTypes)) {
        redirectToIndex('error');
    }

    // размер фалйа
    if ($_FILES['image']['size'] > $imageMaxSize) {
        redirectToIndex('error');
    }

    // загрузить файл
    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
        $reply = "ok";
        $image = new ImageResize($upload);
        $image->resizeToHeight(200);
        $image->save("upload/small/" . $_FILES['image']['name']);
    } else {
        $reply = "error";
    }

    redirectToIndex(reply);
}

function redirectToIndex($status) {
    header("Location: index.php?status=$status");
    exit;
}
?>

