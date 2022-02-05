<?php elseif ($selectQuery->rowCount() >= 1) : ?>
                                <?php foreach($reservations as $resa) : 
                                    $tempDate = $resa->getDebut();
                                    $tempDate = new DateTime($tempDate); 
                                    $tempHeureDebut = $tempDate->format("H");
                                    $tempDate = $resa->getFin();
                                    $tempDate = new DateTime($tempDate);
                                    $tempHeureFin = $tempDate->format("H"); 
                                    if () :?>
                                    <td class="text-center resa2"><?= $resa->getTitre(); ?></td>                                    </td>
                                    <?php endif ?>
<?php endforeach ?>