<?php
 function showTitle($title) {
     echo "<h1 style = 'color: blue; text-decoration: underline;'>".
     $title. "</h1>";
 }
 function greeting($name) {
        $hour = date("H");
        //echo hour
        if ($hour < "12") {
            echo "Good morning";
        } else if ($hour < "18") {
            echo "Good afternoon";
        } else {
            echo "Good evening";
        }
        echo ", $name. <br>";
    }
 function showCarInfo() {
     echo "You bought your " . $_POST["brand"]. " in " . $_POST["year"] . " for $" . number_format($_POST["price"]) . ".<br>";
 }

 function carPrice($original, $years) {
     if($years >= 40) {
         $currentPrice = 1.5 * $original;
     } else if($years >= 20) {
         $currentPrice = 0.2 * $original;
     } else if($years >= 10) {
         $currentPrice = 0.4 * $original;
     } else {
         $currentPrice = 0.8 * $original;
     }
     return $currentPrice;
 }

 function showEmoji($feeling){
     switch ($feeling) {
         case "happy": 
            echo "<img src = '/Images/happy.png' width=100px height=100px>";
            break;
         case "sad": 
            echo "<img src = '/Images/sad.png' width=100px height=100px>";
            break;
         case "mad": 
            echo "<img src = '/Images/mad.png' width=100px height=100px>";
            break;
          default: 
            echo "<img src = '/Images/emotionless.png' width=100px height=100px>";
            break;
    }
 }
 function priceTable($n) {
     echo "<table border = 1>";
     echo "<tr>";
     global $now;
     for ($i = 1; $i <= $n; $i++) {
        echo "<td>" . ($now+$i) . "</td>";
     }
     echo "</tr>";
     echo "<tr>";
     global $myCarPrice;
     global $nyears;
     $newPrice = $myCarPrice;
     for ($i = 1; $i <= $n; $i++) {
         if (($nyears + $i) < 40) 
         $newPrice = $newPrice * (1-0.02);
         else 
         $newPrice = $newPrice * (1+0.02);
        echo "<td>" . number_format($newPrice, 2) . "</td>";
     }
     echo "</tr>";
     echo "</table>";
 }
?>