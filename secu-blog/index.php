<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

session_start();


require "config/autoload.php";

$newTokenManger = new CSRFTokenManager();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = $newTokenManger->generateCSRFToken();
}

$router = new Router();

$router->handleRequest($_GET);
