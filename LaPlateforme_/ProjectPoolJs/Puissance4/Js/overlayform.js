document.addEventListener("DOMContentLoaded", (event) => {


    //create game button
    const createGameButton = document.getElementById('createGame');

    if (createGameButton != null)
    {
        createGameButton.addEventListener('click', () => {

            //coverDiv to overlay all the page
            let coverDiv = document.createElement('div');
            coverDiv.id = 'overlay';
    
            //modalDiv in which we have the create game form
            let modalDiv = document.createElement('div');
            modalDiv.id = 'modal';
            modalDiv.setAttribute('class', 'border border-3 border-secondary d-flex flex-column align-items-center');        
    
            //close button
            let closeButtonDiv = document.createElement('div');
            let closeButton = document.createElement('button');
            closeButton.id = 'close-modal-btn';
            closeButton.setAttribute('class', 'btn btn-primary mt-3 p-2 rounded-pill')
            closeButton.innerText = 'close';
            closeButton.addEventListener('click', () =>{
                coverDiv.remove();
                document.body.style.overflowY = '';
            })
    
            //form
            let formDiv = document.createElement('div');
            formDiv.setAttribute('class', 'container mt-3');
            let createGameForm = document.createElement('form');
            createGameForm.method = 'POST';
            createGameForm.setAttribute('class', 'd-flex flex-column align-items-center')
    
                //input hidden with creator name from session variable
                let hiddenSessionName = document.createElement('input');
                hiddenSessionName.name = "creatorName";
                hiddenSessionName.type = "hidden";
                hiddenSessionName.value = "<?= $_SESSION['username'] ?>"; //TODO QUE CA MARCHE PUTAIN
    
                //input name text
                let gameNameDiv = document.createElement('div');
                gameNameDiv.setAttribute('class', 'row d-flex justify-content-center w-50');
    
                let inputGameName = document.createElement('input');
                inputGameName.name = 'gameName';
                inputGameName.type = 'text';
                inputGameName.id = 'gameName';
                let inputGameNameLabel = document.createElement('label');
                inputGameNameLabel.setAttribute('for', 'gameName');
                inputGameNameLabel.innerText = 'Game Name :'
                gameNameDiv.appendChild(inputGameNameLabel);
                gameNameDiv.appendChild(inputGameName);
    
                //input password text
                let gamePasswordDiv = document.createElement('div');
                gamePasswordDiv.setAttribute('class', 'row d-flex justify-content-center w-50');
    
                let inputGamePassword = document.createElement('input');
                inputGamePassword.name = 'gamePassword';
                inputGamePassword.type = 'text';
                inputGamePassword.id = 'gamePassword'
                let inputGamePasswordLabel = document.createElement('label');
                inputGamePasswordLabel.setAttribute('for', 'gamePassword');
                inputGamePasswordLabel.innerText = 'Game Password'
                gamePasswordDiv.appendChild(inputGamePasswordLabel);
                gamePasswordDiv.appendChild(inputGamePassword);
    
                //input submit
                let gameCreateDiv = document.createElement('div')
                gameCreateDiv.setAttribute('class', 'd-flex justify-content-center align-items-center');
                let inputGameCreate = document.createElement('input');
                inputGameCreate.name = 'gameCreate';
                inputGameCreate.type = 'submit';
                inputGameCreate.id = 'gameCreate';
                inputGameCreate.value = 'Create Game'
                inputGameCreate.setAttribute('class','btn btn-primary mt-5 mx-2 p-2  rounded-pill')
                gameCreateDiv.appendChild(inputGameCreate);
    
            createGameForm.appendChild(hiddenSessionName);
            createGameForm.appendChild(gameNameDiv);
            createGameForm.appendChild(gamePasswordDiv);
            createGameForm.appendChild(gameCreateDiv);
            formDiv.appendChild(createGameForm)
    
            closeButtonDiv.appendChild(closeButton);
            modalDiv.appendChild(closeButtonDiv);
            modalDiv.appendChild(formDiv)
            coverDiv.appendChild(modalDiv);
      
            // make the page unscrollable while the modal form is open
            document.body.style.overflowY = 'hidden';
      
            document.body.append(coverDiv);
        })
    }
    


})