<?php
    session_start();
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("../includes/helpers.php");

    if(isset($_SESSION["board"]))
    {
        print_r($_SESSION);
        //isgamefinished();

        if(isset($_GET["move"]))
        {
            //split the string into array
            $move = $_GET["move"];
            $board = str_split($move);
            $_SESSION["board"][$board[0]][$board[1]] = $_SESSION["turn"];
            //change the players turn
            if($_SESSION["turn"] == "X")
            {
                $_SESSION["turn"] = "O";
            }
            else
            {
                $_SESSION["turn"] = "X";
            }
            $result = isgamefinished();
            print_r($result);
            if($result["finished"]== true)
            {
                //Implement winning board
                $_SESSION["gamefinished"] = true;
                // adding result recieved from isgamefinished() to add proper css
                $_SESSION["end-data"] = $result;
                redirect();
            }
            else
            {
                redirect();
            }

            //redirect();
        }

    }
    else
    {
        //for when user visits site for the first time
        $_SESSION["board"] = [["None", "None", "None"],
                            ["None", "None", "None"],
                            ["None", "None", "None"]];

        $_SESSION["turn"] = "X";
        $_SESSION["gamefinished"] = false;


    }

    require("../views/page.php");
?>
