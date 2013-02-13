<h2>Add a New Contact</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
	<div class="control-group">
		<label class="control-label" for="contact_name">Name</label>
		<div class="controls">
		<?php echo input('contact_firstname', 'first name')?>
		<?php echo input('contact_lastname', 'last name')?>
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
		<div class="form-actions">
  			<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Add Contact</button>
  			<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
		</div>
	</div>
</form>