<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tic Tac Toe</title>
        <style>
            .col-xs-12 h1
            {
                text-transform: uppercase;
                text-align: center;
            }
            .winningline
            {
                background-color: yellow;
                width:inherit;
            }
            .col-xs-12 table
            {
                empty-cells: show;
                text-align: center;
                width: 70%;
                margin: 10px auto 0 auto;
                border-collapse: collapse;
            }
            .col-xs-12 table td
            {
                text-transform: capitalize;
                border: 3px solid black;
                font-size: 100px;
                width: 100px;
                height: 150px;
            }
            .col-xs-12 table tr
            {
                height: 100px;
            }

            .col-xs-12 table td a
            {
                font-size: 24px;
            }

            #reset , #cpu
            {
                margin: 20px auto 20px auto;
                width: 100px;
            }
            #reset a
            {
                color: white;
                text-decoration: none;
            }
            #winnername
            {
                visibility: hidden;
                font-size: 150%;
            }


        </style>
        <script type="text/javascript">
            window.onload = function (){
                var td = document.getElementsByTagName("td");
                //changing individual borders to make it look like tic tac toe
                td[0].style.borderLeft = "None";
                td[0].style.borderTop = "None";
                td[1].style.borderTop = "None";
                td[2].style.borderRight = "None";
                td[2].style.borderTop = "None";
                td[3].style.borderLeft = "None";
                td[5].style.borderRight = "None";
                td[6].style.borderBottom = "None";
                td[6].style.borderLeft = "None";
                td[8].style.borderBottom = "None";
                td[8].style.borderRight = "None";
                td[7].style.borderBottom = "None";

                /*To apply css to winning line*/
                var table = document.getElementsByTagName("table");
                if(table[0].hasAttribute("position"))
                {
                    var position = table[0].getAttribute("position");
                    var line_location = position.split("-");

                    //checking if line is vertical,horizontal or a diagnol
                    if(line_location[0] == "horizontal")
                    {
                        var rows = document.getElementsByTagName("tr");
                        for(let i = 0; i < rows.length; i++)
                        {
                            if(i == line_location[1])
                            {
                                rows[i].setAttribute("class", "winningline");
                            }
                        }
                    }
                    if(line_location[0] == "vertical")
                    {
                        //td is already in memory from above code
                        td[parseInt(line_location[1])].setAttribute("class", "winningline");
                        td[parseInt(line_location[1]) + 3].setAttribute("class", "winningline");
                        td[parseInt(line_location[1]) + 6].setAttribute("class", "winningline");
                    }
                    if(line_location[0] == "X" && line_location[1] == 0)
                    {
                        td[0].setAttribute("class", "winningline");
                        td[4].setAttribute("class", "winningline");
                        td[8].setAttribute("class", "winningline");
                    }
                    if(line_location[0] == "X" && line_location[1] == 2)
                    {
                        td[2].setAttribute("class", "winningline");
                        td[4].setAttribute("class", "winningline");
                        td[6].setAttribute("class", "winningline");
                    }

                    //blink the result only when in views a winners table is displayed
                    var winner = document.getElementById("winnername");

                    //change visibility of winners name button to visible
                    winner.style.visibility = "visible";

                    function blink() {
                        if (winner.className == "btn btn-success btn-lg")
                        {
                            winner.className = "btn btn-default btn-lg";
                        }
                        else
                        {
                            winner.className = "btn btn-success btn-lg";
                        }
                    }
                    if(window.getComputedStyle(winner).visibility == "visible")
                    {
                        setInterval(blink, 1000);
                    }
                }




            }

        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1>tic tac toe</h1>
                </div>
            </div>

            <?php if(!$_SESSION["gamefinished"]): ?>
                <!--have this button hidden when game the is been played to take space which the button wud take in winning board display -->
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button id = "winnername" type="button" class="btn btn-success btn-lg">winners name</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table>
                            <?php for($i = 0; $i < 3; $i++): ?>
                                <tr>
                                    <?php for($j = 0; $j < 3; $j++): ?>
                                        <!--Displaying board with moves and links to
                                         players move according to whose turn it is in session-->
                                        <?php if($_SESSION["turn"] == "X" && $_SESSION["board"][$i][$j] == "None"): ?>
                                            <!--Displaying links as get variable that can be parsed to figure out what move was done-->
                                            <td><a href="/?move=<?= $i.$j ?>">Play <?= $_SESSION["turn"] ?></a> </td>
                                        <?php elseif($_SESSION["turn"] == "X" && $_SESSION["board"][$i][$j] !== "None"): ?>
                                            <td><?= $_SESSION["board"][$i][$j] ?></td>
                                        <?php elseif($_SESSION["turn"] == "O" && $_SESSION["board"][$i][$j] == "None"): ?>
                                            <td><a href="/?move=<?= $i.$j ?>">Play <?= $_SESSION["turn"] ?></a> </td>
                                        <?php elseif($_SESSION["turn"] == "O" && $_SESSION["board"][$i][$j] !== "None"): ?>
                                            <td><?= $_SESSION["board"][$i][$j] ?></td>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <a href= "/?reset=on"><button id ="reset" type="button" class="btn btn-primary">Restart</button></a>
                        <!--Display cpu button only when game has started-->
                        <?php if(!$_SESSION["cpu"] && !$_SESSION["matchstarted"]):?>
                            <a href= "/?cpu=on"><button id ="cpu" type="button" class="btn btn-primary">Cpu</button></a>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endif; ?>

            <!--TO display if game is finished-->
            <?php if($_SESSION["gamefinished"]): ?>
                <!--display button to show winner -->
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button id = "winnername" type="button" class="btn btn-success btn-lg"><?=$_SESSION["winner"]?> WINS!!</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <!--adding a position attribute so javascript can reference this to apply css in winning line-->
                        <table position = "<?= $_SESSION["end-data"]["line"]."-".$_SESSION["end-data"]["location"]?>">
                            <?php for($i = 0; $i < 3; $i++):?>
                                <tr>
                                    <?php for($j = 0; $j < 3; $j++):?>
                                        <?php if($_SESSION["board"][$i][$j] == "O" || $_SESSION["board"][$i][$j] == "X"): ?>
                                            <td><?= $_SESSION["board"][$i][$j] ?></td>
                                        <?php else: ?>
                                            <td></td>
                                        <?php endif;?>
                                    <?php endfor; ?>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 text-center">
                        <a href= "/?reset=on"><button id ="reset" type="button" class="btn btn-primary">Restart</button></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>
