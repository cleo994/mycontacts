<h2>Contacts</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		// Connect to DB
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		// Query DB
		$sql = 'SELECT * FROM contacts ORDER BY contact_lastname, contact_firstname';
		$results = $conn->query($sql);
		
		// Loop over result set, displaying contacts
		while(($contact = $results->fetch_assoc()) != null) {
			extract($contact);
			?>
			<tr>
				<td><?php echo $contact_firstname ?> <?php echo $contact_lastname ?></td>
				<td><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></td>
				<td><?php echo format_phone($contact_phone) ?></td>
				<td><?php echo "<a href=\"./?p=form_edit_contact&id=$contact_id\" class=\"btn btn-warning\"><i class=\"icon-edit icon-white\"></a></td><td><a href=\"actions/delete_contact.php\" class=\"btn btn-danger\"><i class=\"icon-trash icon-white\"></a>" ?></td>
			</tr>
		<?php }
		
		// Close DB connection
		$conn->close();
		
		?>
	</tbody>
</table>