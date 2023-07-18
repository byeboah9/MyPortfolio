<style>
    th {
        text-align: right;
    }
</style>

<?php
session_start();
if (isset($_POST["checkout"])) {
    echo "<h2>Billing Information</h2>";
    echo "<form method = 'post' action = '6-20Confirm.php'>";
    echo "<table>";
    echo "<tr><th>Name:</th><td><input type = 'text' name = 'name'></td></tr>";
    echo "<tr><th>Email:</th><td><input type = 'email' name = 'email'></td></tr>";
    echo "<tr><th>Address:</th><td><input type = 'text' name = 'address'></td></tr>";
    echo "<tr><th>Credit Card Number:</th><td><input type = 'text' name = 'card'></td></tr>";
    echo "<tr><th>Expiration:</th><td><input type = 'month' name = 'expire'></td></tr>";
    echo "<tr><th>Security Code:</th><td><input type = 'text' name = 'code'></td></tr>";
    echo "<tr><th>Credit Card Charge:</th><td>".$_SESSION["totalCost"]."</td></tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type = 'submit' name = 'order' value = 'Place order'>";
    echo "</form>";
}
?>