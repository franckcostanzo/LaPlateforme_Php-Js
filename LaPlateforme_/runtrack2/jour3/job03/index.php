<h1>
<?php
    $str=strtolower("I'm sorry Dave I'm afraid I can't do that");
    $vowArr = ['a', 'e', 'i', 'o', 'u'];
    for ($x=0;$x<strlen($str);$x++)
    {
        for($y=0;$y<count($vowArr);$y++)
        {
            if( $str[$x] == $vowArr[$y] )
            {
                echo $str[$x];
                break;
            }
        }
    }
?>
</h1>