<?php

    // configuration
    require("../includes/config.php");
    require("../includes/config1.php");

    $id = $_SESSION["id"];



        $servername = "localhost";
        $username = "arshadaq";
        $password = "zrrJ8zNEdpuTwuty";
        $dbname = "Finalproject";

        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $name1 = "select username from users where id =$id";
        $name = mysqli_query($link, $name1);
        $row = mysqli_fetch_array($name);
        $name = $row["username"];

        // Attempt select query execution
        $sql = "SELECT Name, EmailID FROM `$id` ORDER BY Name";
        $result = mysqli_query($link, $sql);

        while($row = mysqli_fetch_array($result)){
            $positions[] = [
                "name" => $row['Name'],
                "emailid" => $row['EmailID']
                ];
        }

        mysqli_free_result($result);
        // Close connection
        mysqli_close($link);

        // render symbol_form
        render("symbol_form.php", "addcontact_form.php", "contactinfo_form.php", NULL, NULL, ["positions" => $positions, "name" => $name]);


?>
