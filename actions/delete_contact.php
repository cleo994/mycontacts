<?php session_start() ?>
<?php

require_once('../config/db.php');
require_once('../lib/functions.php');

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute the query
$sql = "DELETE FROM contacts WHERE contact_id={$_POST['id']}";
$conn->query($sql);

// Close the connection
$conn->close();

// Redirect
$_SESSION['message']= array(
		'type'=>'success',
		'text'=>"They're gone, you monster.",
);
header('Location:../?p=list_contacts');