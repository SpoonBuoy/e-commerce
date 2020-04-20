<?php
session_start();
if($_REQUEST['logout'] == 'yes'){
	$_SESSION['login'] = 0;
	$output = "LOGGED OUT SUCCESSFULLY";
	include_once 'login.html.php';
	}
elseif(!isset($_REQUEST['logout'])){
$count=0;
foreach($_POST as $fields){
	if(empty($fields)){
		$output = "Empty $fields Field";
		include_once 'login.html.php';
	}
	elseif($count==1){
		include 'mysqlconnect.php';
		$username = $_POST['loginusername'];
		$password = $_POST['loginpassword'];
		$usernamecheck = "SELECT username FROM users"; //CHECK WHETHER THE USERNAME IS VALID OR NOT
		$usernames = mysqli_query($link, $usernamecheck);
		while($loginusername = mysqli_fetch_array($usernames)){
			if ($username == $loginusername['username']){ //IF USERNAME FOUND
					$query = "SELECT username,password FROM users WHERE username = '$username' ";
					$result = mysqli_query($link, $query);
					if(!$result){
						$output = "Wrong Username";
						include 'login.html.php';
						}
					else{
					while($login = mysqli_fetch_array($result)){
						$savedpassword = $login['password'];
						if($password == $savedpassword ){
							$output = "LOGGED IN...YEAAAAH";
							$_SESSION['login'] = 1;
							$_SESSION['username'] = $username;
							include_once 'login.html.php';
							break;
							exit();
						}
						else{
						$output = "Wrong Password";
						include_once 'login.html.php';
						exit();
						}
					} //END WHILE LOOP
					} //END ELSE
					} // END USERNAME CHECK IF
			else{continue;} //ELSE CHECK ANOTHER FETCHED USERNAME
			}
		$output = "Wrong Username" ; //AS CHECK COMPLETES AND USERNAME NOT FOUND IN DATABASE
		include_once 'login.html.php';
		
		} //END WHILE LOOP FOR GETTING USERNAME AND PASSWORD
	$count++;
} //END FOREACH
}
?>
		
	