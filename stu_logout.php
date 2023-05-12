<?php
session_start();
if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
}
          /* Redirect browser */
          header("Location: stu_signin_form.html");
?>