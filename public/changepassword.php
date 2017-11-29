<?php

    // configuration
    require("../includes/config.php");
    
     $id = $_SESSION["id"]; 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("changepassword_form.php", NULL, ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["currentpassword"]))
        {
            apologize("You must provide your current password.");
        }
        else if (empty($_POST["newpassword"]))
        {
            apologize("You must provide your new password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("Please confirm your new password.");
        }
        else
        {
            $rows = CS50::query("SELECT hash FROM users WHERE id = ?", $id);
            if (password_verify($_POST["currentpassword"], $rows[0]["hash"]))
            {
                if ($_POST["newpassword"] != $_POST["confirmation"])
                {
                    apologize("Password mismatch");
                }
                else if ($_POST["newpassword"] == $_POST["currentpassword"])
                {
                    apologize('"Current Password" and "New Password" cannot be the same.');
                }
                else
                {
                    // change password in database
                    CS50::query("UPDATE users SET hash = ?", password_hash($_POST["confirmation"], PASSWORD_DEFAULT));

                    render("changepaswmsg.php");
                }    
            }
            else
            {
                apologize("Incorrect current password.");
            }
        }
        

    }

?>