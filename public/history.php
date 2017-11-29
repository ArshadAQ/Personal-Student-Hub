<?php

    // configuration
    require("../includes/config.php");
    require("../includes/config1.php");

    $id = $_SESSION["id"];

    //$course_name = $_POST["course_name"];
    // query database of history table
    $servername = "localhost";
    $username = "arshadaq";
    $password = "zrrJ8zNEdpuTwuty";
    $dbname = "Finalproject";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


    $table_name = $id.'courses';
    $sql = "SELECT Course_Name FROM `$table_name`";
    //$sql = "SELECT Name FROM `$id` WHERE Name = $name";
    $result = $conn->query($sql);
    if($result != NULL)
    {
        $rows = CS50::query("SELECT * FROM `$table_name`");
        $positions = [];
        foreach ($rows as $row)
        {

            $positions[] = [
            "Course_Name" => $row["Course_Name"],
            "date/time" => $row["date/time"]
            ];
        }
        render("history_form.php", NULL,"addcourse_name_form.php",NULL,"modifycourse_name_form.php", ["positions" => $positions, "title" => "History"]);

    }
    else
    {
        $positions[] = [
            "Course_Name" => "",
            "date/time" => ""
            ];

            render("history_form.php", NULL,"addcourse_name_form.php",NULL, "modifycourse_name_form.php", ["positions" => $positions, "title" => "History"]);
    }
    //$rows = CS50::query("SELECT Course_Name FROM `$table_name`");

    // store required records from history into a new associative array


    // render history_form
    phpinfo();


?>

