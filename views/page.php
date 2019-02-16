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

            .col-xs-12 table
            {
                text-align: center;
                width: 70%;
                background-color: red;
                margin: 20px auto 0 auto;
                border-collapse: collapse;
            }
            .col-xs-12 table td
            {
                text-transform: capitalize;
                border: 2px solid black;
                font-size: 100px;
            }
            .col-xs-12 table tr
            {
                height: 100px;
            }

            .col-xs-12 table td a
            {
                font-size: 24px;
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
            <?php endif; ?>

            <!--TO display if game is finished-->
            <?php if($_SESSION["gamefinished"]): ?>
                <div class="row">
                    <div class="col-xs-12">
                        <table>
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
            <?php endif; ?>
        </div>
    </body>
</html>
