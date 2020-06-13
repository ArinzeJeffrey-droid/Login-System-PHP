<?php
//call the database connection
include "db.php";

//alert variables
$display = "none";
$alert = "";
$errorMessage = "";
//The register auth code!
if(isset($_POST['signup'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $address = $_POST['address'];
    //validate password and Confirm Password
    if($password == $confirmPassword){
        //validate email
        $validateEmail = "SELECT * FROM users WHERE email = '{$email}'";
        $sendResult = mysqli_query($db, $validateEmail);
        $row = mysqli_fetch_assoc($sendResult);
        if($row){
            $display = "block";
            $alert = "danger";
            $errorMessage = "User with that email already exists.";
        }else{
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $token = substr(str_shuffle($permitted_chars), 0, 10);
            $query = "INSERT INTO users (firstName, lastName, email, password, token, address  )";
            $query .= " VALUES('{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$token}','{$address}')";
            $sendQuery = mysqli_query($db, $query);
            if(!$sendQuery){
                echo " <div class='alert-danger logic-failed'>Registration Failed!</div>";
            }else{
                $_SESSION['success'] = "<div class='alert-success logic-failed'>Registration Successful!</div>";
                header("Location: login.php");
            }
        }
    }else{
        $display = "block";
        $alert = "danger";
        $errorMessage = "Password Must Match!";
    }
}


//login auth code
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $sendQuery = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($sendQuery);

    if($password == $row['password']){
        $_SESSION['profile'] = "<div class='alert-success logic-failed'>Login In Successful.</div>";
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['address'];
        header("Location: profile.php");
    }else{
        $display = "block";
        $alert = "danger";
        $errorMessage = "Login Failed!. Check Email Or Password";
    }
}

//forgot password auth code
if(isset($_POST['forgot'])){
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $sendQuery = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($sendQuery);
    if($row){
        $to = $email;
        $subject = "Password";
        
        $message = "<h1>This is HTML message.</h1>";
        $message .= "<h3>{$row['token']}</h3>";
        
        $header = "From:vipcars@gmail.com \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
            $display = "block";
            $alert = "success";
            $errorMessage = "Message sent successfully...";
        }else {
            $display = "block";
            $alert = "danger";
            $errorMessage = "Message could not be sent...";
        }
    }else{
        $display = "block";
        $alert = "danger";
        $errorMessage = "User doesn't exists";
    }
}


//edit profile code
if(isset($_POST['edit'])){
    $user_id = $_POST['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "UPDATE users SET firstName = '{$firstName}', lastName = '{$lastName}', email = '{$email}', address = '{$address}' ";
    $query .= "WHERE user_id = '{$user_id}' ";
    $sendQuery = mysqli_query($db, $query);
    if(!$sendQuery){
        die("Failed ". mysqli_error($db)); 
        echo " <div class='alert-danger logic-failed'>Update Failed!</div>";
    }else{
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        echo " <div class='alert-success logic-failed'>Account Updated Successfully!</div>";
    }

}
?>