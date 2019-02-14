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
            }
            .col-xs-12 table tr
            {
                height: 100px;
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
            <div class="row">
                <div class="col-xs-12">
                    <table>
                        <?php for($i = 0; $i < 3; $i++): ?>
                            <tr>
                                <?php for($j = 0; $j < 3; $j++): ?>
                                    <td>Test</td>
                                <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
