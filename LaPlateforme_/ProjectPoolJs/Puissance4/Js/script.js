document.addEventListener("DOMContentLoaded", (event) => {

    //------------------------------------------
    //                  DATA
    //------------------------------------------

    const gameBoard = document.getElementById('gameBoard');

    //make an array containing all the gameboxes
    const boxes = document.querySelectorAll('.gameBox');

    //make an array containing all the columns
    const columns = document.querySelectorAll('.gameRow');

    //active player div
    const activePlayerDiv = document.getElementById('activePlayer');

    //result div
    const result = document.querySelector('#result');

    //counter to determine player turn
    let playerCount = 1;

    //Variable containing the last filled box
    var lastFilledBox, lastClickedColumn;

    //hardcoding winning diagonals like a lama
    let winningLTRB = [
        [3,10,17,24],
        [2,9,16,23],
        [9,16,23,30],
        [1, 8, 15, 22],
        [8, 15, 22, 29],
        [15, 22, 29, 36],
        [7, 14, 21, 28],
        [14, 21, 28, 35],
        [21, 28, 35, 42],
        [13, 20, 27, 34],
        [20, 27, 34, 42],
        [19, 26, 33, 40] 
    ];

    //hardcoding winning diagonals like a lama
    let winningLBRT = [
        [4, 9, 14, 19],
        [5, 10, 15, 20],
        [10, 15, 20, 25],
        [6, 11, 16, 21],
        [11, 16, 21, 26],
        [16, 21, 26, 31],
        [12, 17, 22, 27],
        [17, 22, 27, 32],
        [22, 27, 32, 37],
        [18, 23, 28, 33],
        [23, 28, 33, 38],
        [24, 29, 34, 39]
    ];
    



    //------------------------------------------
    //               FUNCTIONS
    //------------------------------------------

    //function to check the board to see if someone won
    function checkIfWon()
    {
        let playerPlaying;        

        if((playerCount % 2) != 0) 
        {
            playerPlaying = 'playerOne';
        }
        else
        {
            playerPlaying = 'playerTwo';
        }

        checkFullBoard();
        checkDiagonalLTRB(playerPlaying);
        checkDiagonalLBRT(playerPlaying);        
        checkHorizontal(playerPlaying);
        checkVertical(playerPlaying);
    }

    //set active player div name
    function setActivePlayerDiv()
    {
        let playerPlaying, colorStyle;      

        if((playerCount % 2) != 0) 
        {
            playerPlaying = 'playerOne';
            colorStyle = 'red';
        }
        else
        {
            playerPlaying = 'playerTwo';
            colorStyle = 'yellow'
        }

        if (activePlayerDiv != null)
        {
            activePlayerDiv.innerText = playerPlaying + " |  turn :" + playerCount;
            activePlayerDiv.style.color = colorStyle;
        }
        
    }

    setActivePlayerDiv();

    //function to check if 4 are aligned verticaly
    function checkVertical(playerArg)
    {
        //checking column possibilities
        let lastClickedColumnChildren = lastClickedColumn.childNodes;

        //loop 3 times since there can be only three possible winning combination in each vertical line
        for (let i = 1; i<6; i+=2)
        {

            if (  (lastClickedColumnChildren[i].hasChildNodes() && lastClickedColumnChildren[i].firstChild.getAttribute('class') == playerArg)
               && (lastClickedColumnChildren[i+2].hasChildNodes() && lastClickedColumnChildren[i+2].firstChild.getAttribute('class') == playerArg)
               && (lastClickedColumnChildren[i+4].hasChildNodes() && lastClickedColumnChildren[i+4].firstChild.getAttribute('class') == playerArg)
               && (lastClickedColumnChildren[i+6].hasChildNodes() && lastClickedColumnChildren[i+6].firstChild.getAttribute('class') == playerArg))
            {
                alert(playerArg +' won !');
                stopGame();               
            }
        }

    }

    //function to check if 4 are aligned horizontaly
    function checkHorizontal(playerArg)
    {
        //parse the id of the last filled box to int to use it
        let tempIdLastFilledBox = parseInt(lastFilledBox.getAttribute('id'));

        //create a set to store uniq div values
        let horizontalSet = new Set();

        //loop from -6 to +6 since the value of the id of all the boxes in a horizontal row are increased to right and decreased to the left
        //and there can be maximum 6 boxes to each ends
        for( let i = -6; i<=6; i++)
        {
            //tranform the temporary id of the last filled box to match the ones to the supposed extrems
            //and multiply by six
            //e.g: my last filled box id is 24, there can be maximum 6 boxes to the right and six to the left
            //the one box directly to the right has for id 24 + 6 = 30
            //the one box directly to the left has for id 24 - 6 = 18
            let tempId = (i*6)+tempIdLastFilledBox;

            //if there is a box at the given tempId, then add it to the set
            if(document.getElementById(tempId) != null)
            {
                horizontalSet.add(document.getElementById(tempId))
            }
            
        }
        
        //turn the set into an array to easily iterate over
        let horizontalArray = Array.from(horizontalSet);

        //loop 4 times since there can be only four possibe winning combination in each horizontal line
        for (let i = 0; i<4; i++)
        {

            if (  (horizontalArray[i].hasChildNodes() && horizontalArray[i].firstChild.getAttribute('class') == playerArg)
               && (horizontalArray[i+1].hasChildNodes() && horizontalArray[i+1].firstChild.getAttribute('class') == playerArg)
               && (horizontalArray[i+2].hasChildNodes() && horizontalArray[i+2].firstChild.getAttribute('class') == playerArg)
               && (horizontalArray[i+3].hasChildNodes() && horizontalArray[i+3].firstChild.getAttribute('class') == playerArg))
            {
                alert(playerArg +' won !');
                stopGame();               
            }
        }
    }

    //function to check if 4 aligned diagonaly left-top to right-bottom
    function checkDiagonalLTRB(playerArg)
    {
        //parse the id of the last filled box to int to use it
        let tempIdLastFilledBox = parseInt(lastFilledBox.getAttribute('id'));

        for(let i=0; i<winningLTRB.length; i++)
        {
            if  (   winningLTRB[i].includes(tempIdLastFilledBox) 
                    &&  (   (document.getElementById(winningLTRB[i][0]).hasChildNodes() && document.getElementById(winningLTRB[i][0]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLTRB[i][1]).hasChildNodes() && document.getElementById(winningLTRB[i][1]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLTRB[i][2]).hasChildNodes() && document.getElementById(winningLTRB[i][2]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLTRB[i][3]).hasChildNodes() && document.getElementById(winningLTRB[i][3]).firstChild.getAttribute('class') == playerArg) 
                        )
                )

            {
                alert(playerArg +' won !');
                stopGame();
            }

        }

    }

    //function to check if 4 aligned diagonaly left-bottom to right-top
    function checkDiagonalLBRT(playerArg)
    {
        //parse the id of the last filled box to int to use it
        let tempIdLastFilledBox = parseInt(lastFilledBox.getAttribute('id'));

        for(let i=0; i<winningLBRT.length; i++)
        {
            if  (   winningLBRT[i].includes(tempIdLastFilledBox) 
                    &&  (   (document.getElementById(winningLBRT[i][0]).hasChildNodes() && document.getElementById(winningLBRT[i][0]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLBRT[i][1]).hasChildNodes() && document.getElementById(winningLBRT[i][1]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLBRT[i][2]).hasChildNodes() && document.getElementById(winningLBRT[i][2]).firstChild.getAttribute('class') == playerArg)
                            && (document.getElementById(winningLBRT[i][3]).hasChildNodes() && document.getElementById(winningLBRT[i][3]).firstChild.getAttribute('class') == playerArg) 
                        )
                )

            {
                alert(playerArg +' won !');
                stopGame();
            }

        }
    }

    //function to check if board is full and noone wins
    function checkFullBoard()
    {
        //counter to determine count of filled boxes
        let boardCount = 0;

        //loop over entire array of boxes
        for(let i = 0; i<boxes.length; i++)
        {
            if( boxes[i].hasChildNodes() == true)
            {
                boardCount++
            }
        }

        //check if board is full
        if(boardCount == 42)
        {
            alert('Draw !');
                stopGame();
        }
    }

    //function to stop being able to play
    function stopGame()
    {        
        gameBoard.addEventListener("click", (e) => {
            e.stopPropagation();
            e.stopImmediatePropagation();
            e.preventDefault();
          }, true)
    }



    //------------------------------------------
    //          EVENT LISTENERS
    //------------------------------------------

    //loop over the columns array, start at 1, because i want my columns to be numbered from one to 7
    for(let i=1; i<=columns.length; i++)
    {
        //give an id to each column
        columns[i-1].setAttribute('id', "c"+i);

        //add event listener for each column
        columns[i-1].addEventListener('click', () =>{

            //instanciate lastclickdColumn variable with last clicked column
            lastClickedColumn = columns[i-1];

            //create array containing all the children of clicked column
            let tempColumnChildrenArray = columns[i-1].childNodes;

            //loop over children array descending since last item will be the first we want to fill
            //jumping 2 each time because for some reason Js detects text nodes that we want to skip
            for(let y = tempColumnChildrenArray.length-2; y>0;y-=2)
            {
                //if the child has no child then fill it
                if(!tempColumnChildrenArray[y].hasChildNodes())
                {
                    lastFilledBox = tempColumnChildrenArray[y];

                    //if statement to check which player is playing
                    //if (playerCount % 2) != 0 meaning if we divide the playerCount variable and there is something left
                    //then it's player one's turn
                    if((playerCount % 2) != 0) 
                    {
                        //create a div, then attach the playerOne token css class, then append it
                        let playerOneTokens = document.createElement('DIV');
                        playerOneTokens.setAttribute('class','playerOne');
                        tempColumnChildrenArray[y].appendChild(playerOneTokens);
                    } 
                    else //else it's player two's turn
                    {
                        //create a div, then attach the playerTwo token css class, then append it
                        let playerTwoTokens = document.createElement('DIV');
                        playerTwoTokens.setAttribute('class','playerTwo');
                        tempColumnChildrenArray[y].appendChild(playerTwoTokens);
                    }

                    //Break if true, because we don't want to go further filling the column
                    break;
                }
            }
            
            checkIfWon();
            
            //player turn is over, so we increment the counter
            playerCount++;
            setActivePlayerDiv();
            
        })
    }

    //loop over the boxes array, start at 1, because i want my columns to be numbered from one to 7
    for(let i = 1; i <= boxes.length; i++)
    {
        //give an id to each box
        boxes[i-1].setAttribute('id', i);

        boxes[i-1].addEventListener('click', () => {
            console.log(boxes[i-1].getAttribute('id'))
        })

    }    


})