<?php
    function redirect($page)
    {
        /* Redirect to a different page in the current directory that was requested */
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = $page;
        header("Location: http://$host$uri/$extra");
        exit;
    }

    function isgamefinished()
    {
        for($i = 0; $i < 3; $i++)
        {
            //checking winning line horizontally or vertically
            if($_SESSION["board"][$i][2] !== "None" && $_SESSION["board"][$i][1] !== "None" && $_SESSION["board"][$i][0] !== "None" && $_SESSION["board"][$i][0] == $_SESSION["board"][$i][1] && $_SESSION["board"][$i][0] == $_SESSION["board"][$i][2] )
            {
                /*print("WON");
                print("line format is horizontal\n");
                print("position: {$i}");*/
                return ["finished" => True,
                        "line" => "horizontal",
                        "location" => $i];

            }
            if($_SESSION["board"][2][$i] !== "None" && $_SESSION["board"][1][$i] !== "None" && $_SESSION["board"][0][$i] !== "None" && $_SESSION["board"][0][$i] == $_SESSION["board"][1][$i] && $_SESSION["board"][0][$i] == $_SESSION["board"][2][$i])
            {
                //print("WON");
                return ["finished" => True,
                        "line" => "vertical",
                        "location" => $i];
            }
        }

        //checking for the line diagonally
        /*if(($_SESSION["board"][0][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][2][2] !== "None" && $_SESSION["board"][0][2] !== "None"
            && $_SESSION["board"][2][0] !== "None") && ($_SESSION["board"][0][0] == $_SESSION["board"][1][1] && $_SESSION["board"][0][0] == $_SESSION["board"][2][2]))
        {
            //print("Left sided line WON");
            return ["finished" => True,
                    "line" => "X",
                    "location" => 0];
        }
        if(($_SESSION["board"][0][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][2][2] !== "None" && $_SESSION["board"][0][2] !== "None"
            && $_SESSION["board"][2][0] !== "None") && ($_SESSION["board"][0][2] == $_SESSION["board"][1][1] && $_SESSION["board"][0][2] == $_SESSION["board"][2][0]))
        {
            //print("Right sided line WON");
            return ["finished" => True,
                    "line" => "X",
                    "location" => 2];
        }*/

        if($_SESSION["board"][0][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][2][2] !== "None" && $_SESSION["board"][0][0] == $_SESSION["board"][1][1]
            && $_SESSION["board"][2][2] == $_SESSION["board"][0][0])
        {
            return ["finished" => True,
                    "line" => "X",
                    "location" => 0];
        }

        if($_SESSION["board"][2][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][0][2] !== "None" && $_SESSION["board"][2][0] == $_SESSION["board"][1][1]
            && $_SESSION["board"][2][0] == $_SESSION["board"][0][2] )
        {
            return ["finished" => True,
                    "line" => "X",
                    "location" => 2];
        }

        return false;
    }
?>
