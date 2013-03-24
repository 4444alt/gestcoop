<?php

require_once("/conf/dbconfig.php");

/**
 * Query Manager contains all the queries used in this software
 *
 * @author Andrea
 */
class QM {
    
    /**
     * Query Regioni
     * @return Columns: id,regione
     */
    public static function queryRegioni(){
        return "SELECT id,regione FROM " . DbConfig::PREFIX ."regioni";
    }
    
    /**
     * Query Province
     * @return Columns: id, provincia, idregione
     */
    public static function queryProvince() {
        return "SELECT id, provincia, idregione FROM " . DbConfig::PREFIX ."province";
    }
    
    /**
     * Query that verifies user credentials
     * @param type $user : username
     * @param type $pass : not encrypted password
     * @return Columns: id, nome, cognome, reparto, attivo
     */
    public static function queryAuthentication($user, $pass) {
        return "SELECT id, nome, cognome, reparto, attivo " . 
               "FROM " . DbConfig::PREFIX . "user " . 
               "WHERE email='".$user."' AND password='".$pass."'";
    }
    
}

?>
