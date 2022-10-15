<?php

// add parameters
function signup(){          //function to sign up user
	if(count($_POST)>0){        //check if data exists
		// check if the fields are empty
		if (empty($_POST['email'] || empty($_POST['password']))) {
			echo '1 or more fields are empty!';
		}
		else {
			// check if the email is valid
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				echo('You have entered invalid email!');
			}
			else{
				// check if password length is between 8 and 16 characters
				if(strlen($_POST['password'])<8 || strlen($_POST['password'])>16) {
					echo('Please choose a password between 8 and 16 characters');
				}
				else {
					// check if the password contains at least 2 special characters
					$specialchar=['#','@','&','*','!','$','%','^','(',')','+','=','-','_','/','~'];
					$scexist=false;
					foreach($specialchar as $c){
						if(strstr($_POST['password'],$c)) $scexist=true;
					}
					if(!$scexist) {
						echo'Password should contain atleast 2 Special Characters';
					}
					else {
						if(!file_exists('../data/banned.csv.php')) die ('The banned.csv.php file does not exist');
						$Bemail=[];
						if (($fp = fopen('../data/banned.csv.php', 'r')) !== FALSE) {
							while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {
								$Bemail[]= $data;
							}
							fclose($fp);
						}
						if ($Bemail[0][0]==$_POST['email'] || $Bemail[1][0]==$_POST['email'] || $Bemail[2][0]==$_POST['email']) {
							echo 'You have entered an Email which has been banned.';
						}
						else{

							$fu = file_get_contents('../data/users.csv.php');
							if (strpos($fu, $_POST['email']) !== false) {
								echo 'You have entered an already registered Email.';
							}
							else {
								$user_add = array(
									[$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT)]
								);
								$fu =fopen('../data/users.csv.php','a');
								foreach ($user_add as $fields) {
									fputcsv($fu, $fields,';');
								}
								echo 'User account created successfully!!';
								fclose($fu);
							}
						}
					}
				}
			}
		}
	}
}

// add parameters
function signin(){
	if(count($_POST)>0){
		if (!empty($_POST['email'] && !empty($_POST['password']))) {
			if(!file_exists('../data/banned.csv.php')) die ('The banned.csv.php file does not exist');
			$Bemail=[];
			if (($fp = fopen('../data/banned.csv.php', 'r')) !== FALSE) {
				while (($data = fgetcsv($fp, 1000, ";")) !== FALSE) {
					$Bemail[]= $data;
				}
				fclose($fp);
			}
			if ($Bemail[0][0]==$_POST['email'] || $Bemail[1][0]==$_POST['email'] || $Bemail[2][0]==$_POST['email']) {
				echo 'You have entered an Email which has been banned.';
			}
			else{
				if (!file_exists('../data/users.csv.php')) die ('The user.csv.php file does not exist');

				$userdetail=[];
				if (($fu = fopen('../data/users.csv.php', 'r')) !== FALSE) {
					while (($data = fgetcsv($fu, 1000, ";")) !== FALSE) {
						$userdetail[]= $data;
					}
					fclose($fu);
				}
				$fileuser = file_get_contents('../data/users.csv.php');
				$userArray = explode(';',$fileuser);
				if (strpos($fileuser, $_POST['email']) !== false) {
					for($x=0; $x<=count($userdetail)-1; $x++) {
						if(password_verify($_POST['password'], $userdetail[$x][1]) !== false) {
							$_SESSION['logged']=true;
							echo "You have successfully logged in to the website.";
							header("location: ../index.php");
						}
					}
				}
			}
		}
	}
}


function signout(){
	if($_SESSION['logged']==false) {
		header('location: ../index.php');
	}
	if ($_SESSION['logged']==true) {
		$_SESSION['logged']=false;
		session_destroy();
		header('location: ../index.php');
	}
}
function is_logged(){
	if(isset($_SESSION['logged'])) {
		if ($_SESSION['logged']==true) {
			return true;
		}
		else {
			return false;
		}
	}
}
