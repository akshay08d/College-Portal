
 <?php
	include("functions.php");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "login_sample_db";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//something was posted
	$skill = $_POST['skill'];
	$slevel = $_POST['slevel'];
	$certification = $_POST['certification'];
	$project = $_POST['project'];
	$techused = $_POST['techused'];
	$pdesc = $_POST['pdesc'];
	$email = $_POST['email'];

	if (!empty($skill) && !empty($slevel) && !empty($certification) && !empty($project)
		&& !empty($techused) && !empty($email) && !empty($pdesc)) 
	{

		//save to database
		// $user_id = random_num(20);

		$query = "insert into student (skill,skill_level,certification,project,technology_used,project_description,email) values ('$skill','$slevel','$certification','$project','$techused','$pdesc','$email)";

		// mysqli_query($con, $query);

		header("Location: Setting.html");
		//die;

		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}

		$conn->close();
	} 
	else {
		echo "Not Uploaded !!!";
	}
	?>


