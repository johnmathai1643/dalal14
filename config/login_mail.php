<?php
/*
// defining the ip address of the mysql server.
define("MYSQL_SERVER","localhost");

// defining the username to connect to the database.
define("MYSQL_USERNAME","root");

// defining the password used to connect to the database.
define("MYSQL_PASSWORD","vegeta@1993");

// defining the name of the database to connect to.
define("MYSQL_DATABASE","test");

// defining the user id of the administrator. WARNING: Only experts should alter this.
define("ADMIN_USERID",1);

// Set Default time zone
date_default_timezone_set('Asia/Calcutta');
*/

$db = mysql_connect("localhost","root","vegeta@1993");

if(!$db)
{
	echo "Sorry not able to connect to database";
	exit();
}
else
	{ 
		mysql_select_db("test");
	 }


$table_name789 = 'pragyanV3_users';
$dalal_page789 = 'http://localhost/z/config/error.php';
$redirect_login789 = 'http://localhost/z/config/index.php';

//checking if the user exists in the database
session_start();

$user_mail789 = mysql_escape_string($_POST['username']);
$password789 = mysql_escape_string($_POST['password']);


if(empty($user_mail789)||empty($password789))
   echo "Incorrect mail id or password.Please enter your Pragyan14 mail id and try again.";
else
{  
   $query789 = "select * from `".$table_name789."` where `user_email` = '".$user_mail789."' and `user_password` = '".$password789."'";
}

echo $query789;
$result789 = mysql_query($query789);
/*echo $result789;
exit();*/
/*var_dump(mysql_error());
exit();
*/
if(!$result789)
{	
    echo "Invalid parameters.Please try again.";
    header("Location:".$redirect_login789);
    exit();
}



/*$row = mysql_fetch_array($result789);
var_dump($row);
exit();*/

if($row = mysql_fetch_array($result789))
{
	/*var_dump($row);
	var_dump(mysql_error());*/

	/*if(empty(mysql_real_escape_string($row['user_id']))||empty(mysql_real_escape_string($row['user_email'])))
	{header("location:".$redirect_login789);
     exit();}
     */
 
 session_start();
 $_SESSION['user_mail666'] = $user_mail789;
 $_SESSION['uid666'] = $row['user_id'];
 $time789 = time();
 $key789 = md5($row['user_email'].$row['user_id'].$time789."josuru");
 $_SESSION['hash666'] = $key789;

 $query790 = "update `".$table_name789."` set `hash_789987`= '".$key789."' ,`timestamp789987`='".$time789."' where `user_email` = '".$user_mail789."'"; 
 
 
 if(mysql_error())
	 { session_unset();
	   session_destroy();	 
	   $_SESSION['user_mail666'] = 0;
       $_SESSION['uid666'] = 0;
       $_SESSION['hash666'] = 0;
       
	   header("location:".$redirect_login789);
	 }

$result790 = mysql_query($query790);
//
 //echo $key789;
 //echo $query790;
 //var_dump(mysql_error());
 //exit();
//

if(!$result790)
{	
    echo "Invalid parameters.Please try again.";
    header("Location:".$redirect_login789);
    exit();
}

 header("location:".$dalal_page789);
 exit();

}
else
{  echo "Error could not connect to database";
    exit();
}


?>














?>
