<?php
if (isset($_SESSION['username'])) 
    {
        $pdo = DbconnectPDO::dbconnect();
        $selectQuery = $pdo->prepare("SELECT `score` FROM `utilisateurs` WHERE `username` LIKE ? AND `email` LIKE ?");
        $selectQuery->execute(array(
            $_SESSION['username'],
            $_SESSION['email']
        ));
        $row = $selectQuery->fetch();
        if ($_SESSION['gameScore'] > $row["score"])
        {
            $updateQuery =  $pdo->prepare("UPDATE `utilisateurs` 
                                            SET `score` = ?                    
                                            WHERE `username` LIKE ? AND `email` LIKE ?");
            $updateQuery->execute(array(        
                $_SESSION['gameScore'],
                $_SESSION['username'],
                $_SESSION['email']
            ));
        }
    }
?>