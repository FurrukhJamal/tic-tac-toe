<?php
    session_start();
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("../includes/helpers.php");

    if(isset($_SESSION["board"]))
    {
        print("set");
        $_SESSION["board"] = [["None", "O", "None"],
                            ["None", "O", "None"],
                            ["None", "X", "None"]];

        $_SESSION["turn"] = "O";
    }
    else
    {
        //for when user visits site for the first time 
        $_SESSION["board"] = [["None", "None", "None"],
                            ["None", "None", "None"],
                            ["None", "None", "None"]];

        $_SESSION["turn"] = "X";
    }

    require("../views/page.php");
?>
