<?php

function directAccesDeniged(){
    //pendiente
}

function verifySession(){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $userName = $_SESSION["userName"] ?? "";
    $name = $_SESSION["name"] ?? "";

    if (empty($userName) || empty($name)) {
        session_destroy();
        header("Location: /preval_web/pages/login.php");
        exit();
    }

}

?>