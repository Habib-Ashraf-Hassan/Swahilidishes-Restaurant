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
    <div id="container1" >
        <span style="font-weight:bolder" >Order successfully submitted for <i class="fa fa-ok" ></i>:</span>
            <br>
    <?php
        $customer = $_POST["name"];
        $phoneNumber = $_POST["phone"];
        $email = $_POST["email"];
        $location = $_POST["location"];
        $addr = $_POST["address"];

        $selected_FoodPrice = $_POST["food"];
        $foodOptions = array("0"=>"None", "30"=>"Chapati", "100"=>"Rice",
        "170"=>"Chapati(4) & Beans", "150"=>"Rice & Beans","120"=>"Pilau",
        "80"=>"Fries", "50"=>"Beans");
        $selected_food = $foodOptions["$selected_FoodPrice"];

        $selected_drinkPrice = $_POST["drinks"];
        $drinkOptions = array("0"=>"None", "35"=>"Soda", "60"=>"Juice",
        "100"=>"Milkshake", "50"=>"Tea","55"=>"Coffee");
        $selected_drink = $drinkOptions["$selected_drinkPrice"];

        echo "Name: $customer"."<br>";
        echo "Phone number: $phoneNumber"."<br>";
        echo "Email: $email"."<br>";
        echo "Living at: $location"." Address $addr"."<br>";

        echo "Food: $selected_food"." ";
        echo "Drink: $selected_drink";

    ?>
    </div>
    <div id="container2" >
        <span style="font-weight:bolder">Food and Drinks Chosen:</span><br>

    <?php
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

        echo "Food: $selected_food"." ";
        echo "Drink: $selected_drink";

        echo "<div> Total Amount: &nbsp";
        echo "ksh $total"."</div>";




    ?>
    </div>
    <div class="container3" style="color:green">
        <!-- Total Amount: &nbsp; -->
    <?php
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
        echo "ksh $total";
    ?>
    </div>
</body>
</html>