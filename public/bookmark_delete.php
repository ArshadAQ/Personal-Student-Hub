<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/config1.php"); 
    
    $id = $_SESSION["id"];
    $b_name = $_GET["b_name"];
    $c_name = $_GET["c_name"];
    //$name3 = $_GET["name3"];
    
    // query database of history table
    //update 14 set emaild = new name where Name = ''
    $table_name = $id.$c_name.'links';
    //CS50::query("Drop table if exists  `$table_name_`");
    CS50::query("DELETE FROM  `$table_name` WHERE  `S.No` =  ?", $b_name);
    
    // store required records from history into a new associative array
    //$positions = $rows[0];
    /*$positions[] = [
            "Name" => $rows[0]["Name"],
            "Mobileno" => $rows[0]["Mobileno"],
            "Phoneno" => $rows[0]["Phoneno"],
            "EmailID" => $rows[0]["EmailID"],
            "Address" => $rows[0]["Address"]];
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($rows, JSON_PRETTY_PRINT));
    // render history_form
    //render(NULL, NULL,"contactinfo_form.php", ["positions" => $positions, "title" => "Contactinfo"]);*/
    
    
?>
