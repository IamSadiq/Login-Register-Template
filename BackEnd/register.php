<?php
require_once('functions.php');

//sample values--FOR DEBUGGING PURPOSES ONLY
//$_POST['username'] = 'Abubakar';
//$_POST['password'] = 'adamu';

if (isset($_POST['uname']) && isset($_POST['pword']) && isset($_POST['cpword'])) {

		$username = $_POST['uname'];
		$password = $_POST['pword'];
		$cpassword = $_POST['cpword'];

		if ($cpassword == $password) {
			//create conn to db
			connect_2_db();

			$statement = $conn_instance->prepare("INSERT INTO users(username, password) VALUES(:uname,:pword)");
			//mysqli_stmt_bind_param("ss",$username,$password);
			//mysqli_stmt_execute($statement);
			$statement->bindParam(':uname', $username);
			$statement->bindParam(':pword', $password);
			

			if ($statement->execute()) {
				//Succesful Registeration
				echo "Successful registeration";
			}
			else
			{
				//Unsuccesful Registeration
				echo "Failed to Register";
			}
		}
		else
		{
			echo "Passwords don't match";
		}
		//mysqli_stmt_close($statement);
		//mysqli_close($conn_instance);
}
else
{
	echo "Can't register, Empty Fields!";
}

?>