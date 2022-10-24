<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo('halo');
        
        //mira si es singup o singin
        if($_POST['method'] == 'signup'){
            echo('singup');
            crearusuari();
        }
        if($_POST['method'] == 'signin'){
            echo('singin');
            comprobarusuari();
        }
        
        // echo($_POST['method']);
        // crearusuari();
        // comprobarusuari();

    }
//crea l'usuari si no hi ha cap usuari igual;
    function crearusuari(){
        
        $nom = $_POST['nom'];
        $gmail = $_POST['email'];
        $contrasenya = $_POST['pwd'];
        $json = file_get_contents('users.json');
        $json_data = json_decode($json,true);
        if($json_data == null){
            $myArr = array('0', '0', '0');
            $json_data[] = $myArr;
            $myJSON = json_encode($json_data);
            file_put_contents('users.json', $myJSON);
        }
        $igual = 0;
        if(is_null($contrasenya)){
            header("Location: index.php");
        }else{   
        for ($i=0; $i< count($json_data); $i++){
            if ($json_data[$i][1] == $gmail){
                $igual++;
            }
        }
    }
        if ($igual == 0){
            $myArr = array($nom, $gmail, $contrasenya);
            $json_data[] = $myArr;
            $myJSON = json_encode($json_data);
            file_put_contents('users.json', $myJSON);
            header("Location: hola.php");
        }else{
            header("Location: index.php");
        }
    }
//comproba si l'usuari es correcte
    function comprobarusuari(){
        $gmail = $_POST['email'];
        $contrasenya = $_POST['pwd'];
        $json = file_get_contents('users.json');
        $json_data = json_decode($json,true);
        $igual = 0;
        for ($i=0; $i< count($json_data); $i++){
            if (($json_data[$i][1] == $gmail) && ($json_data[$i][2] == $contrasenya)){
                $igual++;
                $nom = $json_data[$i][0];
            }
        }
        if ($igual == 1){
            header("Location: hola.php");
            
        } else {
            header("Location: index.php");
        }
    }
// obte el nom per mostrarlo en hola.php
    function mostrarnom($nom){
        echo($_POST['nom']);
        return "Hola".$_POST['nom'].", les teves darreres connexions són: ";
    }
?>
