document.getElementById("order_customerDetails").onclick = function(){
    document.getElementById("customerDetails").innerHTML="Customer Details(Fill in all the fields):";
}
document.getElementById("order_food_drinks").onclick = function(){
    document.getElementById("food_drinks").innerHTML="Order food/drinks(Fill in all the fields):";
}
document.getElementById("loc_desc").onclick = function(){
    document.getElementById("location_description").innerHTML="Describe your location:";
}
function acceptDetails(){
    let foodChoice = document.getElementById("food").value;
    let drinkChoice = document.getElementById("drinks").value;
    
    if(foodChoice=="0" && drinkChoice=="0"){
        alert("Please select a food or drink!!");
        return false;
    }
    else{
        return confirm("Do you wish to submit the order?\nPress Ok to proceed and CANCEL to go back to the form below");
    }
    
}