<?php
    include_once 'includes/dbh.inc.php';
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>
<div><h1> PHP Database </h1>
    <div>

<form method="post" action="dbactions.php">
<div>
    First Name
    <input type= "text" id ="fname" name="fname" value="" required >
</div>

<div>
    Last Name
    <input type= "text" id ="lname" name="lname" value = "" required>
</div>

<button> Submit</button>
</form>

<?php

//mySelect();

//function mySelect(){

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "worlddb";
    

    $mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbname);

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }


    $sql = "SELECT * FROM usuarios";
    
    // Perform query

    if ($mysqli->multi_query($sql)) {
        do {
            /* store first result set */
            if ($result = $mysqli->use_result()) {
                while ($row = $result->fetch_row()) {
                    echo '<br>' . $row[1];
                    echo ' ' . $row[0];
                }
                $result->close();
            }
            /* print divider */
            if ($mysqli->more_results()) {
                printf("-----------------\n");
            }
        } while ($mysqli->next_result());
    }

    $mysqli->close();


//}


?>