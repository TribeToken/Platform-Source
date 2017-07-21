<?php

//FUNCTION TO GE THE TOTAL AMOUNT OF TOKENS
//RAISED FOR A CERTAIN PROJECT SPECIFIED BY ITS DONATION ID

function getRaisedAmount($projectid){
//Database Configs
$servername = "localhost"; //server name or ip
$username = "root"; //database user
$password = ""; // database pass
$dbname = "ttplat"; //database name	
// Create connection to database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection has been successfull
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//set total amount of tokens
$total = 0;
//get all donations to this project from the database
$sql = "SELECT value FROM donations WHERE project = " . $projectid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //for each add to total
		$total = $total + $row['value'];
		
    }
}
$conn->close();

//return total
return $total;
}
?>