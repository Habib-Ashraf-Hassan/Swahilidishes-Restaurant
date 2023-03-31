<?php
include_once("includes/db_inc.php");
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
    <title>Response of submission</title>
</head>
<body>
    <div class="header">
        
        <h1>King Fries Restaurant</h1>
        
        <p>Response Page</p>
        
    </div>

    <div id="container1" style="text-align:center" >
        <span style="font-weight:bolder" >Order successfully submitted for <i class="fa fa-ok" ></i>:</span>
            <br>
    <?php
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve form data
        $customer = $_POST["name"];
        $phoneNumber = $_POST["phone"];
        $email = $_POST["email"];
        $loc = $_POST["location"];
        $subLocation = $_POST["subLocation"];

        $selected_FoodPrice = $_POST["food"];
        $foodOptions = array("0"=>"None", "30"=>"Chapati", "100"=>"Rice",
        "170"=>"Chapati(4) & Beans", "150"=>"Rice & Beans","120"=>"Pilau",
        "80"=>"Fries", "50"=>"Beans");
        $selected_food = $foodOptions["$selected_FoodPrice"];

        $selected_drinkPrice = $_POST["drinks"];
        $drinkOptions = array("0"=>"None", "35"=>"Soda", "60"=>"Juice",
        "100"=>"Milkshake", "50"=>"Tea","55"=>"Coffee");
        $selected_drink = $drinkOptions["$selected_drinkPrice"];

        $amount_food = $_POST["amountOfFood"];
        $amount_drinks = $_POST["amountOfDrinks"];
        if(!empty($_POST["food"])){
            $food = $_POST["food"];
        }
        else{
            $food = 0;
        }
        if(!empty($_POST["drinks"])){
            $drinks = $_POST["drinks"];
        }
        else{
            $drinks = 0;
        }
        $total = ($food * $amount_food) + ($drinks * $amount_drinks);
        $loc_description = $_POST["location_descr"];

        // Insert form data into database
        $sql = "INSERT INTO onlineorder (customer_name, phone_number, email, location, sublocation, food, drink,total, location_description ) VALUES('$customer', '$phoneNumber', '$email', '$loc', '$subLocation', '$selected_food', '$selected_drink', '$total', '$loc_description');";
        if (mysqli_query($conn, $sql)) {
            echo "<h3>New record created successfully</h3>";
            echo "Name: $customer"."<br>";
            echo "Phone number: $phoneNumber"."<br>";
            echo "Email: $email"."<br>";
            echo "Living at:<u>$loc</u>"."  Sub-location/Estate: <u>$subLocation</u>"."<br>"."<br>";
            echo "<b>Food and Drinks Chosen:</b>";

            echo "<div>Food: $selected_food"." ";
            echo "Drink: $selected_drink"."<br>"."<br>";
            echo "<b>Total Amount: &nbsp</b>"."<br>";
            echo "ksh $total"."</div>";
            echo "<b>Description of location:</b>"."<br>";
            echo "--->> $loc_description";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          mysqli_close($conn);



        


    ?>
    </div>
    
</body>
</html>