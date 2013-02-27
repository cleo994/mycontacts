<h2>Groups</h2>
<?php 
// Connect to database
// New sqli(host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = 'SELECT * FROM groups ORDER BY group_id';
$results=$conn->query($sql);

while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	?>
	<li><span class=""></span></li>
	<?php
}
echo "</table>";
$conn->close();