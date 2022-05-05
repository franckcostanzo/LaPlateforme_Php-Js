document.addEventListener("DOMContentLoaded", (event) => {

    const refreshButton = document.getElementById('refresh');    

    const gamesTable = document.getElementById('gamesTable');

    function getAllGames()
    {
        fetch('http://localhost/LaPlateforme_/ProjectPoolJs/Puissance4/Js/getAllGames.php')
        .then((response) => response.json())
        .then((response) => {

            let getTableBody = document.getElementById('tbody');
            let tableBody;

            if( getTableBody == null)
            {
                tableBody = document.createElement('tbody');
                tableBody.id = 'tbody';
            }
            else
            {
                getTableBody.remove();
                tableBody = document.createElement('tbody');
                tableBody.id = 'tbody';
            }            
            
            for(let i=0; i<response.length; i++)
            {
                let data = response[i];
                let tableRow = document.createElement('tr');
                let idBloc = document.createElement('td');
                idBloc.innerText = data['id_game'];
                let gameNameBloc = document.createElement('td');
                gameNameBloc.innerText = data['game_name'];
                let hostBloc = document.createElement('td');
                hostBloc.innerText = data['gamer1'];
                tableRow.appendChild(idBloc);
                tableRow.appendChild(gameNameBloc);
                tableRow.appendChild(hostBloc)

                //form to send password verif to enter game
                let gameFormBloc = document.createElement('td');
                let gameForm = document.createElement('form');
                gameForm.method = 'POST';
                gameForm.setAttribute('class', 'd-flex flex-row justify-content-center');

                //input hidden with game id
                let hiddenGameId = document.createElement('input');
                hiddenGameId.name = "id";
                hiddenGameId.type = "hidden";
                hiddenGameId.value = data['id_game'];


                //input hidden with game id
                let hiddenGamerName = document.createElement('input');
                hiddenGamerName.name = "creator";
                hiddenGamerName.type = "hidden";
                hiddenGamerName.value = data['gamer1'];
                

                //input password text    
                let inputGamePassword = document.createElement('input');
                inputGamePassword.name = 'gamePassword';
                inputGamePassword.type = 'text';
                inputGamePassword.id = 'gamePassword';


                //input submit
                let inputGameAccess = document.createElement('input');
                inputGameAccess.name = 'gameAccess';
                inputGameAccess.type = 'submit';
                inputGameAccess.id = 'gameAccess';
                inputGameAccess.value = 'Enter'
                inputGameAccess.setAttribute('class','btn btn-primary mx-2')

                gameForm.appendChild(hiddenGameId);
                gameForm.appendChild(hiddenGamerName);
                gameForm.appendChild(inputGamePassword);
                gameForm.appendChild(inputGameAccess);
                gameFormBloc.appendChild(gameForm);
                tableRow.appendChild(gameFormBloc);
                tableBody.appendChild(tableRow);
            }
            
            gamesTable.appendChild(tableBody)

        })
        .catch((error) => {
            console.log(error)  
        })
    }

    getAllGames();

    refreshButton.addEventListener('click', () => {
        console.log('youpi !')
        getAllGames();
    })


})