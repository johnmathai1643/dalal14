
<?php
class thisuser
{
private $username,
$iflogged,
$userid;
public function __construct()
	{
	$username=NULL;
	$iflogged=NULL;
	$userid=NULL;
	}
public function db_connection()
	{
  	mysql_connect("localhost","root","vegeta@1993");
	mysql_select_db("test");
	////error_log(mysql_error());
	}
	public function verify_login()
	{
	$this->db_connection();

	//$r=file_get_contents("http://www.pragyan.org/14/cms/codecharacter.php?kookie=".$_COOKIE['PHPSESSID']);
	//&&&&&&&&&&&&&&&&&&&&&&&
	session_start();
	/*
 	$_SESSION['user_mail666'] = $user_mail789;
 	$_SESSION['uid666'] = $row['user_id'];
	 $time789 = time();
	 $key789 = md5($row['user_email'].$row['user_id'].$time789."josuru");
	 $_SESSION['hash666'] = $key789;
	*/
	$sessionvar131=mysql_real_escape_string($_SESSION['user_mail666']);
	$sessionvar132=mysql_real_escape_string($_SESSION['uid666']);
	$sessionvar133=mysql_real_escape_string($_SESSION['hash666']) ;
	 if((!$sessionvar131) || (!$sessionvar132) || (!$sessionvar133))
	 {
	 	return false;
	 }
//var_dump($_SESSION);

	$querycheck134="select * from `pragyanV3_users` where `user_email` = '".$sessionvar131."' and `user_id` = '".$sessionvar132."' and `hash_789987` = '".$sessionvar133."'";
	$doquery134=mysql_query($querycheck134);

	////////////
//	echo $querycheck134;

	////////////

	if(mysql_error())
		return false;
	else
	{

		/////////////////
//	var_dump(mysql_fetch_array($doquery134));
				//return;

		//////////////

		if($fetchvar135=mysql_fetch_array($doquery134))
		{

			if(!(isset($fetchvar135['user_name']) && isset($fetchvar135['timestamp789987'])))
				return false;
			else
			{

				$time136=time();//new time
				$user_email136=mysql_real_escape_string($fetchvar135['user_email']);
				$user_id137=mysql_real_escape_string($fetchvar135['user_id']);
				$user_time137=mysql_real_escape_string($fetchvar135['timestamp789987']);//old time
				$old_hash138=md5($user_email136.$user_id137.$user_time137."josuru");
				if(!($old_hash138==$_SESSION['hash666']))
				{

					return false;
				}




				$hash138=md5($user_email136.$user_id137.$time136."josuru");
				$query139 = "update `pragyanV3_users` set `hash_789987`= '".$hash138."' , `timestamp789987`='".$time136."'where `user_email` = '".$user_email136."' and `user_id` = '".$user_id137."'"; 
				//var_dump($query139);
				//exit();
				

				$do_query140=mysql_query($query139);
				/*
	var_dump($user_time137);			
												var_dump($old_hash138);
								var_dump($time136);
								var_dump($hash138);
*/

				$uid=$user_id137;
				

				if(mysqL_error())
				{
					return false;
				}
				else
				{
					$_SESSION['user_mail666'] = $user_email136;
					 $_SESSION['uid666'] =$user_id137;
 					$_SESSION['hash666'] = $hash138;

					$sql_1=mysql_query("SELECT `userid` FROM `users1` WHERE `facebook_id`='$uid'");

					if(!mysql_num_rows($sql_1))
					{
					return false;
					}
					else
					{
					$getone=mysql_fetch_array($sql_1);
						$theuseridmain_1=$getone[0];
						$sql_2=mysql_query("SELECT * FROM `users` WHERE `userid`='{$theuseridmain_1}'");
						//error_log("@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@");
						//error_log(mysql_error());

						if(!mysql_num_rows($sql_2))
							{
								return false;
							}
						else 	{
								$getsql_3=mysql_fetch_array($sql_2);
								$this->username=mysql_real_escape_string($getsql_3[1]);
								$this->userid=mysql_real_escape_string($getsql_3[0]);
								$this->iflogged=1;
								//error_log(json_encode($getsql_3));
								var_dump($user_time137);
								var_dump($old_hash138);
								var_dump($time136);
								var_dump($hash138);
						
									var_dump($this);

								return true;
								}	
					}

			
				}	
		}
	}

	}
}
}



$user_load=new thisuser;
$gohere=$user_load->verify_login();
//var_dump($user_load);
?>


