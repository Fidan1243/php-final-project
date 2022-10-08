<?php
    function getRequests() {
        foreach($_REQUEST as $var => $value) {
            $GLOBALS[$var] = $value;
        }
    }

    function getMainPage($lang, $conn) {
        $sql = "SELECT * FROM `category` WHERE `lang`=$lang ORDER BY `order` LIMIT 1";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        return $row["id"];
    }

    function checkLogin() {
        session_start();
        if ( !isset($_SESSION["user"]) ||
            isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout" ) {
            session_unset();
            session_destroy();
            header("Location: login.php");
            die();
        }
    }
?>