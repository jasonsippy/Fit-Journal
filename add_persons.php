<?php
	require ('db_credentials.php');
	require ('web_utils.php');
	
	$stylesheet = 'taskmanager.css';
	
	$name = $_POST['name'];
	$age = $_POST['age'] ? $_POST['age'] : "-";
	$weight = $_POST['weight'] ? $_POST['weight'] : "-";
	
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
		print generatePageHTML("Persons (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		exit;
	}
	
	$name = $mysqli->real_escape_string($name);
	$age = $mysqli->real_escape_string($age);
	$weight = $mysqli->real_escape_string($weight);
	
	$sql = "INSERT INTO persons (name, age, weight, entryDate) VALUES ('$name', '$age', '$weight', NOW())";
	
	$result = $mysqli->query($sql);
	if ($result) {
		// insert successfull, redirect browser to persons.php to see list of persons
		redirect("persons.php");
	} else {
		print generatePageHTML("Persons (Error)", generateErrorPageHTML($mysqli->error . " using SQL: $sql"), $stylesheet);
		exit;
	}
	
	
	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Persons</h1>
<p>An error occurred: $error</p>
<p><a class='entryButton' href='entry_form.html'>Add Persons</a><a class='entryButton' href='view_persons.php'>View Persons</a></p>
EOT;

	return $html;
	}
?>