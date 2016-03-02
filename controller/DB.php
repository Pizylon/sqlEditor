<?php
/**
 * Created by PhpStorm.
 * User: Pizylon8
 * Date: 02/03/2016
 * Time: 01:04
 */
class DB {

    /**
     * mi crea la connessione con il database
     * e mi ritorna l'oggetto connessione.
     *
     * @return mysqli
     * mi ritorna un oggetto di tipo
     * mysql inizializzato con la connessione
     */
    protected function createConnection(){
        $sql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        $sql->set_charset("utf8");
        $sql->options(MYSQLI_OPT_CONNECT_TIMEOUT, 2000);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        return $sql;
    }

    function getConnection(){
        $sql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        $sql->set_charset("utf8");
        $sql->options(MYSQLI_OPT_CONNECT_TIMEOUT, 2000);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        return $sql;
    }

}
