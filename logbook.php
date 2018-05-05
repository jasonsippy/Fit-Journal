<?php
	require ('db_credentials.php');
	require ('web_utils.php');
	
	$stylesheet = 'taskmanager.css';
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
		print generatePageHTML("Logbook (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		exit;
	}
	
	$sql = "SELECT * FROM logbook";
	$result = $mysqli->query($sql);
	$logbook = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($logbook, $row);
		}
	}
	
	print generatePageHTML("Logbook", generateLogbookTableHTML($logbook), $stylesheet);
	
	
	
	function generateLogbookTableHTML($logbook) {
		$html = "<h1>Logbook Form</h1>\n";
		
		$html .= "<p><a class='entryButton' href='activity_form.html'>New Activity</a></p>\n";
		$html .= "<p><a class='entryButton' href='persons.php'>Persons Form</a></p>\n";
        $html .= "<p><a class='entryButton' href='exercises.php'>Exercises Form</a></p>\n";
		
		
		if (count($logbook) < 1) {
			$html .= "<p>No Logbook to display!</p>\n";
			return $html;
		}
	
		$html .= "<table>\n";
		$html .= "<tr><th>Edit</th><th>ID</th><th>Code</th><th>Duration (min)</th><th>Distance (mi)</th><th>Effort (%)</th><th>Notes</th></tr>\n";
	
		foreach ($logbook as $activity) {
			$id = $activity['id'];
			$code = $activity['code'];
			$duration = $activity['duration'];
			$distance = $activity['distance'];
			$effort = $activity['effort'];
			$notes = $activity['notes'];
			
			$html .= "<tr><td>$id</td><td>$code</td><td>$duration</td><td>$distance</td><td>$effort</td><td>$notes</td></tr>\n";
		}
		$html .= "</table>\n";
	
		return $html;
	}
	
	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Logbook</h1>
<p>An error occurred: $error</p>
EOT;

	return $html;
	}

?>