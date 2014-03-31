<?php

$dalal_page789 = 'http://localhost/z/config/error.php';
session_start();

if(isset($_SESSION['user_mail789']))
	{header("location.".$dalal_page789);
      exit();
    }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<form action = "login_mail.php" method = "post" enctype="multipart/form-data" style = "top:150px; left:450px; position:absolute; z-index:99">
<label>Mail : </label><input type="text" name ="username" id ="username"/> 
<br />
<br />
<label>Password &#160: </label><input type="password" name ="password" id ="password"/> 
<br />
<br />
<input type ="submit" name  = "login" value ="Sign in" id ="login"/>
</form>
<body></body>
</html>