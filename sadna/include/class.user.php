<?php  
	include 'connection.php';

	class User{
	public $db;

	/* for registration  */
// public function reg_user($name,$username,$password,$email,$age,$color,$style){
// $conn = db();
// $password = md5($password);
// $sql="SELECT * FROM users WHERE uname='$username' OR uemail='$email'";

// //checking if the username or email is available in db
// $check = $conn->query($sql);
// $count_row = $check->num_rows;


// //if the username is not in db then insert to the table
// if ($count_row == 0){
// $sql="INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email', age='$age', color='$color', style='$style'";
// $result = $conn->query($sql);
// return $result;
// }
// else {
// 	return false;
//  }
// }

/* for login */
public function check_login($emailusername, $password){
$conn = db();
$password = md5($password);
$sql="SELECT uid from users WHERE uemail='$emailusername' or uname='$username' and upass='$password'";

//checking if the username is available 
$result    = $conn->query($sql);
$user_data = $result->fetch_assoc();
$count_row = $result->num_rows;

if ($count_row == 1) {

$_SESSION['login'] = true;
$_SESSION['uid'] = $user_data['uid'];
return true;
}
else{
return false;
}
}

/* show username */
public function get_fullname($uid)
{
	$conn = db();
	$sql="SELECT uname FROM users WHERE uid = $uid";
	$result = $conn->query($sql);
	$user_data = $result->fetch_assoc();
	echo $user_data['uname'];
}

 
 
/*** starting the session ***/
public function get_session()
{
	return $_SESSION['login'];
}

public function user_logout()
{
	$_SESSION['login'] = FALSE;
	session_destroy();
}

public function get_matchSupplier($city , $field)
{   
	$conn = db();
	$sql="SELECT uemail FROM users WHERE city = $city";
	$result = $conn->query($sql);
	$user_data = $result->fetch_assoc();
	$city= $user_data['city'];
	$sql="SELECT * FROM supplier WHERE city='$city'";
	// $sql="SELECT id FROM product WHERE color ='$color'";
	$result = $conn->query($sql);
	$user_data = $result->fetch_assoc();
	echo $user_data[$field];
}

}

?>
