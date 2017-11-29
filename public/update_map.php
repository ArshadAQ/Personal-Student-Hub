<?php

    require(__DIR__ . "/../includes/config1.php");
    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $place = [];
    $address = [];
    
    // select rows (max of 50) which match search
    $place = CS50::query("SELECT p.* FROM places p, `14` u WHERE u.Name = ? and u.Address like concat('%',p.postal_code,'%') ",$_GET["cname"]);
    //$address = CS50::query("SELECT Address FROM `14` u WHERE u.Name = ?", $_GET["cname"]);
    //$address = '%'.$address.'%';
    //$place = CS50::query("SELECT * FROM places WHERE postal_code = ? ",'%$address[0]["Address"]%');
    //SELECT * FROM `14` WHERE `Name` LIKE \'Mike Ferg\' AND `Address` LIKE \'%49074%\'


    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    //print(json_encode($address[0]["Address"], JSON_PRETTY_PRINT));
    print(json_encode($place, JSON_PRETTY_PRINT));

?>