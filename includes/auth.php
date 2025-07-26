<?php

function directAccesDeniged(){
    //pendiente
}

function verifySession(){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $userName = $_SESSION["name"] ?? "";
    $name = $_SESSION["rolId"] ?? "";
    if (empty($userName) || empty($name)) {
        session_destroy();
        header("Location: /preval_web/public/login.php");
        exit();
    }

}

?>