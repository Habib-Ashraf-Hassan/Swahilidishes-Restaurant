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

        $chaps = $_POST["chapati"];
        $bean = $_POST["beans"];
        $chips = $_POST["chips"];
        $rice = $_POST["rice"];
        $pilau = $_POST["pilau"];

        $pepsi = $_POST["pepsi"];
        $dew = $_POST["mountaindew"];
        $milk = $_POST["milkshake"];
        $mango = $_POST["mangojuice"];
        $pine = $_POST["pineapplejuice"];

        if(isset($chaps)){
            $food1 = " Chapati";
            $a1 = $_POST["chapati_amount"];
            $food1_price = $a1 * 30;
        }
        else{
            $food1 = "__";
            $food1_price = 0;
        }

        if(isset($bean)){
            $food2 = " Beans";
            $a2 = $_POST["beans_amount"];
            $food2_price = $a2 * 60;
        }
        else{
            $food2 = "no beans";
            $food2_price = 1;
        }
        if(isset($chips)){
            $food3 = " Chips";
            $a3 = $_POST["chips_amount"];
            $food3_price = $a3 * 80;
        }
        else{
            $food3 = "__";
            $food3_price = 0;
        }
        if(isset($rice)){
            $food4 = " Rice";
            $a4 = $_POST["rice_amount"];
            $food4_price = $a4 * 100;
        }
        else{
            $food4 = "__";
            $food4_price = 0;
        }
        if(isset($pilau)){
            $food5 = " Pilau";
            $a5 = $_POST["pilau_amount"];
            $food5_price = $a5 * 120;
        }
        else{
            $food5 = "__";
            $food5_price = 0;
        }


        if(isset($pepsi)){
            $drink1 = " Pepsi";
            $d1 = $_POST["pepsi_amount"];
            $drink1_price = $d1 * 80;
        }
        else{
            $drink1 = "..";
            $drink1_price = 0;
        }
        if(isset($dew)){
            $drink2 = " Mountain dew";
            $d2 = $_POST["mountainDew_amount"];
            $drink2_price = $d2 * 80;
        }
        else{
            $drink2 = "..";
            $drink2_price = 0;
        }
        if(isset($milk)){
            $drink3 = " Milk shake";
            $d3 = $_POST["milkshake_amount"];
            $drink3_price = $d3 * 100;
        }
        else{
            $drink3 = "..";
            $drink3_price = 0;
        }
        if(isset($mango)){
            $drink4 = " Mango juice";
            $d4 = $_POST["mango_amount"];
            $drink4_price = $d4 * 80;
        }
        else{
            $drink4 = "..";
            $drink4_price = 0;
        }
        if(isset($pine)){
            $drink5 = " Pineapple juice";
            $d5 = $_POST["pineapple_amount"];
            $drink5_price = $d5 * 30;
        }
        else{
            $drink5 = "..";
            $drink5_price = 0;
        }
        $total_food = $food1.$food2.$food3.$food4.$food5;
        $total_drink = $drink1.$drink2.$drink3.$drink4.$drink5;
        $total = $food1_price + $food2_price + $food3_price + $food4_price + $food5_price + $drink1_price + $drink2_price + $drink3_price + $drink4_price + $drink5_price;


        $loc_description = $_POST["location_descr"];

        // Insert form data into database
        $sql = "INSERT INTO onlineorder (customer_name, phone_number, email, location, sublocation,food, drink, total, location_description ) VALUES('$customer', '$phoneNumber', '$email', '$loc', '$subLocation','$total_food', '$total_drink','$total', '$loc_description');";
        if (mysqli_query($conn, $sql)) {
            echo "<h3>New record created successfully</h3>";
            echo "Name: $customer"."<br>";
            echo "Phone number: $phoneNumber"."<br>";
            echo "Email: $email"."<br>";
            echo "Living at:<u>$loc</u>"."  Sub-location/Estate: <u>$subLocation</u>"."<br>"."<br>";
            echo "<b>Food and Drinks Chosen:</b>";
            echo "Food(s): $total_food"."<br>";
            echo "Drink(s): $total_drink"."<br>";
            echo "Total in kshs = $total"."<br>";

            
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