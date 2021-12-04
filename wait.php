<?php
    $servername='localhost';
    $username='worker';
    $password='9h()en!x';
    $dbname = "phoenix_customers";
   
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        // die('Could not Connect MySql Server:' .mysql_error());
        die('Could not Connect MySql Server');
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check = "SELECT * FROM wait_list WHERE email='$email'";
    $res = mysqli_query($conn, $check);
    
    if(mysqli_num_rows($res) > 0){
        echo '<p class="alert alert-danger">Sorry... email already included in the wait list</p>';  
    }else{
        mysqli_query($conn, "INSERT INTO wait_list(email) VALUES('" . $email . "')");
        echo '<p class="alert alert-success">You have been successfully added to our wait list!</p>';
    }
    mysqli_close($conn);
?>