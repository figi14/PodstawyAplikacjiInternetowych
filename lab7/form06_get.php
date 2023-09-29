<?php session_start(); ?>
<?php
    if(isSet($_SESSION["success"]) 
        && isSet($_SESSION["s_flag"])
        && $_SESSION["s_flag"] == 1) 
    {
        $_SESSION["s_flag"] = 0;
        echo "<br>" . $_SESSION["success"] . "<br><br>";
    }

    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM pracownicy";
    $result = $link->query($sql);
    foreach ($result as $v) {
        echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
    }
    $result->free();
    $link->close();

    echo "<br><a href=\"form06_post.php\">Dodaj pracownika</a>"
?>