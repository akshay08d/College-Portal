<div>hello</div>
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
		$name = $_POST['name'];
		$industry = $_POST['industry'];
		$email = $_POST['email'];
		$size = $_POST['size'];
		$phone = $_POST['phone'];
		$type = $_POST['ctype'];
		$password = $_POST['psw'];
		$password_r = $_POST['psw-repeat'];

		if(!empty($name) && !empty($password) && !is_numeric($name) && !empty($password_r)
         && !empty($industry) && !empty($email) && !empty($size) && ($password)==($password_r)
		 && !empty($phone) && !empty($type))
		{

			//save to database
			$c_id = random_num(20);
            
			$query = "insert into company_details (c_id,c_name,c_industry,c_phone,c_type,c_password,c_size,c_email) values ('$c_id','$name','$industry','$phone','$type','$password','$size','$email')";

			// mysqli_query($con, $query);

			// header("Location: student.html");
			//die;

            if ($conn->query($query) === TRUE) {
				header('Location:Csignin.html');
                // echo "Company registered successfully";
              } else {
                echo "Error: " . $query . "<br>" . $conn->error;
              }
              
              $conn->close();
            
		}else
		{
			echo "Company Not Registered !!!";
		}
?>


