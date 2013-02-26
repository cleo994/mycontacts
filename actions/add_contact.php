<?php session_start() ?>
<?php 

require_once('../config/db.php');

$required = array(
	'contact_firstname',
	'contact_lastname',
	'contact_email',
	'contact_phone',
	'group_id'
);

// Extract form data
extract($_POST);

// Validate form data
foreach($required as $r) {
	// If invalid, redirect with message
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// Store message into session
		$_SESSION['message'] = array (
			'type' => 'danger',
			'text' => 'Please provide all required information.'	
		);
		
		// Store form data into session data
		$_SESSION['POST'] = $_POST;
		
		// Set location header
		header('Location:../?p=form_add_contact');
		
		// Kill script
		die();
	}
}

// Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = "INSERT INTO contacts (contact_firstname,contact_lastname,contact_email,contact_phone,group_id) VALUES ('$contact_firstname','$contact_lastname','$contact_email','$contact_phone',$group_id)";
$conn->query($sql);

// Check for a SQL error
if($conn->errno > 0) {
	echo $conn->error;
	die();
}

// Close connection
$conn->close();

// Set location header
$_SESSION['message']= array(
	'type'=>'success',
	'text'=>"<strong>$contact_firstname $contact_lastname</strong> has been added to your contacts!",		
);
header('Location:../?p=list_contacts');

// Else, add to DB & redirect to contact list
