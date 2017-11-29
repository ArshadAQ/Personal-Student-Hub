<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/config1.php"); 
    
    $id = $_SESSION["id"];
    $name = $_GET["name"];
    // query database of history table
    $rows = CS50::query("SELECT Name, EmailID FROM `$id` WHERE MATCH(Name, EmailID) AGAINST (?) LIMIT 50", $_GET["name"]);
    $rows = CS50::query("SELECT Name, EmailID FROM `$id` WHERE Name like '%$name%' or EmailID like '%$name%' ");
    //$places = CS50::query("SELECT * FROM places WHERE MATCH (postal_code, place_name, admin_name1, admin_name2) AGAINST (?) LIMIT 50", $_GET["geo"]);
    
    //store required records from history into a new associative array
    //$positions = $rows[0];
    foreach ($rows as $row)
        {
    
            $positions[] = [
            "name" => $row["Name"],
            "email" => $row["EmailID"]
            ];
        }
 
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($rows, JSON_PRETTY_PRINT));
    // render history_form
    //render(NULL, NULL, NULL,"sharebookmark_form.php", ["positions" => $positions, "title" => "Sharebookmark"]);
    
    
?>
