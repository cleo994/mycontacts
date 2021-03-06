<?php
function connect() {
	return new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
}


function format_phone($phone) {
	return '<a href="tel:;'.$phone.'">('.substr($phone,0,3).')-'.substr($phone,3,3).'-'.substr($phone,-4).'</a>';
}
/**
 * Generates an HTML input element with the given attribute values.
 * This function also examines SESSION data for previously
 * entered values with the same name
 * @param String $name
 * @param String $placeholder
 * @return HTML input element
 */
function input($name, $placeholder, $value=null, $class='') {
	if($value == null && isset($_SESSION['POST'][$name])) {
		$value = $_SESSION['POST'][$name];
		
		// Remove from session data
		unset($_SESSION['POST'][$name]);
		
		if($value == '') { // nothing was entered for this item in the form
			$class .= ' error';
		}
			
	}else { // NO session data (probably first time visiting form)
		$value = ''; // no pre-populated value
	}
	return "<input class=\"$class\" type=\"text\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\" />";
}

/**
 * Generates an HTML select element with the given name
 * attribute and option elements.
 * This function also examines session data for a previously
 * submitted value
 * @param String $name Name attribute
 * @param Array $options Array of option in the form value=> text
 * @return HTML select element
 */

function dropdown($name, $options, $value = null) {
	$select = "<select name=\"$name\">";
	
	// Add option elements to select element
	foreach($options as $value => $text) {
		// If there is session form data for $name, AND its value
		// is the same as the current array element, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value){
			unset($_SESSION['POST'][$name]);
			$selected = 'selected="selected"';
		} else {
			$selected = '';
		}
		$select .= "<option $selected value=\"$value\">$text</option>";
	}
	$select .= "</select>";
	return $select;
}

/**
 * Generates a HTML radio buttons with the given name
 * atribute and options
 * This function also examines session data for a previously
 * submitted value
 * @param String $name Name attribute
 * @param Array $options Array of options in the form value => text
 * @return HTML input[type=radio] elements, wrapped in labels
 */

function radio($name, $options) {
	$radio = '';
	// Add option elements to select element
	foreach($options as $value => $text) {
		// If there is session form data for $name, AND its value
		// is the same as the current array element, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value){
			unset($_SESSION['POST'][$name]);
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}
		$radio .= "<label><input type=\"radio\" name=\"$name\" value=\"$value\" $checked >$text</option>";
	}
	return $radio;
}

function get_options($table,$default_value=0,$default_name='Select'){
	$options = array($default_value => $default_name);

	// Field names
	$id_field = $table.'_id';
	$name_field = $table.'_name';

	// Connect to DB
	$conn = connect();
	
	// Query table for id's &names
	$sql = "SELECT $id_field, $name_field FROM {$table}s ORDER BY $name_field";
	$results = $conn->query($sql);
	
	// Loop over result set, adding all rows to $options
	while(($row =  $results->fetch_assoc()) != null) {
		$key =  $row[$id_field];
		$value = $row[$name_field];
		$options[$key] = $value;
	}
	
	// Close DB connection
	$conn->close();
	
	// Return options
	
}