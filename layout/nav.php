<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="./">MyContacts</a>
		<ul class="nav">
		<?php foreach($pages as $file => $text): ?>
			<li><a href="./?p=<?php echo $file ?>"><?php echo $text ?></a></li>
		<?php endforeach ?>
		</ul>
		<form method="get" class="form-inline pull-right">
			<input type="hidden" name="p" value="list_contacts" />
			<div class="input-append">
				<input class="span2" type="text" name="q" placeholder="search" />
				<button type="submit"><i class="icon-search"></i></button>
			</div>
		</form>
	</div>
</div>