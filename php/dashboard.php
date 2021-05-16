<?php
//Array contenente i dati per la connessione al DB
$config = [
    'db_engine' => 'mysql',
    'db_host' => '127.0.0.1',
    'db_name' => 'users',
    'db_user' => 'root',
    'db_password' => '',
];

$db_config = $config['db_engine'] . ":host=".$config['db_host'] . ";dbname=" . $config['db_name'];
//Provo connessione al DB, se non va a buon fine stampo il messaggio 'impossibile connettersi ...'
try {
    $pdo = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);
        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}