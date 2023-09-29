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

            if(isSet($_POST["wyloguj"])) {
                $_SESSION["zalogowany"] = 0;
            }
            echo "<h1>Nasz system</h1>";
        ?>
        <form action="logowanie.php" method="POST">
            <fieldset>
                <legend>Logowanie</legend>
                <label for="login">Login:</label>    
                <input type="text" name="login"><br><br>
                <label for="haslo">Hasło:</login>
                <input type="password" name="haslo"><br><br>
                <input type="submit" name="zaloguj" value="Zaloguj">
            </fieldset>
        </form>

        <br>
        <form action="cookie.php" method="GET">
            <fieldset>
                <legend>Tworzenie ciasteczka</legend>
                <label for="czas">Czas:</label>
                <input type="number" name="czas"><br><br>
                <?php
                    if(isSet($_COOKIE["firstCookie"])) {
                        $value = $_COOKIE["firstCookie"];
                        echo "Wartość ciasteczka: " . $value . "<br><br>";
                    }
                ?>
                <input type="submit" name="utworzCookie" value="Wyślij">
            </fieldset>
        </form>       
    </body>
</html>