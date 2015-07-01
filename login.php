<?php

    session_set_cookie_params("328000"); // Set seconds before cookie expires.
    session_start();

    $config_url = parse_ini_file('config.ini');
    $config = parse_ini_file($config_url['config_url']);

    $password = $config['login_pw'];

    function printForm($form_title)
    {
        $action = $_SERVER["PHP_SELF"];

print <<<END
<html>
<head><title>$form_title</title></head>
<body>
<h1>$form_title</h1>
<form action="$action" method="post">
<p><input type="password" name="pass" value="" />
<input type="submit" value="Login" /></p>
</form>
</body>
</html>
END;
    }

    if(isset($_POST['pass']))
    {
        if($_POST['pass'] == $password)
        {
        // Successfully logged in.
        // Continue to page content.
        $_SESSION['LOGIN']="ADMIN";
        }
        else
        {
        // Wrong password submitted.
        printForm('Wrong password');
        exit();
        }
    }
    else if(isset($_GET['logout']))
    {
    unset($_SESSION['LOGIN']);
    session_destroy();
    printForm('Logged Out');
    exit();
    }
    else if(isset($_SESSION['LOGIN']))
    {
    // Cookie already set login not required.
    // Continue to page content.
    }
    else
    {
    printForm('Please login');
    exit();
    }

?>
