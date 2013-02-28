<?php 
function is_search() {
	return isset($_GET['q']) && $_GET['q'] != '';
}

// Check to see if user is searching for a contact
if(isset($_GET['q']) && $_GET['q'] != '') {
	extract($_GET);
	$where = "WHERE contact_lastname LIKE '%{$_GET['q']}%' OR contact_firstname LIKE '%{$_GET['q']}%' ";
	echo $search_message = "<p>Why are you peeping on my peeps with a name containing \"{$_GET['q']}\"? </p>";
	echo $show_all = '<a href="./?p=list_contacts"><button class="btn btn-success">Show all contacts</button></a>';
} else {
	$where = '';
	$search_message = '';
	$show_all = '';
}
?>

<h2>Contacts</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Group</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		// Connect to DB
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		// Query DB
		$sql = "SELECT * FROM contacts LEFT JOIN groups ON contacts.group_id=groups.group_id $where ORDER BY contact_lastname,contact_firstname";
		$results = $conn->query($sql);
		
		// Loop over result set, displaying contacts
		while(($contact = $results->fetch_assoc()) != null) {
			extract($contact);
			?>
			<tr>
				<td><?php echo $contact_firstname ?> <?php echo $contact_lastname ?></td>
				<td><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></td>
				<td><?php echo format_phone($contact_phone) ?></td>
				<td><a href="./?p=group&id=<?php echo $group_id?>"><span class="label label-info"><?php echo $group_name ?></span></a></td>
				<td>
					<a href="./?p=form_edit_contact&id=<?php echo $contact_id?>" class="btn btn-warning"><i class="icon-edit icon-white"></i></a>
				</td>
				<td>
					<form action="actions/delete_contact.php" method="post" class="form-inline">
						<input type="hidden" name="contact_id" value="<?php echo $contact_id ?>" />
						<button class="btn btn-danger" type="submit"><i class="icon-trash icon-white"></i></button>
					</form>
			
				</td>
			</tr>
		<?php }
		
		// Close DB connection
		$conn->close();
		
		?>
	</tbody>
</table>