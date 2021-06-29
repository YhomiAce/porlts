<?php 
session_start();
session_destroy();
session_unset();
header("location:../admin/?p=dashboard");
exit;
?>