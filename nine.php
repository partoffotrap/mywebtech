<?php
include "./db.php";

function renderList($items, $level) {
    $html = ''; // инициализировать пустую строку для хранения HTML-кода

    foreach ($items as $item) {
        if ($item["level"] == $level) {
            $html .= '<div class="list-item list-item_open" data-parent>';
            $html .= '<div class="list-item__inner">';
            $html .= '<img class="list-item__arrow" src="src/assets/img/chevron-down.png" alt="chevron-down" data-open>';
            $html .= '<img class="list-item__folder" src="src/assets/img/folder.png" alt="folder">';
            $html .= $item["name"];
            $html .= '</div>';
            $html .= '<div class="list-item__items">';
            $html .= renderList($items, $item["id"]);
            $html .= '</div>';
            $html .= '</div>';
        }
    }

    return $html; // вернуть код HTML в виде строки
}

function getList() {
    return getAssocResult("SELECT * FROM `list`");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List item</title>
    <link href="nine.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="list-items" id="list-items">
    <?php
    echo renderList(getList(), null);
    ?>
</div>
<script src="nine.js" type="module"></script>
</body>

</html>