<style>
         table, th, td {
            border: 1px solid black;
         }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Enter username"><br>
        <input type="password" name="password" id="" placeholder="Enter password"><br>
        <input type="submit" name="submit" value="SUBMIT">
    </form>

    <table>
         <tr>
            <?php

                foreach ($_POST as $key => $value)
                {
                    echo "<th>$key</th>";
                }

            ?>
        </tr>
        <tr>
            <?php

                foreach ($_POST as $key => $value)
                {
                    echo "<th>$value</th>";
                }

            ?>
        </tr>

    </table>
</body>
</html>