<?php
    if (!isset($_COOKIE["nbvisites"]))
    {
        $cookie = 1;
        setcookie("nbvisites", $cookie);    
    }
    else
    {
        $cookie = ++$_COOKIE["nbvisites"];
        print_r($_COOKIE);
        setcookie("nbvisites", $cookie);
    }
    if (isset($_POST["reset"]))
    {
        $cookie=0;
        setcookie("nbvisites", $cookie);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    if (isset($_COOKIE["nbvisites"]))
    {
        echo "<br>le nombre de connexions au site est de ".$_COOKIE["nbvisites"];
    }
?>
<form action="" method="POST">
    <input type="submit" value="reset" name="reset">
</form>
    
</body>
</html>