

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

      $query = "select * from company_details where c_email = '$email' limit 1 ";
      $result = mysqli_query($conn,$query);
      if($result && mysqli_num_rows($result)>0){
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['c_password'] == $pass) {
          session_start();
          $_SESSION['c_email'] = $email;
          $_SESSION['c_name'] = $user_data ['c_name'];
          $_SESSION['c_phone'] = $user_data ['c_phone'];
          $_SESSION['c_industry'] = $user_data ['c_industry'];

          /* Redirect browser */
          header("Location: company.html");
        }
      }
        
      else {
        echo "Invalid username or password!";
        header("Location: Csignin.html");
      }
    } 
    else {
       echo "All fields are required!";
      header("Location: Csignin.html");
    }
  }
  ?>