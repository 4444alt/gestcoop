<html>
<?php
require_once 'manager/authmanager.php';

SM::startSession();

if(AuthManager::checkAuthentication())
    header('Location: home.php');

if(!isset($_POST['username']) and !isset($_POST['password'])){
?>
<head>
    <title>Creativ</title>
    <link href="public_html/css/login.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <form id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <img src="public_html/images/logoCreativ.png">
	<fieldset id="inputs">
            <input id="username" name="username" type="text" placeholder="Username" autofocus required>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" value="Collegati">
        </fieldset>
    </form>
</body>
</html>
<?php
} else {
    if(AuthManager::checkUser($_POST['username'], $_POST['password'])){
        AuthManager::registerAuthentication($_POST['username'], $_POST['password']);
        header('Location: home.php');
    }else{
        //reload current page
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
?>
