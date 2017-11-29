<?php

    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    $c_name = $_POST["c_name"];
    $Bookmark_link = $_POST["Bookmark_link"];
    $Bookmark_desc = $_POST["Bookmark_desc"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("addbookmark_form.php", NULL , NULL, NULL, ["title" => "Addcontact"]);
        
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
            
            $table_name = $id. $c_name.'links';
            $sql = "SELECT Bookmark_link FROM `$table_name` WHERE Bookmark_link = $Bookmark_link";
            $result = $conn->query($sql);
            if($result != NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'history.php';</script>";
                exit;
                
            }
        
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            // sql to create table
            $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
            `S.No` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `Bookmark_link` char(50),
            `Description` char(50),
            `date/time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`S.No`)
            )ENGINE=InnoDB";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Table '$table_name' created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
            $sql = "INSERT INTO `$table_name`(Bookmark_link, description)
            VALUES ('$Bookmark_link','$Bookmark_desc')"; 
            
            $conn->exec($sql);
            
            $conn = null;
            
            $message = "Form Submitted Successfully...";
            
            echo "<script type='text/javascript'>alert('$message');</script>";
            
            redirect("/history_1.php?q=$c_name");

    }

?>
