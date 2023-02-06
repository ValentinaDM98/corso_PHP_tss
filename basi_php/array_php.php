<?php

$nome = "Mario";
echo "ciao $nome \n";

#INDEX(indicizzato) ARRAY
//scorciatoia array $colori=array();
$colori = ['red','green',"blue"];
echo "\n\n".$colori[2];

#ASSOCIATIVE ARRAY (hanno come chiave delle stringhe)
$persona = [
    "nome" => "Mario",
    "cognome" => "Rossi",
    "email" => "a@b.it"
    ];

//simile a console.log
print_r($persona);
//var_dump($persona); mi indica il numero di caratteri della stringa

/**da errore Array to string conversion */
//echo $persona['email'];

//un array indicizzato che contiene 2 array associativi
$classe = array(
    [
        "nome" => "Mario",
        "cognome" => "Rossi",
        "email" => "a@b.it" 
    ],
    [
        "nome" => "Giovanni",
        "cognome" => "Verdi",
        "email" => "v@d.it"
    ]
);
//0 = primo array, "nome" = accede a sstringa
print_r($classe[0]["nome"]);

#Stile di programmazione IMPERATIVO (dico al ciclo cosa fare)
for ($i=0; $i < count($classe) ; $i++) { 
    $allievo = $classe[$i];
    $nomeAllievo = $allievo['nome']."\n";
    echo $nomeAllievo;
}

#FOREACH
//coppia chiave(nome)/(i) - valore(Giovanni)(allievo)
foreach ($classe as $i => $allievo) {
    echo ($i+1) . ")" . $nomeAllievo;
}

#DICHIARATIVO/FUNZIONALE: map di un array
//Argomenti (funzione,array) ATTENZIONE: le funzioni sono variabili
function stampaNome ($allievo){
    echo $nomeAllievo;
};

array_map('stampaNome', $classe);

