<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            require("funkcje.php");

            if(isSet($_GET["utworzCookie"])) {
                $cookieTime = $_GET["czas"];
                $cookieValue = "działam";
                setcookie("firstCookie", $cookieValue, time() + $cookieTime, "/");
                echo "Ciasteczko dodane pomyślnie<br><br>";
            }
        ?>
        <a href="index.php">Wstecz</a>
    </body>
</html>