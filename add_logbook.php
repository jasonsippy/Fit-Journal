<?php
	require ('db_credentials.php');
	require ('web_utils.php');
	
	$stylesheet = 'taskmanager.css';
	
	$id = $_POST['id'] ? $_POST['id'] : "-";
	$code = $_POST['code'];
	$duration = $_POST['duration'] ? $_POST['duration'] : "-";
	$distance = $_POST['distance'] ? $_POST['distance'] : "-";
	$effort = $_POST['effort'] ? $_POST['effort'] : "-";
	$notes = $_POST['notes'] ? $_POST['notes'] : "-";
	
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
		print generatePageHTML("Logbook (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		exit;
	}
	
	$id = $mysqli->real_escape_string($id);
	$code = $mysqli->real_escape_string($code);
	$duration = $mysqli->real_escape_string($duration);
	$distance = $mysqli->real_escape_string($distance);
	$effort = $mysqli->real_escape_string($effort);
	$notes = $mysqli->real_escape_string($notes);
	
	$sql = "INSERT INTO logbook (id, code, duration, distance, effort, notes) VALUES ('$id', '$code', '$duration', '$distance', '$effort', '$notes')";
	
	$result = $mysqli->query($sql);
	if ($result) {
		// insert successfull, redirect browser to logbook.php to see list of activities
		redirect("logbook.php");
	} else {
		print generatePageHTML("Logbook (Error)", generateErrorPageHTML($mysqli->error . " using SQL: $sql"), $stylesheet);
		exit;
	}
	
	
	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Logbook</h1>
<p>An error occurred: $error</p>
<p><a class='entryButton' href='activity_form.html'>Add Logbook</a><a class='entryButton' href='view_logbook.php'>View Logbook</a></p>
EOT;

	return $html;
	}
?>