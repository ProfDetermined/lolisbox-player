<?php
error_reporting(0);
ini_set('display_errors', 0);

$home = "https://box.lolis.love/0/";

$in = $_GET['id'];

// testing row
// echo substr($in, 25);

if (substr($in, 0, 19) == "https://lolis.love/") {
    $id = substr($in, 19);
    echo "<script>console.log('" . $id . "')</script>";
} else if (substr($in, 0, 25) == "https://box.loli.love/") {
    $id = substr($in, 25);
    echo "<script>console.log('" . $id . "')</script>";
} else if (substr($in, 0, 26) == "https://file.lolis.love/") {
    $id = substr($in, 26);
    echo "<script>console.log('" . $id . "')</script>";
} else {
    $id = $in;
    echo "<script>console.log('" . $id . "')</script>";
}

$link = $home . $id;

$meta = "/meta";
$a = $link . $meta;
$api = file_get_contents($a);
$call = json_decode($api, true);

$local = file_get_contents('./content/db/song.json');
$lode = json_decode($local);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $call['fileMeta']['originFilename']; ?> | LolisBox Player</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="./content/svg/play.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    if (substr($link, -3) == "wav") {
        echo "<audio controls autoplay id='mplay' class='hidden'>";
        // autoplay
        echo "<source src = '" . $link . "' type='audio/wav'>";
        echo "</audio>";
    } else if (substr($link, -3) == "mp3") {
        echo "<audio controls autoplay id='mplay' class='hidden'>";
        // autoplay
        echo "<source src = '" . $link . "' type='audio/mp3'>";
        echo "</audio>";
    } else if (substr($link, -13) == "videoplayback") {
        echo "<center style='padding: 1rem; padding-bottom: 0; padding-top: 0;'>";
        echo "<video autoplay id='mplay' onclick='pptoggle()'>";
        echo "<source src='" . $link . "' type='video/mp4'>";
        echo "</video>";
        echo "</center>";
    } else if (substr($link, -3) == "mp4") {
        echo "<center style='padding: 1rem; padding-bottom: 0; padding-top: 0;'>";
        echo "<video autoplay id='mplay' onclick='pptoggle()'>";
        echo "<source src='" . $link . "' type='video/mp4'>";
        echo "</video>";
        echo "</center>";
    }
    ?>

    <div class="music" id="mcon">
        <center>
            <form action="engine.php" class="enterl container" method="GET">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8" style="text-align: center;">
                        <input type="text" placeholder="Enter Link/ID From lolis.love" class="formc" name="id">
                        <button type="submit" class="btn btn-primary">
                            Go!!
                        </button>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
            <br>
            <?php
            foreach ($lode as $lode) {
                if ($lode->link_id == " ") {
                    echo "<button type='button' class='btn btn-secondary'>";
                    echo $lode->id . ". " . "[" . $lode->album . "] " . $lode->artist . " - " . $lode->song;
                    echo "</button>";
                } else {
                    echo "<a href='?id=" . $lode->link_id . "'>";
                    echo "<button type='button' class='btn btn-success'>";
                    echo $lode->id . ". " . "[" . $lode->album . "] " . $lode->artist . " - " . $lode->song;
                    echo "</button>";
                    echo "</a>";
                }
                echo "<br>";
                echo "<br>";
            }
            ?>
            <br><br><br><br>
        </center>
    </div>

    <div class="fixed_ft">
        <div class="stat">
            <span id="playStat" class="btn btn-success">
                Nothing Playing..
            </span>
            <span class="space">
                &nbsp;&nbsp;
            </span>
            <span id="loopStat" class="btn btn-warning">
                Loop : Off
            </span>
            <span>
                &nbsp;&nbsp;
            </span>
            <span class="btn btn-info">
                <span id="curDur">
                    xx:xx
                </span>
                <span>
                    &nbsp;/&nbsp;
                </span>
                <span id="vidDur">
                    xx:xx
                </span>
            </span>
            <span>
                &nbsp;&nbsp;
            </span>
            <span id="volVal" class="btn btn-secondary">
                Vol : 10
            </span>
            <span>
                &nbsp;&nbsp;
            </span>
            <span id="pip" class="btn btn-danger">
                PiP : Off
            </span>
        </div>
        <br>
        <div class="container">
            <div class="row" style="top: 50%;">
                <div class="col-lg-2 col-md-12 detailed" style="text-align: center;">
                    <a class="song-name" style="text-align: center;">
                        <?php
                        echo $call['fileMeta']['originFilename'];
                        ?>
                    </a>
                </div>
                <div class="col-lg-3 col-md-12" style="text-align: center;">
                    <?php
                    if (substr($link, -3) == "wav") {
                        echo "<button id='no-pip'>";
                        echo "<img src='content/svg/pipdis.svg' alt='no-pip'>";
                        echo "</button>";
                    } else if (substr($link, -3) == "mp3") {
                        echo "<button id='no-pip'>";
                        echo "<img src='content/svg/pipdis.svg' alt='no-pip'>";
                        echo "</button>";
                    } else if (substr($link, -13) == "videoplayback") {
                        echo "<button id='pip-en' onclick='piptog()'>";
                        echo "<img src='content/svg/pipen.svg' alt='pip'>";
                        echo "</button>";
                        echo "<button id='pip-dis' onclick='piptog()' class='hidden'>";
                        echo "<img src='content/svg/pipdis.svg' alt='pip'>";
                        echo "</button>";
                    } else if (substr($link, -3) == "mp4") {
                    }
                    ?>
                    <button id="back" onclick="back()">
                        <img src="content/svg/back.svg" alt="back">
                    </button>
                    <button id="play" class="" onclick="play()">
                        <img src="content/svg/play.svg" alt="play" onclick="play()">
                    </button>
                    <button id="pause" class="hidden" onclick="pause()">
                        <img src="content/svg/pause.svg" alt="pause" onclick="pause()">
                    </button>
                    <button id="next" onclick="next()">
                        <img src="content/svg/next.svg" alt="next">
                    </button>
                    <button id="loop" onclick="ltoggle()" class="hidden">
                        <img src="content/svg/loop.svg" alt="loop">
                    </button>
                    <button id="unloop" onclick="ltoggle()">
                        <img src="content/svg/unloop.svg" alt="unloop">
                    </button>
                </div>
                <div class="col-lg-4 col-md-12 dur-h">
                    <progress id="dur" value="0" max="100" width="100%"></progress>
                </div>
                <div class="col-lg-3 col-md-12" style="text-align: center;">
                    <button id="volup" onclick="dvol()">
                        <img src="content/svg/volumed.svg" alt="vold">
                    </button>
                    <i>&nbsp;&nbsp;</i>
                    <button id="mute" onclick="mute()">
                        <img src="content/svg/mute.svg" alt="mute">
                    </button>
                    <button id="unmute" onclick="unmute()" class="hidden">
                        <img src="content/svg/mute.svg" alt="mute">
                    </button>
                    <i>&nbsp;&nbsp;</i>
                    <button id="vol-d" onclick="pvol()">
                        <img src="content/svg/volumeu.svg" alt="volu">
                    </button>
                </div>
            </div>
        </div>
        <br>
    </div>
    <script src="./content/js/play.js"></script>
    <script>
        if ('mediaSession' in navigator) {
            navigator.mediaSession.metadata = new MediaMetadata({
                title: '<?php echo $call['fileMeta']['originFilename']; ?>',
                artist: 'LolisBox Player for lolis.love',
                album: 'LolisBox Player for lolis.love',
                artwork: [{
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=96&height=96',
                        sizes: '96x96',
                        type: 'image/png'
                    },
                    {
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=128&height=128',
                        sizes: '128x128',
                        type: 'image/png'
                    },
                    {
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=192&height=192',
                        sizes: '192x192',
                        type: 'image/png'
                    },
                    {
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=256&height=256',
                        sizes: '256x256',
                        type: 'image/png'
                    },
                    {
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=384&height=384',
                        sizes: '384x384',
                        type: 'image/png'
                    },
                    {
                        src: 'https://media.discordapp.net/attachments/727389255139328143/886840254626160710/01zgghf1c4z31.png?width=512&height=512',
                        sizes: '512x512',
                        type: 'image/png'
                    },
                ]
            });

            navigator.mediaSession.setActionHandler('play', function() {
                pl.play();
            });
            navigator.mediaSession.setActionHandler('pause', function() {
                pl.pause();
            });
            navigator.mediaSession.setActionHandler('stop', function() {
                pl.pause();
                pl.currentTime = 0;
            });
            navigator.mediaSession.setActionHandler('seekbackward', function() {
                pl.currentTime = pl.currentTime - 5;
            });
            navigator.mediaSession.setActionHandler('seekforward', function() {
                pl.currentTime = pl.currentTime + 5;
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>