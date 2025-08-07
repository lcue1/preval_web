<?php

// /preval_web/utils/FlashMessage.php
class FlashMessage {
    public static function set($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]); // Elimina el mensaje después de leerlo
            return $message;
        }
        return null;
    }
}

?>