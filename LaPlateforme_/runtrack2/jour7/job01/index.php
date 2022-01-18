<?php 
    session_start();
    if (isset($_POST["reset"]))
    {
        $_SESSION["nbvisites"]=0;
    }
    $_SESSION["nbvisites"] = $_SESSION["nbvisites"] +1;
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
    echo "le nombre de connexions au site est de ".$_SESSION["nbvisites"];
?>
<form action="" method="POST">
    <input type="submit" value="reset" name="reset">
</form>


    
</body>
</html>