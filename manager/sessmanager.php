<?php


/**
 * Description of sessmanager
 *
 * @author Andrea
 */
class SM {
    
    private static $USERNAME = 'prj67tgd';
    private static $PASSWORD = 'y76tgrfy';
    
    public static function startSession() {
        session_start();
        session_regenerate_id();
    }
    
    public static function getParam($param) {
        return $_SESSION[$param];
    }
    
    public static function setParam($param, $value) {
        $_SESSION[$param] = $value;
    }
    
    public static function existParam($param) {
        if(isset($_SESSION[$param]))
            return TRUE;
        return FALSE;
    }
    
    //###USER ZONE###
    
    public static function setUser($user) {
        self::setParam(self::$USERNAME, $user);
    }
    
    public static function setPassword($pass) {
       self::setParam(self::$PASSWORD, $pass);
    }
    
    public static function getUser() {
        return self::getParam(self::$USERNAME);
    }
    
    public static function getPassword() {
        return self::getParam(self::$PASSWORD);
    }
    
    public static function existUser() {
        return self::existParam(self::$USERNAME);
    }
    
    public static function existPassword() {
        return self::existParam(self::$PASSWORD);
    }
}

?>
