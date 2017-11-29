<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        // render("addcourse_name_form.php", NULL , NULL, NULL, ["title" => "Addcontact"]);
        redirect("/history.php");

    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $id = $_SESSION["id"];
        $course_name = $_POST["course_name"];

        $servername = "localhost";
        $username = "arshadaq";
        $password = "zrrJ8zNEdpuTwuty";
        $dbname = "Finalproject";

        // echo $_GET["q"];
        echo $course_name;
        echo $id;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $table_name = $id.'courses';
            $sql = "SELECT Course_Name FROM `$table_name` WHERE Course_Name = $course_name";
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
            `Course_Name` char(50),
            `date/time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`Course_Name`)
            )ENGINE=InnoDB";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Table '$id' created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
            $sql = "INSERT INTO `$table_name` (Course_Name)
            VALUES ('$course_name')";

            $conn->exec($sql);

            $conn = null;

            $message = "Form Submitted Successfully...";

            echo "<script type='text/javascript'>alert('$message');</script>";

            redirect("/history.php");

    }

?>
