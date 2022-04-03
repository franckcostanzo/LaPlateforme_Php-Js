document.addEventListener("DOMContentLoaded", (event) => {

    const bg = document.body;
    const head = document.getElementById("top");
    const body = document.getElementById("chest");

    const l1 = document.getElementById("L1");
    const l2 = document.getElementById("L2");
    const r1 = document.getElementById("R1");
    const r2 = document.getElementById("R2");
    const b1 = document.getElementById('BG1');
    const b2 = document.getElementById('BG2');
    const b3 = document.getElementById('BG3');
    const b4 = document.getElementById('BG4');
    const b5 = document.getElementById('BG5');

    b1.addEventListener("click", () => {
        bg.style.backgroundImage = "url('/POCfinal/media/bg1.jpg')";
    })

    b2.addEventListener("click", () => {
        bg.style.backgroundImage = "url('/POCfinal/media/bg2.jpg')";
    })

    b3.addEventListener("click", () => {
        bg.style.backgroundImage = "url('/POCfinal/media/bg3.jpg')";
    })

    b4.addEventListener("click", () => {
        bg.style.backgroundImage = "url('/POCfinal/media/bg4.jpg')";
    })

    b5.addEventListener("click", () => {
        bg.style.backgroundImage = "url('/POCfinal/media/bg5.jpg')";
    })

    r1.addEventListener("click", () => {
        let tempNumb = head.src[15];
        switch(tempNumb){
            case "1":
                head.src = "./models/Head_02.gltf";
                break;
            case "2":
                head.src = "./models/Head_03.gltf";
                break;
            case "3":
                head.src = "./models/Head_04.gltf";
                break;
            case "4":
                head.src = "./models/Head_05.gltf";
                break;
            case "5":
                head.src = "./models/Head_01.gltf";
                break;
        }
        
    })

    l1.addEventListener("click", () => {
        let tempNumb = head.src[15];
        switch(tempNumb){
            case "1":
                head.src = "./models/Head_05.gltf";                
                break;
            case "2":                
                head.src = "./models/Head_01.gltf";
                break;
            case "3":
                head.src = "./models/Head_02.gltf";                
                break;
            case "4":                
                head.src = "./models/Head_03.gltf";
                break;
            case "5":
                head.src = "./models/Head_04.gltf";
                break;
        }
    })

    r2.addEventListener("click", () => {
        let tempNumb = body.src[15];
        console.log(tempNumb)
        switch(tempNumb){
            case "1":
                body.src = "./models/Body_V2.gltf";
                break;
            case "2":
                body.src = "./models/Body_V3.gltf";
                break;
            case "3":
                body.src = "./models/Body_V4.gltf";
                break;
            case "4":
                body.src = "./models/Body_V5.gltf";
                break;
            case "5":
                body.src = "./models/Body_V1.gltf";
                break;
        }
    }) 

    l2.addEventListener("click", () => {
        let tempNumb = body.src[15];
        console.log
        switch(tempNumb){
            case "1":
                body.src = "./models/Body_V5.gltf";                
                break;
            case "2":                
                body.src = "./models/Body_V1.gltf";
                break;
            case "3":
                body.src = "./models/Body_V2.gltf";                
                break;
            case "4":                
                body.src = "./models/Body_V3.gltf";
                break;
            case "5":
                body.src = "./models/Body_V4.gltf";
                break;
        }
    })

    

})