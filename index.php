<?php

// SANITIZE
$name = $_POST['name'];
$newName = filter_var($name, FILTER_SANITIZE_STRING);
echo $newName;

$email = $_POST['email'];
$newEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
echo $newEmail;

$comment = $_POST['comment'];
$newComment = filter_var($comment, FILTER_SANITIZE_STRING);
echo $newComment;

// VALIDATE

$error = array();

if (empty($newName)) {
    $error['0'] = 'Please fill in your name'; 
}

if (empty($newEmail)) {
    $error['1'] = 'Please fill in your email'; 
} else if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $error['3'] = 'Your email is not valid';
}


if (empty($newComment)) {
    $error['2'] = 'Please leave a message'; 
}

// EXECUTION

// FEEDBACK

function displayErrors() {

    if(isset($_POST['submit'])) {
        for($i = 0; $i < 4; $i++) {
           if(!empty($GLOBALS['error'][$i])) {
            echo '<li>';
            print_r($GLOBALS['error'][$i]);
            echo '</li>'; 
           }
        }
    }
}






// if (!empty($_POST['firstname'] )){
    
//     echo 'Your firstname is '.$firstname;
// } else {
//     echo 'You need to fill in your name';
// } 

// echo '<br>';

// if(!empty($_POST['email'] )) {
//     $email = $_POST['email'];
//     echo 'Your email is '.$email;
// } else {
//     echo 'You need to fill in your email'; 
// }

// echo '<br>';

// if(!empty($_POST['password'] )) {
//     $password = $_POST['password'];
//     echo 'Your password is '.$password;
// } else {
//     echo 'You need to fill in your password'; 
// }

// pre_r($_POST);

// function pre_r($array) {
//     echo '<pre>';
//     print_r($array);
//     echo '</pre>';
// }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="errors">
    <ul>
        <?php displayErrors(); ?>
    </ul>
</div>
<form method="POST">
        <p> Name:<br/> <input name="name" type="text"> <br/> </p>
        <p> Email:<br/><input name="email" type="text"> <br/> </p>
        <!-- <p>Password:<br/><input name="password" type="password"> </p> -->
        <p> Comment: <br/> <textarea name="comment" rows="5" cols="40"></textarea></p>
        <input type="submit" name="submit" value="Submit">
    </form> 
</body>
</html>