<!DOCTYPE HTML>
<html>
    <head>
        <title>Project 3 Register</title>
        <style>
            div{
                text-align: center; 
                background-color: lightgray;
                border-color: black;
                border-width: 2px;
                border-style: solid;
                padding-bottom: 15px;
            }
            span {
                color: rgba(3,113,193,255);
            }
            .center{
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body style="background-color: rgba(3,113,193,255); font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <img src="/Images/ITSA_Logo.png" alt="ITSA Logo" width="150px" height="150px" class= "center">
        <form method = "post" action = "" enctype="multipart/form-data">
        <div>
            <h2>Your Info</h2>
            <span>*</span>Name:
            <br>
            <input type="text" name="name" placeholder="John Doe" required>
            <br><br>
            <span>*</span>Username:
            <br>
            <input type="text" name="username" required>
            <br><br>
            <span>*</span>Password:
            <br>
            <input type = "password" name = "password1" required>
            <br><br>
            <span>*</span>Retype Password:
            <br>
            <input type = "password" name = "password2" required>
            <br><br>
            <span>*</span>Email:
            <br>
            <input type="email" name="email" placeholder="jdoe@gmail.com" required>
            <br><br>
            Phone Number:
            <br>
            <input type="tel" name="phone" placeholder="888-888-888">
            <br><br>
            Gender:
            <br>
            <input type="radio" id="genderm" name="gender" value="Male"> 
            <label for="genderm">Male</label>
            <input type="radio" id="genderf" name="gender" value="Female">
            <label for="genderf">Female</label>
            <br><br>
            Your level at GGC:
            <br>
            <select name="level" id="level">
                <option value="Freshman">Freshman</option>
                <option value="Sophomore">Sophomore</option>
                <option value="Junior">Junior</option>
                <option value="Senior">Senior</option>
            </select>   
            <br> <br>
            Your Concentration:
            <br>
            <input type="radio" id="SD" name="concentration" value="Software Development">
            <Label for="SD">Software Development</Label>&nbsp;
            <input type="radio" id="DM" name="concentration" value="Digital Media">
            <Label for="DM">Digital Media</Label>&nbsp;
            <input type="radio" id="SS" name="concentration" value="System Security">
            <Label for="SS">Systems & Security</Label>&nbsp;
            <input type="radio" id="ES" name="concentration" value="Enterprise System">
            <Label for="ES">Enterprise System</Label>&nbsp;
            <input type="radio" id="DS" name="concentration" value="Data Science">
            <Label for="DS">Data Science and Analytics</Label>&nbsp;
        </div>
        <br>
        <div style="text-align: left;">
            <h2 style="text-align: center;">Questions</h2>
            &nbsp;1. What does ITSA stand for? (20 points)
            <br>
            <input type="radio" id="Q1A" name="Q1" value="A">
            <Label for="Q1A">A. Information Technology Students of America</Label>&nbsp;
            <input type="radio" id="Q1B" name="Q1" value="B">
            <Label for="Q1B">B. Information Technology Student Association</Label>&nbsp;
            <input type="radio" id="Q1C" name="Q1" value="C">
            <Label for="Q1C">C. International Tech Student Association</Label>&nbsp;
            <input type="radio" id="Q1D" name="Q1" value="D">
            <Label for="Q1D">D. Information Technology and Security Association </Label>
            <!-- correct answer is A -->
            <br><br>
            &nbsp;2. What is the cost to join the club? (20 points)
            <br>
            <input type="radio" id="Q2A" name="Q2" value="A">
            <Label for="Q2A">A. $20</Label>&nbsp;
            <input type="radio" id="Q2B" name="Q2" value="B">
            <Label for="Q2B">B. $10</Label>&nbsp;
            <input type="radio" id="Q2C" name="Q2" value="C">
            <Label for="Q2C">C. $35</Label>&nbsp;
            <input type="radio" id="Q2D" name="Q2" value="D">
            <Label for="Q2D">D. FREE!</Label>
            <!-- correct answer is D -->
            <br><br>
            &nbsp;3. Do you need technical knowledge to join ITSA? (20 points)
            <br>
            <input type="radio" id="Q3A" name="Q3" value="A">
            <Label for="Q3A">A. Yes</Label>&nbsp;
            <input type="radio" id="Q3B" name="Q3" value="B">
            <Label for="Q3B">B. No</Label>&nbsp;
            <!-- correct answer is B -->
            <br><br>
            &nbsp;4. What types of events does ITSA host?
            <br>
            <input type="checkbox" id="Q4A" name="Q4A" value="yes">
            <Label for="Q4A">A. Hackathons</Label>&nbsp;
            <input type="checkbox" id="Q4B" name="Q4B" value="yes">
            <Label for="Q4B">B. Guest Speaker Presentations</Label>&nbsp;
            <input type="checkbox" id="Q4C" name="Q4C" value="yes">
            <Label for="Q4C">C. Workshops</Label>&nbsp;
            <input type="checkbox" id="Q4D" name="Q4D" value="yes">
            <Label for="Q4D">D. Career Fairs</Label>
            <!-- correct answer is ABCD -->
            <br><br>
            &nbsp;5. ITSA is open to students of all Majors! (20 points)
            <br>
            <input type="radio" id="Q5A" name="Q5" value="A">
            <Label for="Q5A">A. True</Label>&nbsp;
            <input type="radio" id="Q5B" name="Q5" value="B">
            <Label for="Q5B">B. False</Label>&nbsp;
            <!-- correct answer is A -->
        </div>
        <br>
        <div style="padding-top: 15px;">
            <input type="submit" name = "submit">
            <input type="reset">
        </div>
        </form>
    </body>
</html>

<?php
include "SQLFunctions.php";

$score = 0;
    // Answer for Q1 is A
    // Answer for Q2 is D
    // Answer for Q3 is B
    // Answer for Q4 is ABCD
    // Answer for Q5 is A
    if ($_POST["Q1"] == "A") {
        $score += 20;
    }
    if ($_POST["Q2"] == "D") {
        $score += 20;
    }
    if ($_POST["Q3"] == "B") {
        $score += 20;
    }
    if (($_POST["Q4A"] == "yes") && ($_POST["Q4B"] == "yes") && ($_POST["Q4C"] == "yes") && ($_POST["Q4D"] == "yes")) {
        $score += 20;
    }
    if ($_POST["Q5"] == "A") {
        $score += 20;
    }
    if ($score < 60) {
        $kl = "Beginner";
    } else if ($score < 80) {
        $kl = "Intermediate";
    }
    else {
        $kl = "Advanced";
    }
    $fee = 0;

if (isset ($_POST["submit"])) {
    if ($_POST["password1"] != $_POST["password2"]) {
        die("Passwords do not match");
    }
    if (isset($_POST["username"]) && !empty ($_POST["username"])) {
        $conn = connectDB();
        $sql = "SHOW TABLES LIKE 'itsaStudents';";
        $result = exeSQL($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            $sql = "CREATE TABLE itsaStudents 
            (id INT NOT NULL AUTO_INCREMENT,
                username VARCHAR(20) NOT NULL,
                password VARCHAR (64) NOT NULL,
                name VARCHAR(20) NOT NULL,
                email VARCHAR(20) NOT NULL,
                phone FLOAT (10),
                gender VARCHAR(10),
                concentration VARCHAR (64),
                score FLOAT (3),
                kl VARCHAR (10),
                fee FLOAT (3),
                PRIMARY KEY(id)
            )";
            exeSQL($conn, $sql);
        }
        $sql = "SELECT * FROM itsaStudents WHERE name ='" . $_POST["username"] . "';";
        $result = exeSQL($conn, $sql);
        if(mysqli_num_rows($result) > 0) 
            die("User name exists, please choose another one.");
        else {
            $sql = "INSERT INTO itsaStudents(username, password, name, email, phone, gender, concentration, score, kl, fee)
            VALUES('".$_POST["username"]."', '".sha1($_POST["password1"])."', '".$_POST["name"]."',
            '".$_POST["email"]."', '".$_POST["phone"]."', '".$_POST["gender"]."', 
            '".$_POST["concentration"]."', $score, '$kl', '$fee');";
            exeSQL($conn, $sql);

            echo "<br>Click <a href = 'Project3Login.html'>Here</a> to log in.<br>";
        }
        
    }
}
?>
