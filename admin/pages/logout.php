<?php 
session_destroy();
session_unset();
header("location:?p=dashboard");
exit;
?>