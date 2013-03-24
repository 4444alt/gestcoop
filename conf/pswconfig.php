<?php

/**
 * PHP Class to Handle Password
 *
 * @author Andrea
 */
class PswConfig {
    
    //Salting tokens for passwords
    private static $PRESALT = "K5rT3";
    private static $POSTSALT = "Ty0wF";
    
    public static function encryptPassword($pass) {
        return sha1(self::$PRESALT . $pass . self::$POSTSALT);
    }
}

?>
