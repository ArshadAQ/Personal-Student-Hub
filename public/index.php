<?php

    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    
    // query database for user
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $id);
    
    // store required records from porfolios into a new associative array
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup1($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
            "symbol" => $row["symbol"],
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "total" => ($row["shares"] * $stock["price"])
            ];
        }
    }
    
    // current cashbalance of user
    $cashbalance = CS50::query("SELECT cash FROM users WHERE id = ?", $id);
    
    // render portfolio with appropriate key-value pairs for displaying portfolio table
    render("portfolio.php", NULL, ["positions" => $positions, "title" => "Portfolio", "cashbalance" => $cashbalance]);
    
    
?>
