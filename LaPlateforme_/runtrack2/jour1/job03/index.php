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
        $bool = true;
        $int = 3;
        $str = "youpi";
        $float = 4.2;

        // Array with all the variables to loop on
        $myArray = array( $bool, $int, $str, $float );

        // Function that returns the variable name
        function varName($var) {
            foreach($GLOBALS as $varName => $value) {
                if ($value === $var) {
                    return $varName;
                }
            }
            return;
        }

    ?>
    <table>
        <thead>
            <tr>
                <th>Type</th><th>Nom</th><th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i<sizeof($myArray); $i++) 
                {

                    $val;
                    if ((gettype($myArray[$i])) == "boolean")
                    {
                        ($myArray[$i]) ? $val="true" : $val="false";
                    }
                    else
                    {
                        $val=$myArray[$i];
                    };

                    echo "<tr><td>" 
                         . (gettype($myArray[$i])) 
                         . "</td><td>" 
                         . varName($myArray[$i])
                         . "</td><td>" 
                         . $val
                         . "</td></tr>";
                };
            ?>
        </tbody>


    </table>
</body>
</html>