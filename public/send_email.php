<?php

    // configuration
    require("../includes/config.php");
    require("../includes/config1.php");

    require 'mailgun-php/vendor/autoload.php';
    use Mailgun\Mailgun;

    $id = $_SESSION["id"];
    //$email = $_GET["email"];
    $c_name = $_GET["c_name"];
    $table_name = $id.$c_name.'links';
    $emails = json_decode(stripslashes($_GET["email"]));
    $bookmarks_id = json_decode(stripslashes($_GET["bookmarks_checked"]));
    /*foreach($emails as $email)
    {
        echo $email;
        echo "\r\n";
    }*/
    $link_concat = '';
    foreach($bookmarks_id as $bookmark_id)
    {
        $link = CS50::query("SELECT Bookmark_link FROM `$table_name` WHERE `S.No` = ?", $bookmark_id);
        //echo $link[0]["Bookmark_link"];
        $link_concat .=  $link[0]["Bookmark_link"]. "\r\n";
        /*echo $bookmark_id;
        echo "\r\n";*/
    }
    //echo $link_concat;

    foreach ($emails as $email)
    {
        /*$to = $email;
        $subject = "My subject";
        $txt = $link_concat;
        $headers = "From: webmaster@example.com" . "\r\n";*/

    /*Mailgun*/
    # Include the Autoloader (see "Libraries" for install instructions)


    # Instantiate the client.
    /*$mgClient = new Mailgun('key-d9d5a5a1d77603c48f2564398030ab45');

    # Make the call to the client.
    $result = $mgClient->sendMessage("$domain",
              array('from'    => 'Mailgun Sandbox <postmaster@sandbox3c19c72b7162462b8faad9e262459fff.mailgun.org>',
                    'to'      => $email,
                    'subject' => 'Hello Arshad',
                    'text'    => $link_concat));
    # First, instantiate the SDK with your API credentials
    $mg = Mailgun::create('key-d9d5a5a1d77603c48f2564398030ab45');

    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
    $mg->messages()->send('$domain', [
      'from'    => 'Mailgun Sandbox <postmaster@sandbox3c19c72b7162462b8faad9e262459fff.mailgun.org>',
      'to'      => $email,
      'subject' => 'The PHP SDK is awesome!',
      'text'    => $link_concat
    ]);*/
    $mg = new Mailgun("key-d9d5a5a1d77603c48f2564398030ab45");
    $domain = "sandbox3c19c72b7162462b8faad9e262459fff.mailgun.org";
    $mg->sendMessage($domain, array(
    'from'=>'Mailgun Sandbox <postmaster@sandbox3c19c72b7162462b8faad9e262459fff.mailgun.org>',
    // 'from'=>'Arshad',
    'to'=> $email,
    'subject' => 'The PHP SDK is awesome!',
    'text' => $link_concat
        )
    );

    # You can see a record of this email in your logs: https://mailgun.com/app/logs .

    # You can send up to 300 emails/day from this sandbox server.
    # Next, you should add your own domain so you can send 10,000 emails/month for free.

       /*if(mail($to,$subject,$txt,$headers))
            ;//echo "success";
        else
            ;//echo "fail";
        if($result)
            echo "success";
        else
            echo "fail";*/
    }

    // redirect("/history_1.php?q=".$c_name);




?>
