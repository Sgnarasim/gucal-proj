<?php
if($_SERVER["REQUEST_METHOD"]  == "POST")
{
    //retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

   // Database Connection
   $host ="localhost";
   $dbusername ="root";
   $dbpassword = " ";
   $dbname ="auth";

   $conn =new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
    die("Connection failed: " . $conn ->connect_error);
      }

     //validate login authetication
     $query = "SELECT *FROM login WHERE username='$username' AND password='$password' ";

     $result = $conn->query($query);

     if($result->num_rows == 1){
     //login success
        header("location:home.html");
       exit();
       }
    else{
        //login failed
         header("location:error.html");
         exit();
       }

       $conn-> close();
}

?>