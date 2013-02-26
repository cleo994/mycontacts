<h2>Add a New Contact</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
	<div class="control-group">
		<label class="control-label" for="contact_name">Name</label>
		<div class="controls">
		<?php echo input('contact_firstname', 'First Name')?>
		<?php echo input('contact_lastname', 'Last Name')?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="contact_email">Email</label>
		<div class="controls">
		<?php echo input('contact_email', 'you@example.com') ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="contact_phone">Phone Number</label>
		<div class="controls">
		<?php echo input('contact_phone','9998887777') ?>
	</div>
	</div>
	<div class="control-group">
	<label class="group-label" for="contact_group">Group</label>
	<div class="controls">
	<?php
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	// Query groups table
	$sql ="SELECT * FROM groups";
	$results = $conn->query($sql);
	$options = array(0 =>'Select a group');
	while(($group = $results->fetch_assoc()) != null){
		extract($group);
		$options[$group_id]= $group_name;
		
	}
	echo dropdown("group_id",$options); ?>
	</div>
	</div>
		<div class="form-actions">
  			<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Add Contact</button>
  			<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
		</div>
	</div>
</form>