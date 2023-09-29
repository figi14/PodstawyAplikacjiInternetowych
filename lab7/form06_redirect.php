<?php session_start(); ?>
<?php
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko'])) 
    {
        $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
        try {
            $result = $stmt->execute();
        }catch(mysqli_sql_exception $e) {
            $error = mysqli_error($link);
            $stmt->close();
            $link->close();
            $_SESSION["fail"] = "Podczas dodawania pracownika wystąpił błąd: $error";
            $_SESSION["f_flag"] = 1;
            header("Location: form06_post.php");    
        }
        $stmt->close();
    }
    $link->close();
    $_SESSION["success"] = "Pomyślnie dodano pracownika.";
    $_SESSION["s_flag"] = 1;
    header("Location: form06_get.php");
?>