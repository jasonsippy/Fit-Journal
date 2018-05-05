<?php
	require ('db_credentials.php');
	require ('web_utils.php');
	
	$stylesheet = 'taskmanager.css';
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
		print generatePageHTML("Persons (Error)", generateErrorPageHTML($mysqli->connect_error), $stylesheet);
		exit;
	}
	
	$sql = "SELECT * FROM persons";
	$result = $mysqli->query($sql);
	$persons = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($persons, $row);
		}
	}
	
	print generatePageHTML("Persons", generatePersonsTableHTML($persons), $stylesheet);
	
	
	
	function generatePersonsTableHTML($persons) {
		$html = "<h1>Persons</h1>\n";
		
		$html .= "<p><a class='entryButton' href='entry_form.html'>New Entry</a></p>\n";
		$html .= "<p><a class='entryButton' href='exercises.php'>Exercises Form</a></p>\n";
		$html .= "<p><a class='entryButton' href='logbook.php'>Logbook Form</a></p>\n";
		
		if (count($persons) < 1) {
			$html .= "<p>No Persons to display!</p>\n";
			return $html;
		}
	
		$html .= "<table>\n";
		$html .= "<tr><th>Edit</th><th>ID</th><th>Name</th><th>Age</th><th>Weight (lb)</th><th>Entry Date</th></tr>\n";
	
		foreach ($persons as $person) {
			$id = $person['id'];
			$name = $person['name'];
			$age = $person['age'];
			$weight = $person['weight'];
			$entryDate = $person['entryDate'];
			
			$html .= "<tr><td><form action='edit_person.php' method='post'><input type='hidden' name='id' value='$id' /><input type='submit' value='Delete'></form><form action='edit_person.php' method='post'><input type='hidden' name='id' value='$id' /><input type='submit' value='Update'></form></td><td>$id</td><td>$name</td><td>$age</td><td>$weight</td><td>$entryDate</td></tr>\n";
		}
		$html .= "</table>\n";
	
		return $html;
	}
	
	function generateErrorPageHTML($error) {
	$html = <<<EOT
<h1>Persons</h1>
<p>An error occurred: $error</p>
EOT;

	return $html;
	}

?>