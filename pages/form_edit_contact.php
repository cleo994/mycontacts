<?php 
// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute SELECT query
$sql = "SELECT * FROM contacts WHERE contact_id={$_GET['id']}";
$results = $conn->query($sql);

// Store the contact date
$contact = $results->fetch_assoc();
extract($contact);

// Close the connection
$conn->close();

?>
<form action="actions/edit_contact.php" method="post">
	<label>First Name</label>
	<input type="text" name="contact_firstname" value="<?php echo $contact_firstname ?>" />
	<br/>

	<label>Last Name</label>
	<input type="text" name="contact_lastname" value="<?php echo $contact_lastname ?>" />
	<br/>
	
	<label>Email</label>
	<input type="text" name="contact_email" value="<?php echo $contact_email ?>" />
	<br/>
	
	<label>Phone Number</label>
	<input type="text" name="contact_phone" value="<?php echo $contact_phone ?>" />
	<br/>
	<input type="hidden" name="contact_id" value="<?php echo $_GET['id'] ?>" />
	<input type="submit" value="Edit" />
</form>