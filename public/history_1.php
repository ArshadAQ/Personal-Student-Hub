<?php

    // configuration
    require("../includes/config.php");
    require("../includes/config1.php");

    $id = $_SESSION["id"];

    $c_name = $_GET["q"];
    // query database of history table
    $servername = "localhost";
    $username = "arshadaq";
    $password = "zrrJ8zNEdpuTwuty";
    $dbname = "Finalproject";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


    $table_name = $id. $c_name.'links';
    $sql = "SELECT Bookmark_link FROM `$table_name`";
    //$sql = "SELECT Name FROM `$id` WHERE Name = $name";
    $result = $conn->query($sql);
    //echo $result;
    /*if($result!=NULL)
        echo "Hi";
    else
        echo "NULL"*/
        $positions = [];
    if($result != NULL)
    {
        $rows = CS50::query("SELECT * FROM `$table_name`");
        foreach ($rows as $row)
        {

            $positions[] = [
            "S.No" => $row["S.No"],
            "bookmark_link" => $row["Bookmark_link"],
            "description" => $row["Description"],
            "date/time" => $row["date/time"]
            ];
        }
        //print_r($positions);
        render("history_form_1.php", NULL,"addbookmark_form.php", "sharebookmark_form.php","modify_bookmark_form.php", ["positions" => $positions, "title" => "History"]);

    }
    else
    {
        $positions[] = [
            "S.No" => "",
            "bookmark_link" => "",
            "description" => "",
            "date/time" => ""
            ];

            render("history_form_1.php", NULL,"addbookmark_form.php","sharebookmark_form.php","modify_bookmark_form.php", ["positions" => $positions, "title" => "History"]);
    }
    //$rows = CS50::query("SELECT Course_Name FROM `$table_name`");

    // store required records from history into a new associative array


    // render history_form


?>

