<?php
$home = "https://box.lolis.love/0/";
$id = $_GET['id'];
$link = $home . $id;
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
        echo "<audio controls id='mplay'>";
        // autoplay
        echo "<source src = '" . $link . "' type='audio/wav'>";
        echo "</audio>";
    }
    ?>

    <div class="fixed_ft">
        <p class="song-name">
            <?php
                $meta = "/meta";
                $a = $link . $meta;
                $api = file_get_contents($a);
                $call = json_decode($api, true);

                echo $call['globalMeta']['originFilename'];
            ?>
        </p>

        <button id="back">
            <img src="content/svg/back.svg" alt="back">
        </button>
        <button id="play" onclick="play()">
            <img src="content/svg/play.svg" alt="back" onclick="play()">
        </button>
        <button id="pause" onclick="pause()">
            <img src="content/svg/pause.svg" alt="back" onclick="pause()">
        </button>
        <button id="next">
            <img src="content/svg/next.svg" alt="back">
        </button>
    </div>
    <script src="./content/js/play.js"></script>
</body>

</html>