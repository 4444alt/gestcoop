<?php
require_once '/manager/dbmanager.php';
require_once '/manager/sessmanager.php';
require_once '/conf/pswconfig.php';
/**
 * Authentication Manager
 *
 * @author Andrea
 */
class AuthManager {
    
    /**
     * Check if credetials are ok
     * @param String $user
     * @param String $pass
     * @return Boolean TRUE if user exist, FALSE otherwise
     */
    public static function checkUser($user,$pass) {
        $db = new DBManager;
        $user = $db->escapeString($user);
        $pass = PswConfig::encryptPassword($pass);
        $db->query(QM::queryAuthentication($user, $pass));
        return $db->existRow();
    }
    
    /**
     * Check if the client is already authenticated,
     * checking the $_SESSION parameters.
     * @return boolean TRUE for authenticated user, FALSE otherwise
     */
    public static function checkAuthentication() {
        if(SM::existUser() and SM::existPassword())
            return self::checkSessionUser();
        return FALSE;
    }
    
    /**
     * Register the user Authentication
     */
    public static function registerAuthentication($user,$pass) {
        SM::setUser($user);
        SM::setPassword(PswConfig::encryptPassword($pass));
    }
    
    private static function checkSessionUser(){
        $db = new DBManager;
        $user = $db->escapeString(SM::getUser());
        $pass = $db->escapeString(SM::getPassword());
        $db->query(QM::queryAuthentication($user, $pass));
        return $db->existRow();
    }
    
    public static function continueIfAuthenticated() {
        SM::startSession();
        if(!self::checkAuthentication())
            header('Location: index.php');
    }
}
?>
