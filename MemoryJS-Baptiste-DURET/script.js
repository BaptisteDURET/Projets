let tabsrc = [];
let tabSatellites = ["./images/Ariel.png","./images/Ariel.png","./images/Callisto.png","./images/Callisto.png", "./images/Charon.png", "./images/Charon.png", "./images/Déimos.png", "./images/Déimos.png", "./images/Europe.png", "./images/Europe.png", "./images/Ganymède.png", "./images/Ganymède.png", "./images/Io.png", "./images/Io.png", "./images/Japet.png", "./images/Japet.png", "./images/Lune.png", "./images/Lune.png", "./images/Mimas.png", "./images/Mimas.png", "./images/Miranda.png", "./images/Miranda.png", "./images/Nix.png", "./images/Nix.png", "./images/Obéron.png", "./images/Obéron.png", "./images/Phobos.png", "./images/Phobos.png", "./images/Phoebé.png", "./images/Phoebé.png", "./images/Télesto.png", "./images/Télesto.png", "./images/Titan.png", "./images/Titan.png", "./images/Triton.png", "./images/Triton.png"];
let SizeTab = tabSatellites.length;
let points = 0;
let id = 1;
let images = document.getElementsByTagName("img");
let button = document.getElementById("begin");
button.addEventListener("click", start);

function start()
{
    let main = document.getElementById("main");
    let score = document.createElement("h2");
    score.innerText = `Score : ${points}`;
    score.id = "score";
    main.append(score);
    document.getElementsByTagName("h1")[0].after(score);

    //Supprime les règles
    let rules = document.getElementById("rules");
    rules.parentNode.removeChild(rules);

    //Créé les cartes
    for(let i = 0; i != 6; i++)
    {
        let divgame = document.getElementById("game");
        let img1 = document.createElement("img");
        let img2 = document.createElement("img");
        let img3 = document.createElement("img");
        let img4 = document.createElement("img");
        let img5 = document.createElement("img");
        let img6 = document.createElement("img");
        let newdiv = document.createElement("div");

        newdiv.appendChild(img1);
        newdiv.appendChild(img2);
        newdiv.appendChild(img3);
        newdiv.appendChild(img4);
        newdiv.appendChild(img5);
        newdiv.appendChild(img6);

        divgame.appendChild(newdiv);
        newdiv.className = "row";
    }

    //Initialise les events et les images
    let images = document.getElementsByTagName("img");
    for(let i = 0; i < images.length; i++)
    {
        images[i].addEventListener("click", flipcard, false);
        images[i].src = "./images/Back.png";
    }
}





function flipcard()
{
    if(event.target.className == "")
    {
        let index = getRandomInt(tabSatellites.length-1);
        event.target.src = tabSatellites[index];
        tabsrc.push(event.target.src);
        event.target.className = event.target.src;
        tabSatellites.splice(index, 1);
        event.target.removeEventListener("click", flipcard, false);
    }
    else
    {
        event.target.src = event.target.className;
        tabsrc.push(event.target.src);
        event.target.removeEventListener("click", flipcard, false);
    }
    countscore();
    
}

//Compte le score du joueur
function countscore()
{
    if(tabsrc.length >= 2)
    {
        if(tabsrc[0] === tabsrc[1])
        {
            points += 5;
            document.getElementById("score").innerText = `Score : ${points}`;
            
            for(img of images)
            {
                if(img.src == tabsrc[0] || img.src == tabsrc[1])
                {
                    img.id = id;
                    img.removeEventListener("click", flipcard, false);
                    id++;
                }
            }
            
            tabsrc.splice(0, tabsrc.length);
            EndGame();
            
        }
        else
        {
            points -= 1;
            document.getElementById("score").innerText = `Score : ${points}`;
            BlockClickIfFlipCard();
        }
    }
}

//Empêche de tourner d'autres cartes si deux cartes sont déjà tournées et retourne la carte au bout de 1 seconde
function BlockClickIfFlipCard()
{

    for(satellite of images)
    {
        if(satellite.className == tabsrc[0] || satellite.className == tabsrc[1])
        {
            for(s of images)
            {
                s.removeEventListener("click", flipcard, false);
            }
            const sat = satellite
            setTimeout(function(){
                sat.src = "./images/Back.png";
                for(s of images)
                {
                    s.addEventListener("click", flipcard, false);
                }
            }, 1000);
        }
    }
    
    tabsrc.splice(0, tabsrc.length);
}

//Termine la partie quand toutes les cartes sont retournées et affiche le score et un bouton pour rejouer
function EndGame()
{
    let ids = 0;
    for(img of images)
    {
        if(img.id != "")
        {
            ids++;
        }
    }
    if(ids == SizeTab)
    {
        let main = document.getElementById("main");
        main.parentNode.removeChild(main);

        let ScoreFinal = document.createElement("h1");
        ScoreFinal.innerText = `Félicitation votre score est de : ${points}`;
        ScoreFinal.className = "ScoreFinal";

        let body = document.getElementsByTagName("body")[0];
        body.appendChild(ScoreFinal);

        let replayButton = document.createElement("input");
        replayButton.type = 'button';
        replayButton.value = "Rejouer";
        replayButton.className ="ReplayButton";
        replayButton.addEventListener("click", redirect, false);

        body.appendChild(replayButton);

    }
}

function redirect()
{
    location.reload();
}

//Permet de retourner un nombre aléatoire
function getRandomInt(max) 
{
    return Math.floor(Math.random() * max);
}