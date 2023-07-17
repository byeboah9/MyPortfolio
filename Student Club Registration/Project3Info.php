<?php
include "SQLFunctions.php";
include "5-30functions.php";
if (isset($_POST["login"])) {
    if(!empty($_POST["username"])) {
        $conn = connectDB();
        $sql = "SELECT * FROM itsaStudents where username = '".$_POST["username"]."'
        AND password = '".sha1($_POST["password"])."';";
        $result = exeSQL($conn, $sql);
        if (mysqli_num_rows($result) == 0) 
            echo "This combination of user name and password is invalid.<br>";
        else {
            greeting($_POST["username"]);
            if ($_POST["username"] == "admin")
                changeTable($conn);
            else
                showResults($result);
        }
        mysqli_free_result($result);
        disconnectDB($conn);
    }
}

function changeTable($conn) {
    $sql = "SELECT * FROM itsaStudents ORDER BY id";
    $result = exeSQL($conn, $sql);
    // showResults($result);

    echo "<form method = 'post' action = 'Project3Update.php'>";
    echo "<table border = '1'>";
        echo "<tr>";
        while ($fieldInfo = mysqli_fetch_field($result)) {
            if ($fieldInfo->name != "password")
                echo "<th>$fieldInfo->name</th>";
        }
        echo "<th>Delete</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach($row as $key=>$value) {
                if($key == "password")
                    continue;
                if($key == "id")
                    echo "<input type = 'hidden' name = 'idArray[]' value = '$value'>";
                if ($key == "fee")
                    echo "<td><input type = 'number' name = 'feeArray[]' value = '$value'></td>";
                else if ($key == "level") {
                    echo "<td><select size = '1' name = 'levelArray[]'>";
                    echo "<option value = 'Freshman'".($value == "Freshman"?"selected":"").">Freshman</option>";
                    echo "<option value = 'Sophomore'".($value == "Sophomore"?"selected":"").">Sophomore</option>";
                    echo "<option value = 'Junior'".($value == "Junior"?"selected":"").">Junior</option>";
                    echo "<option value = 'Senior'".($value == "Senior"?"selected":"").">Senior</option>";
                    echo "</select></td>";
                }
                else
                    echo "<td>$value</td>";
            }
            echo "<td><input type = 'checkbox' name = 'deleteArray[]' value = ".$row["id"]."></td>";
            echo "</tr>";
        }
    echo "</table>";
    echo "<br><input type = 'submit' name = 'update' value = 'Update'>";
    echo "</form>";
}

?>
