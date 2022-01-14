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
         <?php
            if ($_POST["username"] == "John" && $_POST["password"] == "Rambo")
            {
                echo "<h1>C’est pas ma guerre</h1>";
            }
            else
            {
                echo "<h1>Votre pire cauchemar</h1>";
            }
         ?>
    
</body>
</html>