<?php
//Primer mira si la pantalla esta plena, si el valor es = proba de
// fer eval que detecta les operecions de l'string, si fa error tira les exepcions si es C borra la pantalla y si no es res d'aixo fa concat.
    if(isset($_POST["pantalla"])){
        $pantalla= $_POST["pantalla"];
        if(isset($_POST["valor"])){
            if(($_POST["valor"]) == "="){
                try{
                    eval("\$pantalla = $pantalla;");
                    $pantalla = round($pantalla,4);
                }catch(DivisionByZeroError $e){
                    $pantalla = "inf";
                }catch(\throwable $e){$pantalla = 'ERROR';}                            
            }elseif(($_POST["valor"]) == "C"){
                $pantalla = "";
            }else{
                $pantalla.= $_POST["valor"];
            }
        }
    } else {
        $pantalla = "";
    } 
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Calculadora</title>
</head>
<body>
    <div class="container">
        <form name="calc" class="calculator" method="post">
            <input type="text" class="value" name="pantalla" readonly value="<?php
            echo $pantalla;
            ?>"/>
            <span class="num"><input name="valor"  type ="submit"value="("></span>
            <span class="num"><input name="valor" type ="submit" value=")"></span>
            <span class="num"><input name="valor" type ="submit" value="SIN"></span>
            <span class="num"><input name="valor" type ="submit" value="COS"></span>
            <span class="num clear"><input name="valor" type ="submit" value="C"></span>
            <span class="num"><input name="valor"  type ="submit"value="/"></span>
            <span class="num"><input name="valor" type ="submit" value="*"></span>
            <span class="num"><input name="valor" type ="submit" value="7"></span>
            <span class="num"><input name="valor" type ="submit" value="8"></span>
            <span class="num"><input name="valor" type ="submit" value="9"></span>
            <span class="num"><input name="valor" type ="submit" value="-"></span>
            <span class="num"><input name="valor" type ="submit" value="4"></span>
            <span class="num"><input name="valor" type ="submit" value="5"></span>
            <span class="num"><input name="valor" type ="submit" value="6"></span>
            <span class="num plus"><input name="valor" type ="submit" value="+"></span>
            <span class="num"><input name="valor" type ="submit" value="1"></span>
            <span class="num"><input name="valor" type ="submit" value="2"></span>
            <span class="num"><input name="valor" type ="submit" value="3"></span>
            <span class="num"><input name="valor" type ="submit" value="0"></span>
            <span class="num"><input name="valor" type ="submit" value="00"></span>
            <span class="num"><input name="valor" type ="submit" value="."></span>
            <span class="num equal"><input name="valor" type ="submit" value="="></span>
        </form>
    </div>
</body>





