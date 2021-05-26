<?php
    session_start();
    $marchioNome =  $_POST['marchioNome'];

    if(isset($_SESSION["sessionAuto"][$marchioNome])){
        $autoValue = $_SESSION["sessionAuto"][$marchioNome];
        //Connetto al DB, se errore chiama die(...)
        $db = pg_connect("host=localhost port=5432 dbname=userDB user=postgres password=password") or die("Could not connect: " . pg_last_error());
        //Esegue la query
        $result = pg_query($db, "insert into ordini(iduser, idcar, citta, datada, dataa)
                       values(". $_SESSION["user"]["idUser"] .", ". $autoValue["idcar"] .", '". $_SESSION["cittaNoleggio"] ."', '". $_SESSION["dataDa"] ."', '". $_SESSION["dataA"] ."');");
        //Controlla che l'esecuzione della query sia andata a buon fine, altrimenti orderError sara mostrato.
        if($result){
            $_SESSION["orderError"] = "Qualcosa e' andato storto, ordine non inserito!";
            //$_SESSION["orderOK"] = "Grazie per averci scelto, ordine confermato:\nutente:" . $_SESSION["user"]["nome"] . " " . $_SESSION["user"]["cognome"] . "\nauto: " . $autoValue["marchio"] . " " . $autoValue["nome"] . "\ncitta: " . $_SESSION["cittaNoleggio"] . "\nInizio Noleggio: " . $_SESSION["dataDa"] . "\nFine Noleggio: " . $_SESSION["dataA"];
        } else {
            $_SESSION["orderError"] = "Qualcosa e' andato storto, ordine non inserito!";
        }
    } else {
        // Dovrei mettere un msg di errore
        $_SESSION["orderError"] = "Qualcosa e' andato storto, ordine non inserito! " . 
json_encode($_SESSION["sessionAuto"][$marchioNome]) . "marchio: " . $marchio . " nome: " . $nome;
    }
    pg_close($db);
    session_write_close();
?>