
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
	$status = $_POST['status'];
	$jplink = $_POST['jplink'];

	if (!empty($jprofile) && !empty($company) && !empty($location) && !empty($status)
		&& !empty($jplink)) 
	{

		//save to database
		// $user_id = random_num(20);

		$query = "insert into jobs (job_profile,company,location,status,link) 
        values ('$jprofile','$company','$location','$status','$jplink')";

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
		echo "Job Opening Created !!!";
	}
	?>


