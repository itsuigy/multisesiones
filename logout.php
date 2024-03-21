<?php
$_SESSION["user"] = null;
$_SESSION["id"] = null;

session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit;