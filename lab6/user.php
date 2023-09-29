<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            require_once("funkcje.php");

            if(isSet($_SESSION["zalogowany"]) and $_SESSION["zalogowany"] == 1) {
                $imieNazwisko = $_SESSION["zalogowanyImie"];
                echo $imieNazwisko;
            }
            else {
                header("Location: index.php");
            }

            if(isSet($_POST["sendfoto"])) {
                $currentDir = getcwd();
                $uploadDirectory = "\photos\\";
                $fileName = $_FILES["myfile"]["name"];
                $fileSize = $_FILES["myfile"]["size"];
                $fileTmpName = $_FILES["myfile"]["tmp_name"];
                $fileType = $_FILES["myfile"]["type"];
                if($fileName != "" and
                    ($fileType == "image/png" or $fileType == "image/jpeg"
                    or $fileType == "image/JPEG" or $fileType == "image/PNG"
                ))
                {
                    $uploadPath = $currentDir . $uploadDirectory . $fileName;
                    if(move_uploaded_file($fileTmpName, $uploadPath))
                        echo "</br></br>Zdjęcie zostało załadowane na serwer FTP";
                }
            }
        ?>
        
        <hr>
        <form action="user.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Wybór obrazu do wyświetlenia na stronie</legend>
                <input type="file" name="myfile"><br><br>
                <input type="submit" name="sendfoto" value="Wyślij">
            </fieldset>
        </form>
        
        <br>
        <img style="width: 300px; height: 300px;" src="photos/mountains.jpg"
        alt="obraz przedstawiajacy gory">
        <hr>
        <form action="index.php" method="POST">
            <input type="submit" name="wyloguj" value="Wyloguj">
        </form>



    </body>
</html>