<?php

session_start();
session_destroy();
echo "<script> window.location.href = '../views/lists/home.list.php' </script>";
die();
?>
