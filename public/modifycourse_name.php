<?php

    // configuration
    require("../includes/config.php");

    $id = $_SESSION["id"];
    $old_name = $_GET["old_name"];
    $c_name = $_GET["c_name"];

   /* // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("modifycourse_name_form.php", NULL , NULL, NULL, NULL, ["title" => "Addcontact"]);

    }
*/
    // else if user reached page via POST (as by submitting a form via POST)
/*    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {*/

        $servername = "localhost";
        $username = "arshadaq";
        $password = "zrrJ8zNEdpuTwuty";
        $dbname = "Finalproject";

        //echo $old_name;
        //echo $c_name;
        //echo $id;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $table_name = $id.'courses';
            $sql = "DELETE FROM `$table_name` WHERE Course_Name = '$old_name'";
            echo $sql;
            $result = $conn->query($sql);
            if($result == NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'history.php';</script>";
                exit;

            }

            $sql = "INSERT INTO `$table_name`(course_name) VALUES('$c_name')";
            echo $sql;
            $result = $conn->query($sql);
            if($result == NULL)
            {
                $message = "Contact already exists";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location.href = 'history.php';</script>";
                exit;

            }
            $old_table = $id.$old_name.'links';
            $new_table = $id.$c_name.'links';
            $sql = "ALTER TABLE `$old_table` RENAME `$new_table`";
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



?>
