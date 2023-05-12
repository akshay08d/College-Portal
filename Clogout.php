<?php
session_start();
if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
}
          /* Redirect browser */
          header("Location: Csignin.html");
?>