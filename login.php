<?php
session_start();

// Define the list of authorized users
$authorized_users = array(
    'ashrafanil002' => 'ash2002',
    'aliwahid234' => 'diin222'
);

// Check if the login form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are valid
    if (array_key_exists($username, $authorized_users) && $authorized_users[$username] == $password) {
        // Store the login information in a session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: orders.php');
        exit(); // Make sure to add this line
    } else {
        $error_message = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Swahili Dishes Restaurant">
    <meta name="keywords" content="Swahili dishes, Mombasa, local restaurant, admin">
    <meta name="author" content="Ashraf Mohammed Hassan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin login</title>
    <style>
        #login_button:hover{
            background-color: rgb(18, 189, 18);
        }
    </style>
</head>
<body>
    <div class="header">
        
        <h1>Swahili Dishes Restaurant</h1>
        
        <p>Admin Log in Page</p>
        
        
    </div>

    <div class="navbar">
        <a href="about.html" class="left"><span>About us</span></a>
        <a href="menu.html"><span>Menu</span></a>
        <a href="home.html"><span>Home</span></a>
    </div>
<!-- Display the login form -->
        <h4 style="text-align: center;color:rgb(243, 121, 8)">Only log in if you are a staff worker in Swahili dishes</h4>
        <form method="POST">
        <div class="child_log" style="text-align: center;">
        <label for="username" style="font-size: 18px;">Username:</label>
        <br>
        <input type="text" name="username" id="username" required style="width:250px; height:40px;">
        <br>
        <br>

        <label for="password" style="font-size: 18px;">Password:</label>
        <br>
        <input type="password" name="password" id="password" required style="width:250px; height:40px;">
        <br>
        <br>


        &nbsp;
        &nbsp;
        &nbsp;
        <input type="submit" value="Log in" id="login_button" style="width:100px; height:40px; font-weight:bold">
        </div>
        
    </form>
    
    
</body>

<?php
if (isset($error_message)) {
    echo "<p>$error_message</p>";
}
?>
