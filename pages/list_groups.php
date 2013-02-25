<h2>Groups</h2>
<?php 
// Connect to database
// New sqli(host,user,password,db name)
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Query DB
$sql = 'SELECT * FROM groups ORDER BY group_id';
$results=$conn->query($sql);
echo "<ul>";
while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	echo "<a href=\"./?p=group&id=$group_id\" ><li>$group_name</li></a>";
	echo '<form style="display:inline;" method="post" action="./actoins/delete.php" />';
	echo "<input type=\"hidden\" name=\"id\" value=\"$group_id\"/> ";
}
echo "</ul>";
$conn->close();