<?php
    session_start();
    $marchioNome =  $_POST['marchioNome'];

    if(isset($_SESSION["sessionAuto"][$marchioNome])){
        $autoValue = $_SESSION["sessionAuto"][$marchioNome];

        $db = pg_connect("host=localhost port=5432 dbname=userDB user=postgres password=password") or die("Could not connect: " . pg_last_error()); 
        $values = array("iduser" => $_SESSION["user"]["idUser"], "idcar" => $autoValue["idcar"], "citta" => $_SESSION["cittaNoleggio"], "datada" => NULL, "dataa" => NULL);
        
        printf(json_encode($values));
        if(pg_insert($db, "ordini", $values)){
            $_SESSION["orderOK"] = "Grazie per averci scelto, ordine confermato: \\n
                utente:" . $_SESSION["user"]["nome"] . " " . $_SESSION["user"]["cognome"] . "\\n
                auto: " . $autoValue["marchio"] . " " . $autoValue["nome"] . "\\n
                citta: " . $_SESSION["cittaNoleggio"] . "\\n
                Inizio Noleggio: " . $_SESSION["dataDa"] . "\\n
                Fine Noleggio: " . $_SESSION["dataA"];
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