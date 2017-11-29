<?php

    require(__DIR__ . "/../includes/config1.php");
    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $contacts = [];
    
    // select rows (max of 50) which match search
    $contacts = CS50::query("SELECT * FROM  `14` WHERE MATCH (Name, Mobileno, Phoneno, EmailID) AGAINST (?) LIMIT 50", $_GET["geo1"]);


    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($contacts, JSON_PRETTY_PRINT));

?>