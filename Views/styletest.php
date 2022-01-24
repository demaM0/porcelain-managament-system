<?php
    header("Content-type: text/css; charset: UTF-8");
    require_once('../Models/css-model.php'); 
    $theme = new css(1);
    echo ($theme->ThemeHtml);
?>

