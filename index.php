<?php

// SANITIZE
$name = $_POST['name'];
$newName = filter_var($name, FILTER_SANITIZE_STRING);

$email = $_POST['email'];
$newEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

$comment = $_POST['comment'];
$newComment = filter_var($comment, FILTER_SANITIZE_STRING);

// VALIDATE

$error = array();

if (empty($newName)) {
    $error['0'] = 'Please fill in your name';
}

if (empty($newEmail)) {
    $error['1'] = 'Please fill in your email';
} else if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $error['3'] = 'Your email is not valid';
}


if (empty($newComment)) {
    $error['2'] = 'Please leave a message';
}

// EXECUTION
if (count($error) <= 0) {
    require 'phpmailer.php';
}

// FEEDBACK

function displayErrors()
{

    if (isset($_POST['submit'])) {
        for ($i = 0; $i < 4; $i++) {
            if (!empty($GLOBALS['error'][$i])) {
                echo '<li>';
                print_r($GLOBALS['error'][$i]);
                echo '</li>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
</head>

<body>
<div class="container">
    <div class="errors">
        <h2>Errors</h2>
        <ul>
            <?php displayErrors(); ?>
        </ul>
    </div>
    <form method="POST">
        <p> Name:<br /> <input name="name" type="text"> <br /> </p>
        <p> Email:<br /><input name="email" type="text"> <br /> </p>
        <p> Comment: <br /> <textarea name="comment" rows="5" cols="40"></textarea></p>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>

</html>