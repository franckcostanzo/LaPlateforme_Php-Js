<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if(isset($_POST["fonction"]))
    {
        
        echo '<link rel="stylesheet" href="'.$_POST["fonction"].'.css">';
    }
    else
    {
        echo '<link rel="stylesheet" href="style.css">';
    }

    ?>
    <title>Document</title>
</head>
<body>

<form action="index.php" method="POST">
    <select name="fonction">
        <option value="" disabled selected>Choose your style</option>
        <option value="style">style 1</option>
        <option value="style2">style 2</option>
        <option value="style3">style 3</option>>
    </select>
    <input type="submit" value="Submit MOFO!">

</form>

    
</body>
</html>