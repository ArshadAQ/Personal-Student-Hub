<?php

    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    
    $name = $_POST["name"];
    
    $mobileno = $_POST["mobileno"];
    
    $phoneno = $_POST["phoneno"];
    
    $emailid = $_POST["emailid"];
    
    $address = $_POST["address"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("addcontact_form.php", NULL , NULL, ["title" => "Addcontact"]);
        
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
        $servername = "localhost";
        $username = "arshadaq";
        $password = "zrrJ8zNEdpuTwuty";
        $dbname = "Finalproject";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
            $sql = "SELECT Name FROM `$id` WHERE Name = $name";
            $result = $conn->query($sql);
            if($result != NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'quote.php';</script>";
                exit;
                
            }
        
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            

            // sql to create table
            $sql = "CREATE TABLE IF NOT EXISTS `$id` (
            `Name` char(50), 
            `Mobileno` char(10) ,
            `Phoneno` char(12),
            `EmailID` char(30),
            `Address` VARCHAR(255),
            PRIMARY KEY(`Name`)
            )ENGINE=InnoDB";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Table '$id' created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
            $sql = "INSERT INTO `$id` (Name, Mobileno, Phoneno, EmailID, Address)
            VALUES ('$name', '$mobileno', '$phoneno', '$emailid', '$address')"; 
            
            $conn->exec($sql);
            
            $conn = null;
            
            $message = "Form Submitted Successfully...";
            
            echo "<script type='text/javascript'>alert('$message');</script>";
            
            redirect("/quote.php");

    }

?>
