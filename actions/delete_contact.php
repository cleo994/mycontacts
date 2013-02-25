<?php session_start() ?>
<?php
require_once('../config/db.php');
require_once('../lib/functions.php');

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute the query
$sql = "DELETE FROM contacts WHERE contact_id={$_POST['contact_id']}";
$conn->query($sql);

if($conn->errno > 0) {
	echo $conn->error;
	echo "<br/><strong>SQL:</strong>$sql";
	die();
}

// Close the connection
$conn->close();

// Redirect
$_SESSION['message']= array(
		'type'=>'alert alert-info',
		'text'=>"They're gone, you monster.",
);
header('Location:../?p=list_contacts');