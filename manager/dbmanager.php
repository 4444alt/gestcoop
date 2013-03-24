<?php

require_once("/conf/dbconfig.php");
require_once("/manager/querymanager.php");

/**
 * Description of dbmanager
 *
 * @author Andrea
 */
class DBManager {
    
    private $db;
    private $res;
    
    public function __construct() {
        try{
            $this->db = new mysqli(DbConfig::HOST, DbConfig::USER, DbConfig::PASS, DbConfig::SCHEMA);
        }catch(Exception $error){
            //TODO log error
            echo $error->getMessage();
        }
    }
    
    public function query($query) {
        try{
            $this->res = $this->db->query($query, $resultmode = MYSQLI_STORE_RESULT);
        }catch(Exception $error){
            //TODO log error
            echo $error->getMessage();
            $this->res = NULL;
        }
    }
    
    public function getRow() {
        if(!is_null($this->res))
            return $this->res->fetch_assoc();
        return NULL;
    }
    
    public function existRow() {
        if(!is_null($this->res))
            if($this->res->fetch_assoc())
                return TRUE;
        return FALSE;
    }
    
    public function escapeString($string) {
        return $this->db->real_escape_string($string);
    }
    
    public function __destruct() {
        try{
            $this->db->close();
        }catch(Exception $error){
            //TODO log error
            echo $error->getMessage();
        }
    }
    
}

?>
