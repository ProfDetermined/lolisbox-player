<?php
    $home = "https://box.lolis.love/0/";
    $id = $_GET['id'];
    $link = $home.$id;
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
            echo "<audio controls autoplay>";
            echo "<source src = '" . $link . "' type='audio/wav'>";
            echo "</audio>";
        }

        $meta = "/meta";
        $a = $link.$meta;
        $api = file_get_contents($a);
        $call = json_decode($api, true);

        echo "<h3>";
        echo $call['globalMeta']['originFilename'];
        echo "</h3>";
    ?>   

    <div class="fixed_ft">

    </div>
    <script src="js/play.js"></script>
</body>

</html>