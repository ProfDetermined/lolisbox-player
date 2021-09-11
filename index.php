<?php

    $link = $_GET['link'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastPlayer5 | Detzz</title>
</head>
<body>
    <?php
        if (substr($link, -3) == "wav") {
            echo "<audio controls>";
            echo "<source src = '".$link."' type='audio/wav'>";
            echo "</audio>";
        }
    ?>
</body>
</html>