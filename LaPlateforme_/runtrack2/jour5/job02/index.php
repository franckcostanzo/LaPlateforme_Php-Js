<?php
function bonjour(bool $myBool)
{
    echo ($myBool) ? "Bonjour!<br>" : "Bonsoir!<br>";
}

bonjour(true);
bonjour(false);

?>