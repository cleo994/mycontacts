<?php session_start() ?>
<?php 

require_once('../config/db.php');

$required = array(
	'contact_firstname',
	'contact_lastname',
	'contact_email',
	'contact_phone'
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

// Add contact to DB
fwrite($f,"\n{$_POST['contact_firstname']},{$_POST['contact_lastname']},{$_POST['contact_email']},{$_POST['contact_phone']}");

// Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = "INSERT INTO contacts (contact_firstname,contact_lastname,contact_email,contact_phone) VALUES ('$contact_firstname','$contact_lastname','$contact_email','$contact_phone')";
$conn->query($sql);

// Close connection
$conn->close();

// Set location header
$_SESSION['message']= array(
	'type'=>'success',
	'text'=>"<strong>$contact_firstname $contact_lastname</strong> has been added to your contacts!",		
);
header('Location:../?p=list_contacts');

// Else, add to DB & redirect to contact list
