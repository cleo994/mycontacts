<h2>Groups</h2>
<?php 
// Connect to database
// New sqli(host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = 'SELECT groups.*, COUNT(contact_id) AS num_contacts FROM groups LEFT JOIN contacts ON groups.group_id=contacts.group_id GROUP BY groups.group_id ORDER BY group_id';
$results=$conn->query($sql);

echo '<table class="table"><tr><th>Group Name</th><th>Number of Members</th></tr>';
while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	echo "<tr><td><a href=\"?p=group&id=$group_id\">$group_name</a></td>";
	echo "<td><span class=\"badge badge-info\">$num_contacts</span></td>";
	
	
}
echo "</table>";
$conn->close();