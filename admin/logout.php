<?php
echo '<script>alert("Farewell")</script>';
session_start();
$_SESSION["id"] = "";
session_destroy();
header('location: ../index.php');
