<?php

    require(__DIR__ . "/../includes/config1.php");
    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    
    // select rows (max of 50) which match search
    $places = CS50::query("SELECT * FROM places WHERE MATCH (postal_code, place_name, admin_name1, admin_name2) AGAINST (?) LIMIT 50", $_GET["geo"]);


    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>