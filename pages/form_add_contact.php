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
	<div class="control-group">
	<label class="control-label" for="contact_group">Group</label>
	<div class="dropdown">
	  	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
	    	<li><a tabindex="0" href="#">Coworkers</a></li>
	    	<li><a tabindex="1" href="#">Friends</a></li>
	    	<li><a tabindex="2" href="#">Stalkers</a></li>
	 	</ul>
	</div>
	</div>
		<div class="form-actions">
  			<button type="submit" class="btn btn-success"><i class="icon-plus-sign icon-white"></i>Add Contact</button>
  			<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
		</div>
	</div>
</form>