<?php
    require_once "db.php";
    require_once "func.php";
    
    $lang = isset($_GET["lang"]) ? $_GET["lang"] :    
            (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 1);
    setcookie('lang', $lang, time() + (86400 * 30), "/");
    
    $page = isset($_GET["page"]) ? $_GET["page"] : getMainPage($lang, $conn);

    include "header.php";
    include "main.php";
    include "footer.php";

    mysqli_close($conn);
?>