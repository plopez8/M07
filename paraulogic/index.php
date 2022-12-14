<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        getseed();
        comprobarparaula();
    }

//generem seed
    function getseed(){
        $seed = date("Ymd");
        srand($seed);
    }
//obtenim caracter random
    function randomchar(){
        $abc = ["_", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        return($abc[rand() % 27]);
    }


//comprobem que hi hagi 3 paraules posibles    
    function comprobarnumparaules(){
        $paraules = buscarparaules();
        if(count($paraules) < 3){
            comprobarnumparaules();
        }else{
            return $paraules;
        }
    }


    //commprobem si la paraula es correcte
    function comprobarparaula(){
        $paraules = comprobarnumparaules();
        print_r($paraules);
        echo("alos");
        $total = 0;
    for($i = 0; $i < count($paraules); $i++){
        if($_POST['word'] == $paraules[i])
        $total++;
    }    
    }


    //busquem paraules posibles
    function buscarparaules(){
        $llista = comprobarduplicado();
        $array = get_defined_functions();
        $array = $array['internal'];
        $total=0;
        $paraulesbones = [];
        for ($i=0; $i < count($array); $i++) { 
            $paraula = $array[$i];
            $lletres = 0;
            for ($j=0; $j < strlen($paraula); $j++) { 
                for ($l=0; $l < count($llista); $l++){
                    if($llista[$l] == $paraula[$j]){
                        $lletres = $lletres+1;
                    } 
                }
                if($lletres == strlen($paraula)){
                    $total++;
                    $paraulesbones[] = $paraula;
                }
            }
        }
        return $paraulesbones;
    }

    
//comprobem si hi ha lletres duplicades
    function comprobarduplicado(){
        $llista = [];
        $llista[0] = randomchar();
        for ($i=1; $i < 7; $i++) { 
                $llista[$i] = randomchar();
            for ($j=0; $j < $i; $j++) {
                if($llista[$i] == $llista[$j]){
                    $i--;
                }
            }
        }
        return $llista;
    }
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <title>PHP??gic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Juga al PHP??gic.">
    <link href="//fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body data-joc="2022-10-07">
<div class="main">
    <h1>
        <a href=""><img src="logo.png" height="54" class="logo" alt="PHPl??gic"></a>
    </h1>


    <!--<div class="container-notifications">
        <p class="hide" id="message" style="">MISSATGE D'ERROR</p>
    </div>-->
    <form name="parau" class="paraulogic" method="post">
    <div class="cursor-container">
        <p id="input-word"><span id="test-word"  name ="word"></span><span id="cursor" >|</span></p>
    </div>
    
    <div class="container-hexgrid"> 
        <ul id="hex-grid">
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='e' draggable="false"><p>e</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='s' draggable="false"><p>s</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='a' draggable="false"><p>a</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='u' draggable="false" id="center-letter"><p>u</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='i' draggable="false"><p>i</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='t' draggable="false"><p>t</p></a></div>
            </li>
            <li class="hex">
                <div class="hex-in"><a class="hex-link" data-lletra='l' draggable="false"><p>l</p></a></div>
            </li>
        </ul>
    </div>

    <div class="button-container">
        <button id="delete-button" type="button" title="Suprimeix l'??ltima lletra" onclick="suprimeix()"> Suprimeix</button>
        <button id="shuffle-button" type="button" class="icon" aria-label="Barreja les lletres" title="Barreja les lletres" onclick="reinicia()">
            <svg width="16" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 512 512">
                <path fill="currentColor"
                      d="M370.72 133.28C339.458 104.008 298.888 87.962 255.848 88c-77.458.068-144.328 53.178-162.791 126.85-1.344 5.363-6.122 9.15-11.651 9.15H24.103c-7.498 0-13.194-6.807-11.807-14.176C33.933 94.924 134.813 8 256 8c66.448 0 126.791 26.136 171.315 68.685L463.03 40.97C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.749zM32 296h134.059c21.382 0 32.09 25.851 16.971 40.971l-41.75 41.75c31.262 29.273 71.835 45.319 114.876 45.28 77.418-.07 144.315-53.144 162.787-126.849 1.344-5.363 6.122-9.15 11.651-9.15h57.304c7.498 0 13.194 6.807 11.807 14.176C478.067 417.076 377.187 504 256 504c-66.448 0-126.791-26.136-171.315-68.685L48.97 471.03C33.851 486.149 8 475.441 8 454.059V320c0-13.255 10.745-24 24-24z"></path>
            </svg>
        </button>
        <button id="submit-button" type="submit" title="Introdueix la paraula">Introdueix</button>
    </div>
    </form>
    <div class="scoreboard">
        <div>Has trobat <span id="letters-found">0</span> <span id="found-suffix">funcions</span><span id="discovered-text">.</span>
        </div>
        <div id="score"></div>
        <div id="level"></div>
    </div>

</div>
<script>
    
    function amagaError(){
        if(document.getElementById("message"))
            document.getElementById("message").style.opacity = "0"
    }

    function afegeixLletra(lletra){
        document.getElementById("test-word").innerHTML += lletra
    }

    function suprimeix(){
        document.getElementById("test-word").innerHTML = document.getElementById("test-word").innerHTML.slice(0, -1)
    }

    function reinicia(){
        document.getElementById("test-word").innerHTML = ""
    }

    window.onload = () => {
        // Afegeix funcionalitat al click de les lletres
        Array.from(document.getElementsByClassName("hex-link")).forEach((el) => {
            el.onclick = ()=>{afegeixLletra(el.getAttribute("data-lletra"))}
        })

        setTimeout(amagaError, 2000)

        //Anima el cursor
        let estat_cursor = true;
        setInterval(()=>{
            document.getElementById("cursor").style.opacity = estat_cursor ? "1": "0"
            estat_cursor = !estat_cursor
        }, 500)
    }


</script>
</body>
</html>

