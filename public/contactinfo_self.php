<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/config1.php"); 
    
    $id = $_SESSION["id"];
    
    // query database of history table
    $rows = CS50::query("SELECT Address FROM users WHERE id = ?", $id);
    
    // store required records from history into a new associative array
    //$positions = $rows[0];
    $positions[] = [
            "Address" => $rows[0]["Address"]];
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($rows, JSON_PRETTY_PRINT));
    // render history_form
    //render(NULL, NULL,"contactinfo_form.php", ["positions" => $positions, "title" => "Contactinfo"]);
    
    
?>
