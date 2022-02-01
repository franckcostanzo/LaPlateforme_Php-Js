

                        <br> <br>



<form class="d-flex justify-content-center" method="POST">
    <?php for($i=0;$i<4;$i++) :?>                            
        <button type="submit" value="card".$i class="card" >
            <?php if( isset($_SESSION['card'.$i]) && $_SESSION['card'.$i]->getisDiscovered() ) : ?>
                <img src=<?= $_SESSION['card'.$i]->getimgSrc()?> alt='card '.$i id='card'.$i>
            <?php else : ?>
                <img src="./media/back.png" alt='card '.$i id='card'.$i>
            <?php endif; ?>
        </button>
    <?php endfor?>                           
</form>
<form class="d-flex justify-content-center" method="POST">
    <?php for($i=4;$i<8;$i++) :?>                            
        <button type="submit" value="card".$i class="card" >
            <?php if( isset($_SESSION['card'.$i]) && $_SESSION['card'.$i]->getisDiscovered() ) : ?>
                <img src=<?= $_SESSION['card'.$i]->getimgSrc()?> alt='card '.$i id='card'.$i>
            <?php else : ?>
                <img src="./media/back.png" alt='card '.$i id='card'.$i>
            <?php endif; ?>
        </button>
    <?php endfor?>                           
</form>
<form class="d-flex justify-content-center" method="POST">
    <?php for($i=8;$i<12;$i++) :?>                            
        <button type="submit" value="card".$i class="card" >
            <?php if( isset($_SESSION['card'.$i]) && $_SESSION['card'.$i]->getisDiscovered() ) : ?>
                <img src=<?= $_SESSION['card'.$i]->getimgSrc()?> alt='card '.$i id='card'.$i>
            <?php else : ?>
                <img src="./media/back.png" alt='card '.$i id='card'.$i>
            <?php endif; ?>
        </button>
    <?php endfor?>                           
</form>