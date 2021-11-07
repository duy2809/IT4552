<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <?php

        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $class = $_POST["class"];
        $university = $_POST["university"];
        $hobbies = $_POST["hobby"];
        $arrlength = count($hobbies);

        echo "<div>";
        echo "<h1>Hello, $name</h1>";
        echo "<h2>Your gender is $gender</h2>";
        echo "<h2>You are studying at $class, $university</h2>";
        echo "<h2>Your hobby is: <h2>";
        for ($i = 0; $i < $arrlength; $i++) {
            echo "<h3>";
            echo $i+1;
            echo ". $hobbies[$i]</h3>";
        }
        echo "</div>";

        ?>
    </div>
</body>
</html>

