<?php 
$p= $_GET['p'];

function load_page($page)
{
if($page == null)
$page = "dashboard";
require 'pages/'.$page.'.php';
}
load_page($p);
 ?>
