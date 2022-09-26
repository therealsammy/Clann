<?php
    ob_start();
    include_once "config.php";
    session_start();

    if (isset($_POST['fname'])){

        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    
                $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");
    
                if(mysqli_num_rows($sql) > 0) {
    
                    echo "$email already exists";
    
                } else {
    
                    if(isset($_FILES['image'])){
    
                        $image_name = $_FILES['image']['name'];
                        // $image_type = $_FILES['image']['type'];
                        $tmp_name = $_FILES['image']['tmp_name'];
    
                        $image_explode = explode('.', $image_name);
                        $image_extension = end($image_explode);
    
                        $extensions = ['png', 'jpg', 'jpeg'];
    
                        if (in_array($image_extension, $extensions) === true) {
                            
                            $time = time();
    
                            $new_image_name = $time.$image_name;
    
                            if(move_uploaded_file($tmp_name, "images/".$new_image_name)){
    
                                $status = "Active now";
                                $random_id = rand(time(), 10000000);
    
                                $sql2 = mysqli_query($con, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
    
                                if($sql2){
                                    
                                    $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                                    
                                    if(mysqli_num_rows($sql3) > 0){
    
                                        $rows = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $rows['unique_id'];
                                        echo "success";
    
                                    }
    
                                } else {
                                    echo "Something went wrong";
                                }
    
                            }
    
                        } else {
                        echo "Please select a valid image file - jpeg, jpg or png!";
                        }
    
                    } else {
                        echo "Please select an image file";
                    }
                }
            } else {
                echo "$email - is not a valid email";
            }
    
        } else {
            echo "All input are required";
        }
    }


?>