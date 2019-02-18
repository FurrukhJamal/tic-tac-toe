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

    /*This function figures out if X or O has made a line
    and the game is finished and used to stylize winning line
    returns: location index where the winning line starts from based on starting
            starting index in case of horizontal or vertical line
            and if its a cross then its either the first row index if line is [0][0][1][1][2][2]
            or 2 incase of cross in [2][0][1][1][0][1]
            Line format if its a vertical line, horizontal or a cross
            returns key finished as true if game is finished */
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
                        "location" => $i,
                        "winner" => $_SESSION["board"][$i][2]];

            }
            if($_SESSION["board"][2][$i] !== "None" && $_SESSION["board"][1][$i] !== "None" && $_SESSION["board"][0][$i] !== "None" && $_SESSION["board"][0][$i] == $_SESSION["board"][1][$i] && $_SESSION["board"][0][$i] == $_SESSION["board"][2][$i])
            {
                //print("WON");
                return ["finished" => True,
                        "line" => "vertical",
                        "location" => $i,
                        "winner" => $_SESSION["board"][2][$i]];
            }
        }

        if($_SESSION["board"][0][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][2][2] !== "None" && $_SESSION["board"][0][0] == $_SESSION["board"][1][1]
            && $_SESSION["board"][2][2] == $_SESSION["board"][0][0])
        {
            return ["finished" => True,
                    "line" => "X",
                    "location" => 0,
                    "winner" => $_SESSION["board"][0][0]];
        }

        if($_SESSION["board"][2][0] !== "None" && $_SESSION["board"][1][1] !== "None"
            && $_SESSION["board"][0][2] !== "None" && $_SESSION["board"][2][0] == $_SESSION["board"][1][1]
            && $_SESSION["board"][2][0] == $_SESSION["board"][0][2] )
        {
            return ["finished" => True,
                    "line" => "X",
                    "location" => 2,
                    "winner" => $_SESSION["board"][2][0]];
        }

        return false;
    }

    /*Expects $sybmol = "X" or "O"
    Put a "X" or "O" in session["board"] on cpu behalf
    modifiy $_SESSION["turn"]*/
    function cputurn($symbol)
    {
        //Test to check if board is not full
        $count = 0;
        for($i = 0; $i < 3; $i++)
        {
            for($j = 0; $j < 3; $j++)
            {
                if($_SESSION["board"][$i][$j] == "None")
                {
                    $count += 1;
                }
            }
        }

        if($count > 0)
        {
            $flag = true;
        }
        else
        {
            $flag = false;
        }

        while($flag)
        {
            $row = rand(0,2);
            $col = rand(0,2);
            if($_SESSION["board"][$row][$col] == "None")
            {
                $_SESSION["board"][$row][$col] = $symbol;
                break;
            }

        }

        //change whose turn it is
        if($_SESSION["turn"] == "X")
        {
            $_SESSION["turn"] = "O";
        }
        else
        {
            $_SESSION["turn"] = "X";
        }

    }
?>
