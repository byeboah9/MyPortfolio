<?php
    session_start();  
    if(isset($_POST["send"])) {
        $imageArray = $_POST["image"];
        $descArray = $_POST["description"];
        $priceArray = $_POST["price"];
        $quanArray = $_POST["quantity"];
        $_SESSION["totalCost"] = 0;
        $_SESSION["totalQuan"] = 0;
        echo "<h2>Your Shopping Cart</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Item</th><th>Description</th><th>Price</th><th>Quantity</th>";
        echo "</tr>";
        foreach($quanArray as $index=>$quantity) {
            if ($quantity > 0) {
                $_SESSION["image"][$index] = $imageArray[$index];
                $_SESSION["description"][$index] = $descArray[$index];
                $_SESSION["price"][$index] = $priceArray[$index];
                $_SESSION["quantity"][$index] = $quantity;
                $_SESSION["totalCost"] += $priceArray[$index] * $quantity;
                $_SESSION["totalQuan"] += $quantity;
                echo "<tr>";
                    echo "<td><img src = '" . $imageArray[$index] . "'  width  = '100px'></td>";
                    echo "<td>" . $descArray[$index] . "</td>";
                    echo "<td>$" . $priceArray[$index] . "</td>";
                    echo "<td>" . $quantity . "</td>";
                echo "</tr>";
            }
            else {
                $_SESSION["quantity"][$index] = 0;
            }
        }
        // echo "<tr>"; (part of shwing subtotal, tax, & total)
        echo "</table>";
        echo "<br>";
        echo "<form method = 'post' action = '6-20Bill.php'>";
        echo "<input type = 'submit' name = 'checkout' value = 'Check Out'>";
        echo "</form>";
    } 
?>
<!DOCTYPE html>
<html>
<head>
   <title>6-20</title>
</head>
<body>
    
</body>
</html>