<?php
$home = "https://box.lolis.love/0/";

$local = file_get_contents('./content/db/song.json');
$lode = json_decode($local);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LolisBox Player</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="./content/svg/play.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
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
                    echo "<a href='/engine.php?id=" . $lode->link_id . "'>";
                    echo "<button type='button' class='btn btn-success'>";
                    echo $lode->id . ". " . "[" . $lode->album . "] " . $lode->artist . " - " . $lode->song;
                    echo "</button>";
                    echo "</a>";
                }
                echo "<br>";
                echo "<br>";
            }
            ?>
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
                <div class="col-md-2 col-sm-12 detailed" style="text-align: center;">
                    <a class="song-name" style="text-align: center; width: 100%;">
                        Nothing Playing Now..
                    </a>
                    <div class="col-sm-12 col-md-0">
                        &nbsp;
                    </div>
                </div>
                <div class="col-md-2 col-sm-12" style="text-align: center;">
                    <button id="back" onclick="back()">
                        <img src="content/svg/back.svg" alt="back">
                    </button>
                    <button id="play" class="" onclick="play()">
                        <img src="content/svg/play.svg" alt="back" onclick="play()">
                    </button>
                    <button id="pause" class="hidden" onclick="pause()">
                        <img src="content/svg/pause.svg" alt="back" onclick="pause()">
                    </button>
                    <button id="next" onclick="next()">
                        <img src="content/svg/next.svg" alt="back">
                    </button>
                </div>
                <div class="col-md-5 col-sm-12 dur-h">
                    <progress id="dur" value="0" max="100" width="100%"></progress>
                </div>
                <div class="col-md-3 col-sm-12" style="text-align: center;">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>