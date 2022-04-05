document.addEventListener("DOMContentLoaded", (event) => {


    const searchBar = document.getElementById('search');
    const form = document.querySelector('FORM');

    searchBar.addEventListener('keyup', () =>{

        fetch('http://localhost/LaPlateforme_/ProjectPoolJs/Autocomplete/Js/traitement.php')
        .then((response) => response.json())
        .then((response) => {

            //first check if the search bar is empty or not
            if (searchBar.value != '')
            {
                let removeableDiv = document.getElementById('divContent');
                if(removeableDiv != null)
                {
                    removeableDiv.remove();
                }
                
                //create the div element in which we are going to add our links
                let searchDiv = document.createElement('DIV');

                //give it an id
                searchDiv.id = "divContent";

                //create a set to add all the infos in
                let searchSet = new Set();

                //add the div after the form
                form.after(searchDiv);

                //fill the set with elements that correspond to the value of the bar
                for(let i = 0; i<Object.keys(response).length ;i++)
                {
                    let data = (response[i]);

                    Object.keys(data).forEach(function(key) {

                        let tempValue = JSON.stringify(data[key]);

                        if( tempValue.includes(searchBar.value))
                        {        
                            searchSet.add(data[key]);
                        }
                    })
                }

                //check if the set is filled or not
                if( searchSet.size > 0)
                {   
                    let BreakException = "10!";
                    let count = 0;
                    //je fais un try catch pour limiter la génération à 10
                    //il n'y a pas de break en Js
                    try 
                    {
                        //for each sur le set de pokemon
                        searchSet.forEach( element => {
                            count++;

                            let p = document.createElement('P');
                            p.textContent = element;
                            searchDiv.appendChild(p);

                            
                            if (count == 10) throw BreakException;

                        })
                    } 
                    catch (e) 
                    {
                        if (e !== BreakException) throw e;
                    }   
                                 
                }
            }
            else //if bar is empty
            {
                let removeableDiv = document.getElementById('divContent');

                //check if search bar is empty but there was a div created beforehand
                if(removeableDiv != null)
                {
                    removeableDiv.remove();
                }
            }
            
        })
        .catch((error) => {
             console.log(error)  
        })

    });


});