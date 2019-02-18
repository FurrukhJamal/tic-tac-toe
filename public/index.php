<?php
    session_start();
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    require("../includes/helpers.php");

    if(isset($_SESSION["board"]))
    {
        //print_r($_SESSION);
        //isgamefinished();

        if(isset($_GET["move"]))
        {
            //a test for views to decide if it should render cpu button or not
            $_SESSION["matchstarted"] = true;

            //split the string into array gotten from the get links that tells where the move was made
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

            //do cpus turn if player playing against cpu
            if($_SESSION["cpu"])
            {
                cputurn($_SESSION["cpu-marker"]);
            }

            $result = isgamefinished();
            //print_r($result);
            if($result["finished"]== true)
            {
                //Implement winning board
                $_SESSION["gamefinished"] = true;
                // adding result recieved from isgamefinished() to add proper css
                $_SESSION["end-data"] = $result;
                $_SESSION["winner"] = $result["winner"];
                redirect();
            }
            else
            {
                redirect();
            }

            //redirect();
        }
        if(isset($_GET["reset"]))
        {
            session_unset();
            session_destroy();
            redirect();
        }
        if(isset($_GET["cpu"]))
        {
            //if player wants to play against cpu
            $_SESSION["cpu"] = true;
            //decide if cpu gets X as first turn or O as second turn
            $randomnum = rand(0,10);
            if($randomnum <= 5)
            {
                $_SESSION["cpu-marker"] = "X";
                cputurn("X");
                redirect();
            }
            else
            {
                //players first turn
                $_SESSION["cpu-marker"] = "O";
                redirect();
            }
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
        $_SESSION["cpu"] = false;
        $_SESSION["matchstarted"] = false;

    }
    //print_r($_SESSION);
    require("../views/page.php");
?>
