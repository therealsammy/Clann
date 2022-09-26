<?php
    ob_start();
    include_once "config.php";
    session_start();


    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

   if (!empty($email) && !empty($password)){

    $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

    if(mysqli_num_rows($sql) > 0){

        $rows = mysqli_fetch_assoc($sql);
        $status = "Active now";
        $sql2 = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id = {$rows['unique_id']}");
        if($sql2){
            $_SESSION['unique_id'] = $rows['unique_id'];

            echo "success";
        }

    } else {

    echo "Email or password is incorrect";

    }

   } else {

    echo "All input field are required";

   }

?>