<?php session_start() ?>
<?php 

require('../config/db.php');

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


// Connect to DB
$conn = new mysqli();

// Query DB


// Close connection
$conn->close();

// Set location header
header('Location:../?p=list_contacts');

// Else, add to DB & redirect to contact list
