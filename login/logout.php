<?php
session_start();
session_destroy();
include('../app/config.php');
header('Location:'.APP_URL.'/login');
?>