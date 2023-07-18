<style>
    th{text-align: right;}
</style>
<?php
session_start();
if (isset($_POST["order"])) {
    echo "<h2>Order Confirmation</h2>";
    echo "Thank you for shopping with us.<br>";
    echo "A confirmation email was sent to " . $_POST["email"] . ".<br>";
    echo "<h3>Your order:</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Item</th><th>Description</th><th>Price</th><th>Quantity</th>";
    echo "</tr>";
    for ($i = 0; $i < count($_SESSION["quantity"]); $i++) {
        if ($_SESSION["quantity"][$i] > 0) {
            echo "<tr>";
                echo "<td><img src = '" . $_SESSION["image"][$i] . "'  width  = '100px'></td>";
                echo "<td>" . $_SESSION["description"][$i] . "</td>";
                echo "<td>$" . $_SESSION["price"][$i] . "</td>";
                echo "<td>" . $_SESSION["quantity"][$i] . "</td>";
            echo "</tr>";
        }
    }
    echo "<tr style = 'font-weight: bold;'>";
    echo "<td>&nbsp;</td><td>Total</td><td>$" . $_SESSION["totalCost"] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";

    echo "<h3>Billing Information:</h3>";
    echo "<table>";
    echo "<tr><td style = 'text-align: center;'><b>Name:</b></td><td>".$_POST["name"]."</td></tr>";
    echo "<tr><td style = 'text-align: center;'><b>Email:</b></td><td>".$_POST["email"]."</td></tr>";
    $digits = substr($_POST["card"], - 4); //last 4 digitsf
    echo "<tr><td style = 'text-align: center;'><b>Credit Card Number End In:</b></td><td>$digits</td></tr>";
    echo "</table>";
    echo "<br>";

    //send email
    $mailTo = $_POST["email"];
    $subject = "Order confirmation from GGC Computer Store";
    $message = "
    <html>
    <head><title>Order confirmation</title></head>
    <body>
    <p>Dear " . $_POST["email"] . ",</p>
    <p>Thank you for your order at GGC Computer Store.</p>
    <p>Your order total is $" . $_SESSION["totalCost"] . ".</p>";

    // if($_SESSION["totalCost"] > 0) {
    //     $message .= "
    //     <h3>Your order:</h3>
    //     <table>
    //     <tr>
    //     <th>Item</th><th>Description</th><th>Price</th><th>Quantity</th>;
    //     </tr>";

    //     for ($i = 0; $i < count($_SESSION["quantity"]); $i++) {
    //         if ($_SESSION["quantity"][$i > 0]) {
    //             $message .= "<tr>
    //             <td><img src = '" . $_SESSION["image"][$i] . "'  width  = '100px'></td>
    //             <td>" . $_SESSION["description"][$i] . "</td>
    //             <td>$" . $_SESSION["price"][$i] . "</td>
    //             <td>" . $_SESSION["quantity"][$i] . "</td>
    //             </tr>";
    //         }
    //     }

    //     $message .= 
    //     "<tr style = 'font-weight: bold;'>
    //     <td>&nbsp;</td><td>Total</td><td>$" . $_SESSION["totalCost"] . "</td>
    //     </tr>
    //     </table>
    //     <br>";

    //     $message .= 
    //     "<h3>Billing Information:</h3>
    //     <table>
    //     <tr><td style = 'text-align: center;'><b>Name:</b></td><td>".$_POST["name"]."</td></tr>
    //     <tr><td style = 'text-align: center;'><b>Email:</b></td><td>".$_POST["email"]."</td></tr>
    //     <tr><td style = 'text-align: center;'><b>Credit Card Number End In:</b></td><td>$digits</td></tr>
    //     </table>
    //     <br>
    //     <body>
    //     </html>";
    // }
    
    $other = "MIME-Version: 1.0" . "\r\n";
    $other .= "Content-type: text/html; charset = UTF-8" . "\r\n";
    $other .= "From: <order@ggcstore.com>" . "\r\n";
    $other .= "Cc: barbara.yeboah@yahoo.com" . "\r\n";
    mail($mailTo, $subject, $message, $other);
}
?>