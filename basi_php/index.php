<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nome = "Mario";
    $eta = 50;
    // l'array non è un oggetto
    $passatempi = array("Tennis","Cinema","no sport");

    /**dichiarazione della funzione */
    function saluta($nome){
        return "Ciao io sono $nome, come va?"; 
        //`Ciao io sono {$nome}, come va?`; al posto delle virgolette posso usare il backtick = template literal
    }

    //stampa a schermo solo STRINGHE e NUMERI
    echo "<h1>scrivo un contenuto su schermo</h1>";

    //chiamo la funzione
    echo saluta("Gianni");
    //echo "<p>" + saluta ($nome) +"<p>"; il segno di concatenazione in php è .
    echo "<p>".saluta ($nome)."</p>";
    echo "<div>".saluta ($nome)."</div>";

    //stampa di un array, devo estrarre le singole stringhe quindi ciclo for
    //passatempi.length è sbagliato perchè non è un oggetto, devo usare count
    echo "<ul>";
    for ($i=0; $i < count($passatempi); $i++) { 
        echo "<li>$passatempi[$i]</li>"; //$passatempi[0];$passatempi[1];
    }
    echo "</ul>";

    $frase = "Ciao sono una frase";
    $frase.= "sono un altro pezzo della frase"; //$frase = $frase."sono un altro pezzo della frase";

    
    ?>
</body>
</html>