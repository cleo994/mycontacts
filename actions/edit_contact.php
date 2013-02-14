<?php session_start() ?>
<?php 

require('../config/db.php');

$required = array(
	'contact_firstname',
	'contact_lastname',
	'contact_email',
	'contact_phone'
);
