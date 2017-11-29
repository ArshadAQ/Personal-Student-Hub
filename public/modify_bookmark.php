<?php

    // configuration
    require("../includes/config.php");

    $id = $_SESSION["id"];

    $link_old = $_GET["link_old"];
    $desc_old = $_GET["desc_old"];

    $link_new = $_GET["link_new"];
    $desc_new = $_GET["desc_new"];

    $c_name = $_GET["c_name"];

    $table_name = $id.$c_name.'links';

        $servername = "localhost";
        $username = "arshadaq";
        $password = "zrrJ8zNEdpuTwuty";
        $dbname = "Finalproject";

        //echo $old_name;
        //echo $c_name;
        //echo $id;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            //$table_name = $id.'courses';
            $sql = "UPDATE `$table_name` SET Bookmark_link='$link_new' WHERE Bookmark_link = '$link_old'";
            echo $sql;
            $result = $conn->query($sql);
            if($result == NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'history.php';</script>";
                exit;

            }

            $sql = "UPDATE `$table_name` SET Description='$desc_new' WHERE Description = '$desc_old'";
            echo $sql;
            $result = $conn->query($sql);
            if($result == NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'history.php';</script>";
                exit;

            }

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;

            $message = "Form Submitted Successfully...";

            echo "<script type='text/javascript'>alert('$message');</script>";

            $url = "/history.php";

            echo "hi";

            //redirect($url);


?>
