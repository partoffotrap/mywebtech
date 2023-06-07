<?php
function doMenu($item){
    echo '<ul>';
    foreach ($item as $key => $menuItem) {
        if (is_string($key)) {
            echo '<li>' . $key;
            doMenu($menuItem);
            echo '</li>';
        } else {
            if ($key < 3) {
                echo '<li><a href="' . $menuItem['url'] . '">' . $menuItem['title'] . '</a></li>';
            } else {
                echo '<li><button>' . $menuItem['title'] . '</button></li>';
            }
        }
    }
    echo '</ul>';
}
doMenu($menu);
?>
