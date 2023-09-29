<?php session_start(); ?>
<?php
    if(isSet($_SESSION["fail"])
        && isSet($_SESSION["f_flag"])
        && $_SESSION["f_flag"] == 1) 
    {
        $_SESSION["f_flag"] = 0;
        echo "<br>" . $_SESSION["fail"] . "<br><br>";
    }
    
    print<<<KONIEC
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <body>
            <form action="form06_redirect.php" method="POST">
                id_prac <input type="text" name="id_prac">
                nazwisko <input type="text" name="nazwisko">
                <input type="submit" value="Wstaw">
                <input type="reset" value="Wyczysc">
            </form>
            <br><a href="form06_get.php">Lista pracowników</a>
    KONIEC;
?>