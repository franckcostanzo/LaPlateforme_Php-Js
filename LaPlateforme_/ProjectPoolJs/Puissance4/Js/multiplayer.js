document.addEventListener("DOMContentLoaded", (event) => {

    const h1 = document.getElementById('gameH1');

    const player1Span = document.getElementById('player1');
    player1Span.style.color = 'red';

    const player2Span = document.getElementById('player2');
    player2Span.style.color = 'yellow';

    function getGameInfo()
    {
        fetch('http://localhost/LaPlateforme_/ProjectPoolJs/Puissance4/Js/multiplayer.php')
        .then((response) => response.json())
        .then((response) => {
            //id_game game_name gamer1 gamer2 game_plan
            h1.innerText = 'Game name : ' + response['game_name'];
            player1Span.innerText = response['gamer1']; 
            player2Span.innerText = response['gamer2']; 
        })
        .catch((error) => {
            console.log(error)  
        })
    }

    getGameInfo();
    
})