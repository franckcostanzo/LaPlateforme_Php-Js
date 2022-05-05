<?php $title = "Game" ?>
<?php session_start(); ?>
<?php include_once("Controller/user_controller.php") ?>

<?php ob_start()?>

<div class="container mt-3 d-flex flex-column justify-content-center" >
    
    <h1 class='text-center' id='gameH1'></h1>
    <div class="d-flex justify-content-center">
    <h4 class='bg-dark rounded-pill p-2 text-center'><span id='player1'></span> ||| <span id='player2'></span></h4>
    </div>
    

    <h1 class="text-center"><?= (isset($_SESSION['connected']) ? "Welcome ".$_SESSION['username'] : "Vous n'êtes pas connecté !") ?></h1>

    <div class="d-flex justify-content-center">
        <p class="text-center fs-5 fw-bold mt-2 p-3 bg-dark rounded-pill" id='activePlayer'></p>
    </div>
    

    <div class="container d-flex flex-row justify-content-center mt-5" id="gameBoard">

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

        <div class="gameRow row">
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
            <div class="gameBox"></div>
        </div>

    </div>

    <div class="d-flex justify-content-center"><a href="./index.php" class="btn btn-primary mt-5 mx-2 p-2  rounded-pill">Restart</a></div>
    

    <h3 id="result"></h3>
    <?php if (isset($_SESSION['connected'])) : ?>   
        <p class="text-center mt-5">---|<[ Games played : <?= $_SESSION['gamesPlayed'] ?> ]>|---</p>

        <p class="text-center">---|<[ Won : <?= $_SESSION['win'] ?> |<>| Lost : <?= $_SESSION['loss'] ?> ]>|---</p>
    <?php endif; ?>
</div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require_once('View/layout.php'); ?>