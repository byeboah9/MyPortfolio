<?php
    include "SQLFunctions.php";
    if (isset($_POST["update"])){
        $conn = connectDB();

        foreach($_POST["feeArray"] as $index => $fee){
            $sql = "UPDATE itsaStudents SET fee = $fee " . 
            " WHERE id = " . $_POST["idArray"][$index] . ";";
            $result = exeSQL($conn, $sql);
        }
        
        if (isset($_POST["deleteArray"])){
            foreach($_POST["deleteArray"] as $index => $id){
                if (isset($_POST["deleteArray"][$index])){
                    $sql = "DELETE FROM itsaStudents WHERE id = $id";
                    $result = exeSQL($conn, $sql);
                }
            }
        }
        

        echo "<h2>Updated Table</h2>";

        $sql = "SELECT * FROM itsaStudents ORDER BY id;";
        $result = exeSQL($conn, $sql);
        showResults($result);

        mysqli_free_result($result);
        disconnectDB($conn);
    }

?>
