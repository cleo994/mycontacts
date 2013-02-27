<?php session_start() ?>
<?php 

require('../config/db.php');

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
		header("Location:../?p=form_edit_contact&id={$_POST['contact_id']}");

		// Kill script
		die();
	}
}

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute query
$sql = "UPDATE contacts SET contact_firstname='{$_POST['contact_firstname']}', contact_lastname='{$_POST['contact_lastname']}', contact_email='{$_POST['contact_email']}', contact_phone='{$_POST['contact_phone']}', group_id='{$_POST['group_id']}' WHERE contact_id='{$_POST['contact_id']}'";
$conn->query($sql);
// Close connection
$conn->close();
// Redirect
$_SESSION['message']= array(
		'type'=>'success',
		'text'=>"<strong>$contact_firstname $contact_lastname's</strong> information has been changed!",
);
header('Location:../?p=list_contacts');
?>