<?php
session_start();
$user = array('firstname', 'lastname', 'username', 'password', 'confirmpassword',
				'phone', 'email');
$count=0;
foreach($user as $userdata){
	if(empty($_POST[$userdata])){
		$output= "EMPTY $userdata FIELD";
		include_once 'register.html.php';
		break;
		}
	elseif($_POST['password'] != $_POST['confirmpassword']){
		$output= "Pasword and Confirm Password Doesn't match";
		include_once 'register.html.php';
		break;
		}
	elseif(isset($_POST['username']) && $count ==6){
		$name = trim($_POST['username']);
		include 'mysqlconnect.php';
		$users = array();
		$query = "SELECT username FROM users";
		$result = mysqli_query($link, $query);
		while($row = mysqli_fetch_array($result)){
			if($name == $row['username']){ $output = "Please Choose Any Other Username as $name is Already Taken";$available='no'; include_once 'register.html.php';}
			else{ $available = 'yes';
			}
			}
			}
			$count++;
			}
	        if($count==7 && $available == 'yes'){
		$output="Dear {$_POST['username']}, You've Successfull Registered..";
		foreach($user as $userdata){
		$_SESSION[$userdata]=$_POST[$userdata];
		}
		//$_POST['timeofregistration'] = NOW();
		//include member page and move data into database
		include 'mysqlconnect.php' ; //establish connection
		$insertuserdata = "INSERT INTO USERS 
					(first_name, last_name, username, password, phone, email, dob, gender,date_time_of_registration)
					VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['username']}', 
						'{$_POST['password']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['year']}-{$_POST['month']}-{$_POST['day']}', 
						'{$_POST['gender']}', NOW() )" ;
		if(!mysqli_query($link, $insertuserdata)){
			echo "mysqli_error()" ;
			}
			include 'addressform.html.php';
		exit();
		
		
		}

?>

	