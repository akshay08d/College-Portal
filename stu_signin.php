

  <?php
  include("functions.php");

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "login_sample_db";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (!empty($email) && !empty($pass)) {

      $query = "select * from users where email = '$email' limit 1 ";
      $result = mysqli_query($conn,$query);
      if($result && mysqli_num_rows($result)>0){
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['user_password'] == $pass) {
          session_start();
          $_SESSION['email'] = $email;
          $_SESSION['user_name'] = $user_data ['user_name'];
          $_SESSION['course'] = $user_data ['Course'];
          $_SESSION['gender'] = $user_data ['gender'];

          /* Redirect browser */
          header("Location: student.html");
        }
      }
        
      else {
        // echo "Invalid username or password!";
        header("Location: stu_signin_form.html");
      }
    } 
    else {
      // echo "All fields are required!";
      header("Location: stu_signin_form.html");
    }
  }
  ?>