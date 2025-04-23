<?php
include("conee.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = ($_POST['email']);
    $password = ($_POST['password']);


    // Prepare and bind
    #prepare("INSERT INTO selectdata (name, email, password, gender, country, comments) VALUES (?, ?, ?, ?, ?, ?)");
   # $stmt->bind_param("ssssss", $name, $email, $password, $gender, $country, $comments);

    if(!empty($email) && !empty($password))
    {
          //save to database 
          $query = "insert into login (email,password) values ('$email','$password')";
          mysqli_query($conn, $query);
          
          header("Location: index.html");
          die;
    }else
      {
          echo "PLEASE ENTER VALID INFORMATION !!";
      }
}
?>