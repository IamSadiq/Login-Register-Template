<?php

/************************************************************************************
 *Must First create a new mysql database [tableName=users and should have 3 columns *
 *(id, username, password)], Next in connect_2_db, replace 'dbname=yourNewDBname' in* 
 *PDO argument, root is the default user but if your created your db as a different *
 *user, change 'root' to that user, else stick with 'root', the empty quote '', reps*
 *       the 'root' user's password(change only if u using a different user)	    *
 **********************************BY: ABUBAKAR :)***********************************
 ************************************************************************************/

function connect_2_db(){
	//db connection
	global $conn_instance;
	try{
		$conn_instance = new PDO('mysql:host=localhost;dbname=mindz','root','');
	}
	catch(PDOException $e){
		//check for connection error
		echo "Could not connect to Database";
		echo "Error type: " . $e;
	}
}


?>