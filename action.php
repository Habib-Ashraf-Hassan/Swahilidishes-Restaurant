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
        $loc_description = $_POST["location_descr"];

        //Foods:
        $chapati = " ";
        $chapati_price = 0;
        $beans = "";
        $beans_price = 0;
        $chips = "";
        $chips_price = 0;
        $rice = "";
        $rice_price = 0;
        $pilau = "";
        $pilau_price = 0;

        //Drinks:
        $pepsi = "";
        $pepsi_price = 0;
        $mdew = "";
        $mdew_price = 0;
        $milk = "";
        $milk_price = 0;
        $mango = "";
        $mango_price = 0;
        $pineapple = "";
        $pineapple_price = 0;

        //Checking if the food are checked or not:
        if(isset($_POST["chapati"])){
            $chapati = $_POST["chapati"]."(".$_POST["chapati_amount"].")";
            $chapati_price = 30 * $_POST["chapati_amount"];
    
        }
        if(isset($_POST["beans"])){
            $beans = $_POST["beans"]."(".$_POST["beans_amount"].")";
            $beans_price = 60 * $_POST["beans_amount"];
        }
        if(isset($_POST["chips"])){
            $chips = $_POST["chips"]."(".$_POST["chips_amount"].")";
            $chips_price = 250 * $_POST["chips_amount"];
        }
        if(isset($_POST["rice"])){
            $rice = $_POST["rice"]."(".$_POST["rice_amount"].")";
            $rice_price = 100 * $_POST["rice_amount"];
        }
        if(isset($_POST["pilau"])){
            $pilau = $_POST["pilau"]."(".$_POST["pilau_amount"].")";
            $pilau_price = 120 * $_POST["pilau_amount"];
        }

        //Checking if drink was checked or not:
        if(isset($_POST["pepsi"])){
            $pepsi = $_POST["pepsi"]."(".$_POST["pepsi_amount"].")";
            $pepsi_price = 80 * $_POST["pepsi_amount"];
        }
        if(isset($_POST["mountaindew"])){
            $mdew = $_POST["mountaindew"]."(".$_POST["mountainDew_amount"].")";
            $mdew_price = 80 * $_POST["mountainDew_amount"];
        }
        if(isset($_POST["milkshake"])){
            $milk = $_POST["milkshake"]."(".$_POST["milkshake_amount"].")";
            $milk_price = 100 * $_POST["milkshake_amount"];
        }
        if(isset($_POST["mangojuice"])){
            $mango = $_POST["mangojuice"]."(".$_POST["mango_amount"].")";
            $mango_price = 80 * $_POST["mango_amount"];
        }
        if(isset($_POST["pineapplejuice"])){
            $pineapple = $_POST["pineapplejuice"]."(".$_POST["pineapple_amount"].")";
            $pineapple_price = 60 * $_POST["pineapple_amount"];
        }
        
        //Calculating the total:
        $total_food = $chapati.$beans.$chips.$rice.$pilau;
        $total_drink = $pepsi.$mdew.$milk.$mango.$pineapple;
        $total_price = $chapati_price + $beans_price + $chips_price + $rice_price + $pilau_price + $pepsi_price + $mdew_price + $milk_price + $mango_price + $pineapple_price;
        

        // Insert form data into database
        $sql = "INSERT INTO onlineorder (customer_name, phone_number, email, location, sublocation,food, drink, total, location_description ) VALUES('$customer', '$phoneNumber', '$email', '$loc', '$subLocation','$total_food', '$total_drink','$total_price', '$loc_description');";
        if (mysqli_query($conn, $sql)) {
            echo "<h3>New record created successfully</h3>";
            echo "Name: $customer"."<br>";
            echo "Phone number: $phoneNumber"."<br>";
            echo "Email: $email"."<br>";
            echo "Living at:<u>$loc</u>"."  Sub-location/Estate: <u>$subLocation</u>"."<br>"."<br>";
            echo "<b>Food and Drinks Chosen:</b>";
            echo "Food(s): $total_food"."<br>";
            echo "Drink(s): $total_drink"."<br>";
            echo "Total in kshs = $total_price"."<br>";

            
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