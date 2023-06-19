<?php
include "./db.php";

function renderList($data) {
    $result = '';
    if ($data['hasChildren']) {
        $result .= '<div class="list-item list-item_open" data-parent>';
        $result .= '    <div class="list-item__inner">';
        $result .= '        <img class="list-item__arrow" src="src/assets/img/chevron-down.png" alt="chevron-down" data-open>';
        $result .= '        <img class="list-item__folder" src="src/assets/img/folder.png" alt="folder">';
        $result .= '        <span>' . $data['name'] . '</span>';
        $result .= '    </div>';
        $result .= '    <div class="list-item__items">';
        foreach ($data['items'] as $item) {
            $result .= renderList($item);
        }
        $result .= '    </div>';
        $result .= '</div>';
    } else {
        $result .= '<div class="list-item" style="padding-left: 24px ">';
        $result .= '    <div class="list-item__inner">';
        $result .= '        <img class="list-item__folder" src="src/assets/img/folder.png" alt="folder">';
        $result .= '        <span>' . $data['name'] . '</span>';
        $result .= '    </div>';
        $result .= '</div>';
    }
    return $result;
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