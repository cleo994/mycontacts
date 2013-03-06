<h2>Groups</h2>
<?php 
// Connect to database
// New sqli(host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = 'SELECT groups.*, COUNT(contact_id) AS num_contacts FROM groups LEFT JOIN contacts ON groups.group_id=contacts.group_id GROUP BY groups.group_id ORDER BY group_id';
$results=$conn->query($sql);

echo '<table class="table"><tr><th>Group Name</th><th>Number of Members</th><th>Edit</th><th>Delete</th></tr>';
while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	echo "<tr><td><a href=\"?p=group&id=$group_id\">$group_name</a></td>";
	echo "<td><span class=\"badge badge-info\">$num_contacts</span></td>";
	echo '<td><a href="./?p=form_edit_group&id='.$group_id.'" class="btn btn-warning"><i class="icon-edit icon-white"></i></a></td>';
	echo '<td><form action="actions/delete_group.php" method="post" class="form-inline"><input type="hidden" name="group_id" value="'.$group_id.'" /><button class="btn btn-danger" type="submit"><i class="icon-trash icon-white"></i></button></form></td></tr>';
	
	
}
echo "</table>";
$conn->close();