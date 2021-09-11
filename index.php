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
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
        if (substr($link, -3) == "wav") {
            echo "<audio controls id='playr'>";
            echo "<source src = '" . $link . "' type='audio/wav'>";
            echo "</audio>";
        }

        if ($link == "https://box.lolis.love/*") {
            $api = $link + 'meta';
            $call = json_decode($api,true);

            echo "<h1>";
            echo $call;
            echo "</h1>";
        }
    ?>

    
</body>

</html>