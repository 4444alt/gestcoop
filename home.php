<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '/manager/sessmanager.php';
            SM::startSession();
            echo "Autenticato!" . "<br>";
            echo SM::getUser() . "<br>";
            echo SM::getPassword() . "<br>";
        ?>
    </body>
</html>
