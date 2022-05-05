document.addEventListener("DOMContentLoaded", (event) => {

    const clock = document.getElementById('clock');
    const clockButton =  document.getElementById('timeClock');
    const timerButton = document.getElementById('timer');
    const chronoButton = document.getElementById('chrono');
    const alarmButton = document.getElementById('alarmClock');
    var hourInterval, timerInterval, chronoInterval, alarmInterval, startingHour,  chronoTime;
    var alarmHour, alarmMinutes, alarmVerification;
    var audioTimer = new Audio('./Js/Media/alarm.mp3');
    var audioAlarm = new Audio('./Js/Media/wakeup.mp3');

    function setTime() {

        //transposition de chacune des parties de l'heure affichée
        let hour = parseInt(chronoTime / 3600, 10);
        let minutes = parseInt((chronoTime / 60) % 60, 10);
        let seconds = parseInt(chronoTime %60, 10);

        //gestion du zéro si le nombre est inférieur à 10
        hour = hour < 10 ? "0" + hour : hour;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        //display
        clock.innerHTML = `${hour} : ${minutes} : ${seconds}`;
    }

    clockButton.addEventListener('click', () => {

        //stop all the running timers
        clearInterval(timerInterval);
        clearInterval(chronoInterval);
        clearInterval(alarmInterval);

        //destroy all the other divs and destroy their timer
        //--- Timer Div
        let timerDiv = document.getElementById('timerDiv');
        if (timerDiv != null) {timerDiv.remove()};

        //-- Chrono Div / laps Div
        let chronoDiv = document.getElementById('chronoDiv');
        if (chronoDiv != null) {chronoDiv.remove()};
        let lapsDiv =  document.getElementById('lapsDiv');
        if (lapsDiv != null) {lapsDiv.remove()}

        //-- Alarm Div
        let alarmDiv = document.getElementById('alarmDiv');
        if (alarmDiv != null) {alarmDiv.remove()}
        

        //time display function
        function displayTime () {

            const date = new Date();
    
            let hour = date.getHours().toString();
            let minutes = date.getMinutes().toString();
            let seconds = date.getSeconds().toString();

            hour = hour < 10 ? "0" + hour : hour;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;            
    
            clock.innerHTML = `${hour} : ${minutes} : ${seconds}`;
    
        }
    
        hourInterval = setInterval(displayTime, 1000);

    });

    timerButton.addEventListener('click', () => {

        //stop the hour from displaying
        clearInterval(hourInterval);
        clearInterval(chronoInterval);
        clearInterval(alarmInterval);

        //destroy all the other divs and destroy their timer
        //-- Chrono Div / laps Div
        let chronoDiv = document.getElementById('chronoDiv');
        if (chronoDiv != null) {chronoDiv.remove()};
        let lapsDiv =  document.getElementById('lapsDiv');
        if (lapsDiv != null) {lapsDiv.remove()}

        //-- Time
        clock.innerHTML = '';
        
        //-- Alarm Div
        let alarmDiv = document.getElementById('alarmDiv');
        if (alarmDiv != null) {alarmDiv.remove()}

        //timer div containing stop and start buttons
        let timerDiv = document.createElement('DIV');
        timerDiv.setAttribute('id', 'timerDiv');

        //button start timer
        let startButton = document.createElement('Button');
        startButton.setAttribute('name', 'start');
        startButton.innerText = "start";

        //button stop timer
        let stopButton = document.createElement('Button');
        stopButton.setAttribute('name', 'stop');
        stopButton.innerText = "stop";

        //button reset timer
        let resetButton = document.createElement('Button');
        resetButton.setAttribute('name', 'reset');
        resetButton.innerText = "reset";

        //add elements to page
        timerDiv.appendChild(startButton);
        timerDiv.appendChild(stopButton);
        timerDiv.appendChild(resetButton);
        clock.after(timerDiv);       

        //input Hours        
        let hoursInput = document.createElement('INPUT');
        hoursInput.setAttribute("type","number");
        hoursInput.setAttribute("class", "timeInputs");
        hoursInput.setAttribute('id', 'hoursInput');
        hoursInput.setAttribute("value",0);

        //input Minutes
        let minutesInput = document.createElement('INPUT');
        minutesInput.setAttribute("type","number");
        minutesInput.setAttribute("class", "timeInputs");
        minutesInput.setAttribute('id', 'minutesInput');
        minutesInput.setAttribute("value",0);

        //input Seconds
        let secondsInput = document.createElement('INPUT');
        secondsInput.setAttribute("type","number");
        secondsInput.setAttribute("class", "timeInputs");
        secondsInput.setAttribute('id', 'secondsInput');
        secondsInput.setAttribute("value",0);

        //semi colons
        let semiColon = document.createElement('DIV');
        semiColon.innerText = ":";
        let semiColon2 = document.createElement('DIV');
        semiColon2.innerText = ":";

        clock.appendChild(hoursInput);
        clock.appendChild(semiColon);
        clock.appendChild(minutesInput);
        clock.appendChild(semiColon2);
        clock.appendChild(secondsInput);

        function decreaseTime() { 

            if (startingHour == 0) 
            {
                clearInterval(timerInterval);
                audioTimer.play();                
            }
            else
            {
                startingHour--

                //transposition de chacune des parties de l'heure affichée
                let hour = parseInt(startingHour / 3600, 10);
                let minutes = parseInt((startingHour / 60) % 60, 10);
                let seconds = parseInt(startingHour %60, 10);
        
                //gestion du zéro si le nombre est inférieur à 10
                hour = hour < 10 ? "0" + hour : hour;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;            
        
                //affichage du temps du minuteur            
                hoursInput.value = hour;
                minutesInput.value = minutes;
                secondsInput.value = seconds;
            }

        }
        

        //event listener START
        startButton.addEventListener('click', () =>{
            let testHour = parseInt(hoursInput.value);
            let testMinute = parseInt(minutesInput.value);
            let testSeconds = parseInt(secondsInput.value);
            startingHour = (testHour * 3600) + ( testMinute * 60) + (testSeconds);            
            console.log(startingHour);
            timerInterval = setInterval(decreaseTime, 1000);
        });

        //event listener STOP
        stopButton.addEventListener('click', () => {
            clearInterval(timerInterval);
        });
        
        //event listener RESET
        resetButton.addEventListener('click', () => {
            clearInterval(timerInterval);

            //remise à zero
            hoursInput.value = 0;
            minutesInput.value = 0;
            secondsInput.value = 0;
        })
    })

    chronoButton.addEventListener('click', () => {
        
        //stop the hour from displaying
        clearInterval(hourInterval);
        clearInterval(timerInterval);
        clearInterval(alarmInterval);

        //destroy all the other divs and destroy their timer
        //--- Timer Div
        let timerDiv = document.getElementById('timerDiv');
        if (timerDiv != null) {timerDiv.remove()};

        //-- Time
        clock.innerHTML = '';  
        
        //-- Alarm Div
        let alarmDiv = document.getElementById('alarmDiv');
        if (alarmDiv != null) {alarmDiv.remove()}
        
        //timer div containing stop and start buttons
        let chronoDiv = document.createElement('DIV');
        chronoDiv.setAttribute('id', 'chronoDiv');

        //button start timer
        let startButton = document.createElement('Button');
        startButton.setAttribute('name', 'start');
        startButton.innerText = "start";

        //button lap timer
        let lapButton = document.createElement('Button');
        lapButton.setAttribute('name', 'lap');
        lapButton.innerText = "lap";

        //button stop timer
        let stopButton = document.createElement('Button');
        stopButton.setAttribute('name', 'stop');
        stopButton.innerText = "stop";

        //button reset timer
        let resetButton = document.createElement('Button');
        resetButton.setAttribute('name', 'reset');
        resetButton.innerText = "reset";

        //add elements to page
        chronoDiv.appendChild(startButton);
        chronoDiv.appendChild(lapButton);
        chronoDiv.appendChild(stopButton);
        chronoDiv.appendChild(resetButton);
        clock.after(chronoDiv);
        
        //laps div
        let lapsDiv = document.createElement('DIV');
        lapsDiv.setAttribute('id', 'lapsDiv');
        let titleLapsDiv = document.createElement('H3'); //title
        titleLapsDiv.setAttribute("id", 'titleLapsDiv');
        titleLapsDiv.innerText = "temps :";
        lapsDiv.appendChild(titleLapsDiv);
        chronoDiv.after(lapsDiv);

        chronoTime = 0;

        setTime();

        function increaseTime() 
        {
            chronoTime++

            setTime();
            
        };

        startButton.addEventListener('click', () =>{

            chronoInterval = setInterval(increaseTime, 1000);

        })
        
        //event listener STOP
        stopButton.addEventListener('click', () => {

            clearInterval(chronoInterval);
        });
        
        //event listener RESET
        resetButton.addEventListener('click', () => {

            clearInterval(chronoInterval);

            //remise à zero
            chronoTime = 0;

            setTime();

        })

        lapButton.addEventListener('click', () => {

            let lpsDiv = document.getElementById('lapsDiv')
            let lapsP = document.createElement('P');
            lapsP.setAttribute('class', 'lapTime');

            //transposition de chacune des parties de l'heure affichée
            let hour = parseInt(chronoTime / 3600, 10);
            let minutes = parseInt((chronoTime / 60) % 60, 10);
            let seconds = parseInt(chronoTime %60, 10);

            //gestion du zéro si le nombre est inférieur à 10
            hour = hour < 10 ? "0" + hour : hour;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            lapsP.innerText = `${hour} : ${minutes} : ${seconds}`;
            
            //si le nombre d'enfants de la div est égal à 6, j'enlève le premier temps
            if (lpsDiv.childElementCount == 6)
            {
              lpsDiv.removeChild(lpsDiv.children[1])  
            }

            lpsDiv.appendChild(lapsP);

            //remise à zero
            chronoTime = 0;

        })

    })

    alarmButton.addEventListener('click', () => {

        //stop the hour from displaying
        clearInterval(hourInterval);
        clearInterval(timerInterval);
        clearInterval(chronoInterval);

        //destroy all the other divs and destroy their timer
        //--- Timer Div
        let timerDiv = document.getElementById('timerDiv');
        if (timerDiv != null) {timerDiv.remove()};

        //-- Time
        clock.innerHTML = '';

        //-- Chrono Div / laps Div
        let chronoDiv = document.getElementById('chronoDiv');
        if (chronoDiv != null) {chronoDiv.remove()};
        let lapsDiv =  document.getElementById('lapsDiv');
        if (lapsDiv != null) {lapsDiv.remove()}

        //containing div
        let alarmDiv = document.createElement('DIV');
        alarmDiv.setAttribute('id', 'alarmDiv');        

            //input alarm        
            let alarmInput = document.createElement('INPUT');
            alarmInput.setAttribute("type","time");
            alarmInput.setAttribute('id', 'alarmInput');
            alarmInput.setAttribute("value",0);
            alarmDiv.appendChild(alarmInput)

            //div containing alarmButtons
            let alarmButtonDiv = document.createElement('DIV');
            alarmButtonDiv.setAttribute('id', 'alarmButtonDiv')

                //button set timer
                let setButton = document.createElement('Button');
                setButton.setAttribute('name', 'set');
                setButton.innerText = "set";
                alarmButtonDiv.appendChild(setButton);

                //button stop timer
                let stopButton = document.createElement('Button');
                stopButton.setAttribute('name', 'stop');
                stopButton.innerText = "stop";
                alarmButtonDiv.appendChild(stopButton);

        alarmDiv.appendChild(alarmInput);
        alarmDiv.appendChild(alarmButtonDiv);

        clock.after(alarmDiv);

        //time display function
        function displayTime () {

            const date = new Date();
    
            let hour = date.getHours().toString();
            let minutes = date.getMinutes().toString();
            let seconds = date.getSeconds().toString();

            hour = hour < 10 ? "0" + hour : hour;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;            
    
            clock.innerHTML = `${hour} : ${minutes} : ${seconds}`;
    
        }

        setButton.addEventListener('click', () => {

            console.log('youpi!')
            console.log(alarmInput.value)
            alarmHour = parseInt(alarmInput.value[0]) * 10 + parseInt(alarmInput.value[1]);
            alarmMinutes = parseInt(alarmInput.value[3]) * 10 + parseInt(alarmInput.value[4]);
            alarmVerification = setInterval(throwAlarm, 1000);
            throwAlarm();

        })

        stopButton.addEventListener('click', () => {
            clearInterval(alarmVerification);
            audioAlarm.pause();            
        })

        function throwAlarm() {
            
            let hourVerif = parseInt(clock.innerText[0])*10 + parseInt(clock.innerText[1]);
            let minuteVerif = parseInt(clock.innerText[5])*10 + parseInt(clock.innerText[6]);
             if (alarmHour == hourVerif && alarmMinutes == minuteVerif) {
                audioAlarm.play()
             }
             

        }

        alarmInterval = setInterval(displayTime, 1000);
        
    })
    
});