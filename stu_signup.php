
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
		$user_name = $_POST['name'];
		$course_name = $_POST['course'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$password = $_POST['psw'];
		$password_r = $_POST['psw-repeat'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($password_r)
         && !empty($course_name) && !empty($email) && !empty($gender) && ($password)==($password_r))
		{

			//save to database
			$user_id = random_num(20);
            
			$query = "insert into users (user_id,user_name,user_password,course,email,gender) values ('$user_id','$user_name','$password','$course_name','$email','$gender')";

			// mysqli_query($con, $query);

			header("Location: stu_signin_form.html");
			//die;

            if ($conn->query($query) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $query . "<br>" . $conn->error;
              }
              
              $conn->close();
            
		}else
		{
			echo "Student Not Registered !!!";
		}
?>


