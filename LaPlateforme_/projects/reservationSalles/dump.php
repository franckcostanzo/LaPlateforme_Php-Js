<?php switch ($dayNumber) : case 1 :?>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        lundi<br> <?= $today ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mardi<br> <?= $dayPlus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mercredi<br> <?= $dayPlus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        jeudi<br> <?= $dayPlus3 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        vendredi<br> <?= $dayPlus4 ?>
                        </div>
                    <?php break; case 2 :?>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        lundi<br> <?= $dayMinus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mardi<br> <?= $today ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mercredi<br> <?= $dayPlus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        jeudi<br> <?= $dayPlus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        vendredi<br> <?= $dayPlus3 ?>
                        </div>
                    <?php break; case 3 :?>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        lundi<br> <?= $dayMinus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mardi<br> <?= $dayMinus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mercredi<br> <?= $today ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        jeudi<br> <?= $dayPlus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        vendredi<br> <?= $dayPlus2 ?>
                        </div>
                    <?php break; case 4 :?>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayMinus3 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayMinus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayMinus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $today ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        <?= $dayPlus1 ?>
                        </div>
                    <?php break; case 5 :?>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        lundi<br> <?= $dayMinus4 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mardi<br> <?= $dayMinus3 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        mercredi<br> <?= $dayMinus2 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        jeudi<br> <?= $dayMinus1 ?>
                        </div>
                        <div class="col-md-2 text-center border d-flex justify-content-center align-items-center" id="resa">
                        vendredi<br> <?= $today ?>
                        </div>
                    <?php break; endswitch; ?>