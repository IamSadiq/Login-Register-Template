<?php
require_once('functions.php');

//sample values--FOR DEBUGGING PURPOSES ONLY
//$_POST['username'] = 'Abubakar';
//$_POST['password'] = 'adamu';

if (isset($_POST['uname']) && isset($_POST['pword'])) {

	connect_2_db();

	$username = $_POST['uname'];
	$password = $_POST['pword'];

	$statement = $conn_instance->prepare('SELECT * FROM users WHERE username = :uname AND Binary password = :pword');
	//$results = $conn_instance->query($sql);
	$statement->bindParam(':uname', $username);
	$statement->bindParam(':pword', $password);
	$statement->execute();

	if ($show = $statement->fetch(PDO::FETCH_ASSOC)) {
		//echo json_encode($show['username']) . json_encode($show['password']);
		
		$_SESSION['user'] = $show['username'];
		//echo "Welcome " . $_SESSION['user'];
		//print_r($show); /*print the entire assoc array*/
	}
	else
	{
		//Unsuccesful Login
		echo "Failed to Login";
	}
}
else
{
	echo "Can't login, Empty Fields!";
}

?>