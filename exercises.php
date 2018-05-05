<?php
	require ('db_credentials.php');
	require ('web_utils.php');
	
	$stylesheet = 'taskmanager.css';
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
		print generatePageHTML("Exercises (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		exit;
	}
	
	$sql = "SELECT * FROM exercises";
	$result = $mysqli->query($sql);
	$exercises = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($exercises, $row);
		}
	}
	
	print generatePageHTML("Exercises", generateExercisesTableHTML($exercises), $stylesheet);
	
	
	
	function generateExercisesTableHTML($exercises) {
		$html = "<h1>Exercises Form</h1>\n";
		
		$html .= "<p><a class='entryButton' href='persons.php'>Persons Form</a></p>\n";
		$html .= "<p><a class='entryButton' href='logbook.php'>Logbook Form</a></p>\n";

		
		if (count($exercises) < 1) {
			$html .= "<p>No Exercises to display!</p>\n";
			return $html;
		}
	
		$html .= "<table>\n";
		$html .= "<tr><th>Code</th><th>Exercise Type</th></tr>\n";
	
		foreach ($exercises as $exercise) {
			$code = $exercise['code'];
			$exerciseType = $exercise['exerciseType'];
			
			$html .= "<tr><td>$code</td><td>$exerciseType</td></tr>\n";
		}
		$html .= "</table>\n";
	
		return $html;
	}
	
	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Exercises</h1>
<p>An error occurred: $error</p>
EOT;

	return $html;
	}

?>