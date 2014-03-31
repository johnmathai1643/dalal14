<?php
                                                                                             



 ini_set("use_cookies",1);
 ini_set("use_only_cookies",1);

// path for session cookies
$cookie_path = "/";

// timeout value for the cookie
$cookie_timeout = 60 * 30000; // in seconds//60 * 30

// timeout value for the garbage collector
//   we add 300 seconds, just in case the user's computer clock
//   was synchronized meanwhile; 300 secs (5 minutes) should be
//   enough - just to ensure there is session data until the
//   cookie expires
$garbage_timeout = $cookie_timeout + 300; // in seconds //300

// set the PHP session id (PHPSESSID) cookie to a custom value
session_set_cookie_params($cookie_timeout, $cookie_path);

// set the garbage collector - who will clean the session files -
//   to our custom timeout
ini_set('session.gc_maxlifetime', $garbage_timeout);
/*ini_set('session.gc_probability',1); //defaults to 1
 *ini_set('session.gc_divisor',2); //defaults to 100
 * gc_probability / gc_divisor gives probability of the garbage collector
 * being started
 */
// we need a distinct directory for the session files,
//   otherwise another garbage collector with a lower gc_maxlifetime
//   will clean our files aswell - but in our own directory, we only
//   clean sessions with our "own" garbage collector (which has a
//   custom timeout/maxlifetime set each time one of our scripts is
//   executed)





ini_set('session.cookie_domain','.pragyan.org');
ini_set("session.name","PHPSESSID");
ini_set('session.gc_probability', 1);

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include("db.php");

session_start();
   print_r($_SESSION);
echo "http://www.pragyan.org/14/cms/codecharacter.php?kookie=".$_COOKIE['PHPSESSID']."";
$r=-1;//http_get("http://www.pragyan.org/14/cms/codecharacter.php?kookie=".$_COOKIE['PHPSESSID']."");

if($r==-1)
{
echo "Click <a href='http://www.pragyan.org'>here</a> to login first.";
exit();
}

else
{
 $newuserid=0;
$user27=$r;

 $wiiw=mysql_query("SELECT * FROM `users1` WHERE `facebook_id`='$user27'");


 if(!mysql_num_rows($wiiw))
{

	 $user2q=mysql_query("SELECT MAX(`userid`) FROM `users`");
	 $get2=mysql_fetch_array($user2q);


	$thequerysubo=mysql_query("SELECT `user_fullname` FROM `pragyanV3_users` WHERE `user_id`='{$user27}'");


	if(mysql_num_rows($thequerysubo))
	{
		$querysubo_fetc=mysql_fetch_array($thequerysubo);
		$thenamesubo=$querysubo_fetc[0];

		 $lastuserid3=$get2[0];
		 $newuserid=$lastuserid3+1;
		 $password="htgjgjfghjgkg565646!!@";

		 $users1q=mysql_query("INSERT INTO `users`(`userid`,`username`,`email`,`password`,`verified`,`disabled`,`cash`,`sessionid`) VALUES ('{$newuserid}','$thenamesubo','{$email}','{$password}',1,0,10000,'{$user}')");

	}


	 $users1q=mysql_query("INSERT INTO `users1`(`username`,`facebook_id`,`facebook_access_token`,`userid`) VALUES ('$thenamesubo','{$user27}','you you','{$newuserid}')");

}

  else
	{
		header('Location: http://delta.nitt.edu/~steve/dalal14/view/template/');
		 exit();
	}
   
}

?>

$var1="http://www.pragyan.org/14/cms/codecharacter.php?kookie=".$_COOKIE['PHPSESSID'];
$r=file_get_contents($var1);

if($r==-1)
{
echo "Click <a href='http://www.pragyan.org'>here</a> to login first.";
exit();
}

else
{
 $newuserid=0;
$user27=$r;

 $wiiw=mysql_query("SELECT * FROM `users1` WHERE `facebook_id`='$user27'");


 if(!mysql_num_rows($wiiw))
{

	 $user2q=mysql_query("SELECT MAX(`userid`) FROM `users`");
	 $get2=mysql_fetch_array($user2q);


	$thequerysubo=mysql_query("SELECT `user_fullname` FROM `pragyanV3_users` WHERE `user_id`='{$user27}'");


	if(mysql_num_rows($thequerysubo))
	{
		$querysubo_fetc=mysql_fetch_array($thequerysubo);
		$thenamesubo=$querysubo_fetc[0];

		 $lastuserid3=$get2[0];
		 $newuserid=$lastuserid3+1;
		 $password="htgjgjfghjgkg565646!!@";

		 $users1q=mysql_query("INSERT INTO `users`(`userid`,`username`,`email`,`password`,`verified`,`disabled`,`cash`,`sessionid`) VALUES ('{$newuserid}','$thenamesubo','{$email}','{$password}',1,0,10000,'{$user}')");

	}


	 $users1q=mysql_query("INSERT INTO `users1`(`username`,`facebook_id`,`facebook_access_token`,`userid`) VALUES ('$thenamesubo','{$user27}','you you','{$newuserid}')");

}

  else
	{
		header('Location: http://delta.nitt.edu/~steve/dalal14/view/template/');
		 exit();
	}
   
}

?>

