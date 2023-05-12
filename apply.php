
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
	$jprofile = $_POST['jprofile'];
	$company = $_POST['company'];
	$location = $_POST['location'];
	$name = $_POST['name'];
	$college = $_POST['college'];
	$course = $_POST['course'];
	$cgpa = $_POST['cgpa'];

	if (!empty($jprofile) && !empty($company) && !empty($location) && !empty($name)
		&& !empty($college) && !empty($course) && !empty($cgpa)) 
	{

		//save to database
		// $user_id = random_num(20);

		$query = "insert into application (job_profile,company,location,name,college,course,cgpa) 
        values ('$jprofile','$company','$location','$name','$college','$course','$cgpa')";

		// mysqli_query($con, $query);

		header("Location: jobs.html");
		//die;

		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}

		$conn->close();
	} 
	else {
		echo "Applied !!!";
	}
	?>


