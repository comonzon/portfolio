
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    </head>
    <body>


<?php



    myInsert();
    mySelect();


    function myInsert(){

        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "worlddb";

        
        //insert values to db

        $mysqli2 = new mysqli($dbServername, $dbUsername, $dbPassword, $dbname);


        if ($mysqli2 -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli2 -> connect_error;
            exit();
        }

        $first_name = $_REQUEST['fname'];
        $last_name = $_REQUEST['lname'];

        //echo "<br> variables: " . $first_name . " " . $last_name;
        $sqlInsert = "INSERT INTO USUARIOS (first, last) VALUES ('". $first_name . "','" . $last_name . "');";
        //echo '<br> sql: ' . $sqlInsert;


        if($mysqli2->query($sqlInsert) === TRUE){
            echo '<br> <h1> Thank you for submitting the form </h1>';
            echo '<a href =index.php> Go Back </a>';
        } else {
            echo "<br> <strong> Error " . $sqlInsert . "<br>" . $mysqli2->error;
        }
        if ($mysqli2→errno) {
            printf("Could not insert record into table: %s<br />", $mysqli2→error);
        }

        $mysqli -> close();

  }
  
  function mySelect(){

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


    }



?>




   </body>
</html>