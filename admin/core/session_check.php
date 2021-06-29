<?php
session_start();
if(!isset($_SESSION['porlt_admin']))
{
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>ADMIN LOGIN</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
  <style type="text/css">
  
  html, body {
  height:100%;
  padding: 0;
  margin: 0;
}

html {
 /* background:url('back5.jpg');
}

body {
 // background:rgba(255,255,255,0.5); /* applies a 50% transparent white background */
}

</style>

</head>
<body class="" style="dbackground-image: url('back5.jpg'); background-color: #0090cc;">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
       <section class="m-b-lg" style="margin-top: 30px;">
        <header class="wrapper text-center">
          <strong style="color: white; font-size: 15px;"></strong>
        </header>
        <div style="text-align: center;"><a dclass="navbar-brand block" href="#" style="color: white; font-size: 25px; "><img src="icons/logo.png" width="250" height="100px"></a>
     </div>
        <div style="text-align: center; margin-top: 20px; font-size: 16px; color: red;"><?php echo $log_error; ?> <br><br></div>
       <!-- <form action="#" method="post">-->
          <div class="list-group">
            
            <div class="list-group-item">
              <input type="text" placeholder="Username" id="email" name="user"  class="form-control no-border">
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Password" id="password" name="pass" class="form-control no-border">
            </div>
          </div>
          <button onclick="login();" type="submit" id="submit" class="btn btn-lg btn-primary btn-block">LOGIN</button>
         <br><br>
         
          <!--<div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.html" class="btn btn-lg btn-default btn-block">Create an account</a>-->
       <!-- </form> -->
      </section>
    </div>
  </section>



<script type="text/javascript">
function login()
{
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;

var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var filter3 = /^([a-zA-Z0-9_\.\-])+\@+([gmail.com])+$/;
var filter2 = /^([0-9]{11})+$/;
var filter4 = /^([0-9]{4})+$/;


if(!filter.test(email))
{
 alert("Enter Correct Email Address");
    return false;
}


if(password == "")
{
 alert ("Enter Your Password");
return false;
}



var dataString='email='+email+'&password='+password;
$.ajax({
type:"GET",
url:"process/login.php",
data:dataString,
jsonp:"callback",
jsonpCallback:"Sverify",
dataType:"jsonp",
crossDomain:true,
success: function(data){
var success = data.success;
//var item = data.item;

if (success == "YES")
{
 window.open('?p=dashboard', '_self', 'location=yes');

}
else
{
    alert ("Incorect Login Details");
     $('#submit').empty();
    $('#submit').fadeTo(900, 1);
    $('#submit').append("Login");
 
   return false;
}
},
beforeSend:function()
{
$('#submit').fadeTo(900, 0.3);
$('#submit').empty();
$('#submit').append("Loading ...");

},
error: function(jqXHR, textStatus, errorThrown)
{
    alert ("Can't communicate with server. Try again later");
    $('#signin').empty();
    $('#signin').fadeTo(900, 1);
    $('#signin').append("Login");
 
    }


});
}
</script>


   <script type="text/javascript">
$(document).ready(function() {
var naicash_user = localStorage.getItem("dbnl_user");
document.getElementById("phone").value = dbnl_user;

});
</script>





  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
    <!--  <p>
        <small>Web app framework base on Bootstrap<br>&copy; 2013</small>
      </p>-->
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
</html>
<?php
exit();
}

?>