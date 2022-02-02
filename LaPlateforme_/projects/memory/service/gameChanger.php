<?php 
        if ($_SESSION['count'] == 2)
        {
            if ($_SESSION['temp'.$_SESSION['count']]->getimgSrc() !== $_SESSION['temp'.($_SESSION['count']-1)]->getimgSrc())
            {
                $_SESSION['card'.$_SESSION['istore'][0]]->setisDiscovered(false);                
                $_SESSION['card'.$_SESSION['istore'][1]]->setisDiscovered(false);
                $_SESSION['gameScore'] -= 5;              
            }
            else
            {
                $_SESSION['successCount']++;
            } 
            $_SESSION['istore'] = array();
            $_SESSION['count'] = 0;
            
        }
?>