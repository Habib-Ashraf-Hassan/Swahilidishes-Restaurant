<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the online orders from the database
$sql = "SELECT order_id, customer_name, phone_number, email, location FROM onlineorder;";
$result = $conn->query($sql);

// // Display the orders in a table
// if ($result->num_rows > 0) {
//     echo "<table>";
//     echo "<tr><th>Order ID</th><th>Client Name</th><th>Phone Number</th><th>Email</th><th>Location</th></tr>";
//     while($row = $result->fetch_assoc()) {
//         echo "<tr>";
//         echo "<td>".$row["order_id"]."</td>";
//         echo "<td>".$row["customer_name"]."</td>";
//         echo "<td>".$row["phone_number"]."</td>";
//         echo "<td>".$row["email"]."</td>";
//         echo "<td>".$row["location"]."</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// } else {
//     echo "No online orders found.";
// }

// $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/style.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customers' Data</title>
    <style>
        #logout_button:hover{
        background-color: red;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        } 
    </style>
</head>
<body>
    <div class="header">
                
        <h1>King Fries Restaurant</h1>
                
        <p>Customers' Order details</p>
                
                
    </div>
    
    <?php
    // Display the orders in a table
    if ($result->num_rows > 0) {
        echo "<div style=\"font-size: 20px;\">";
        echo "<table>";
        echo "<tr><th>Order ID</th><th>Client Name</th><th>Phone Number</th><th>Email</th><th>Location</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["order_id"]."</td>";
            echo "<td>".$row["customer_name"]."</td>";
            echo "<td>".$row["phone_number"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["location"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No online orders found.";
    }

    $conn->close();
    ?>
    <!-- Add a logout button -->
    <br>
    <br>
    <form action="logout.php" method="POST">
        <div style="text-align: center;"><button type="submit" name="logout" id="logout_button" style="width:100px; height:40px; font-weight:bold">Logout</button></div>
        
    </form>
    
</body>
</html>
