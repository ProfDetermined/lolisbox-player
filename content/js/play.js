const pl = document.getElementById("mplay")
const plb = document.getElementById("play")
const pab = document.getElementById("pause")

const dur = document.getElementById("dur")

const pStat = document.getElementById('playStat')
const cDur = document.getElementById('curDur')
const fDur = document.getElementById('vidDur')
const lStat = document.getElementById('loopStat')
const vStat = document.getElementById('volVal')
const pipS = document.getElementById('pip')

function play() {
    pl.play()
    pStat.innerHTML = "Play"
    plb.classList.add("hidden")
    pab.classList.remove("hidden")
}

function pause() {
    pl.pause()
    pStat.innerHTML = "Pause"
    plb.classList.remove("hidden")
    pab.classList.add("hidden")
}

pl.addEventListener("playing", play)
pl.addEventListener("pause", pause)

function back() {
    pl.currentTime = pl.currentTime - 5
}

function next() {
    pl.currentTime = pl.currentTime + 5
}

pl.ontimeupdate = function () {
    var percentage = (pl.currentTime / pl.duration) * 100
    dur.value = percentage

    var i = setInterval(function () {
        if (pl.readyState > 0) {
            var fmin = parseInt(pl.duration / 60, 10)
            var fsec = parseInt(pl.duration % 60, 10)

            if (fmin < 10) {
                fmin = "0" + fmin
            }

            if (fsec < 10) {
                fsec = "0" + fsec
            }

            fDur.innerHTML = fmin + ":" + fsec

            clearInterval(i)
        }
    }, 200)

    var n = setInterval(function () {
        if (pl.readyState > 0) {
            var cmin = parseInt(pl.currentTime / 60, 10)
            var csec = parseInt(pl.currentTime % 60, 10)

            if (cmin < 10) {
                cmin = "0" + cmin
            }

            if (csec < 10) {
                csec = "0" + csec
            }

            cDur.innerHTML = cmin + ":" + csec

            clearInterval(n)
        }
    }, 200)
}

function pvol() {
    pl.volume = pl.volume + 0.1
    vol = Math.floor(pl.volume * 10)
    cvol = parseInt(vol)
    vStat.innerHTML = "Vol : " + cvol
}

function dvol() {
    pl.volume = pl.volume - 0.1
    vol = Math.floor(pl.volume * 10)
    cvol = parseInt(vol)
    vStat.innerHTML = "Vol : " + vol
}

function mute() {
    pl.muted = true
    vol = Math.floor(pl.volume * 10)
    cvol = parseInt(vol)
    vStat.innerHTML = "Vol : " + vol
    document.getElementById("mute").classList.add("hidden")
    document.getElementById("unmute").classList.remove("hidden")
}

function unmute() {
    pl.muted = false
    vol = Math.floor(pl.volume * 10)
    cvol = parseInt(vol)
    vStat.innerHTML = "Vol : " + vol
    document.getElementById("unmute").classList.add("hidden")
    document.getElementById("mute").classList.remove("hidden")
}

function pptoggle() {
    if (pl.paused == false) {
        pl.pause()
    } else if (pl.paused == true) {
        pl.play()
    }
}

function ltoggle() {
    if (pl.loop == true) {
        pl.loop = false
        lStat.innerHTML = "Loop : Off"
        document.getElementById("loop").classList.add("hidden")
        document.getElementById("unloop").classList.remove("hidden")
    } else if (pl.loop == false) {
        pl.loop = true
        lStat.innerHTML = "Loop : On"
        document.getElementById("loop").classList.remove("hidden")
        document.getElementById("unloop").classList.add("hidden")
    }
}

function piptog() {
    if (document.pictureInPictureElement) {
        pipS.innerHTML = "PiP : Off"
        document.exitPictureInPicture()
    } else {
        if (document.pictureInPictureEnabled) {
            pipS.innerHTML = "PiP : On"
            pl.requestPictureInPicture()
        }
    }
}

function fscreen() {
    if (pl.requestFullscreen) {
        pl.requestFullscreen();
    } else if (pl.webkitRequestFullscreen) { /* Safari */
        pl.webkitRequestFullscreen();
    } else if (pl.msRequestFullscreen) { /* IE11 */
        pl.msRequestFullscreen();
    }
}
