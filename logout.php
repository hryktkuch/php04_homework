<?php
require_once('funcs.php');
session_start();

$_SESSION = [];

if (isset($_COOKIE[session_name()])) { 
    setcookie(session_name(), '', time() - 42000, '/');
}

session_destroy();

header("Location: login.php");
exit();
?>
