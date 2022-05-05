<?php $title = "Lobby" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php'); ?>
<?php require_once('Controller/user_controller.php'); ?>
<?php require_once('Controller/game_controller.php'); ?>


<?php   ob_start();  ?>

<div class="container mt-3">

    <div class="d-flex justify-content-center">
        <button class="btn btn-primary mt-2 mx-2 p-2 rounded-pill" id="createGame">
            Create Game
        </button>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mt-2 p-2 rounded-pill" id="refresh">
            Refresh
        </button>
    </div>

    <div class="lobbyBoard border border-5 border-primary mt-3" id='lobbyBoard'>
        <table class="table" id="gamesTable">
            <thead>
                <th>id</th>
                <th>Game</th>
                <th>Host</th>
                <th class='text-center'>Password</th>
            </thead>
            <tbody id='tbody'>

            </tbody>
        </table>
    </div>

</div>
<?php  $content=ob_get_clean(); ?>

<?php require ('View/layout.php'); ?>