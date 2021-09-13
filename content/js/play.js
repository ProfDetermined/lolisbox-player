const pl = document.getElementById("mplay");
const plb = document.getElementById("play");
const pab = document.getElementById("pause");

const dur = document.getElementById("dur");

function play() {
    pl.play();
    plb.classList.add("hidden");
    pab.classList.remove("hidden");
}

function pause() {
    pl.pause();
    plb.classList.remove("hidden");
    pab.classList.add("hidden");
}

pl.addEventListener("playing", play);
pl.addEventListener("pause", pause);

function back() {
    pl.currentTime = pl.currentTime - 5;
}

function next() {
    pl.currentTime = pl.currentTime + 5;
}

pl.ontimeupdate = function () {
    var percentage = (pl.currentTime / pl.duration) * 100;
    dur.value = percentage
};

function pvol() {
    pl.volume = pl.volume + 0.1;
}

function dvol() {
    pl.volume = pl.volume - 0.1;
}

function mute() {
    pl.muted = true;
    document.getElementById("mute").classList.add("hidden");
    document.getElementById("unmute").classList.remove("hidden");
}

function unmute() {
    pl.muted = false;
    document.getElementById("unmute").classList.add("hidden");
    document.getElementById("mute").classList.remove("hidden");
}

function pptoggle() {
    if (pl.paused == false) {
        pl.pause();
    } else if (pl.paused == true) {
        pl.play();
    }
}

function ltoggle() {
    if (pl.loop == true) {
        pl.loop = false;
        document.getElementById("loop").classList.add("hidden");
        document.getElementById("unloop").classList.remove("hidden");
    } else if (pl.loop == false) {
        pl.loop = true;
        document.getElementById("loop").classList.remove("hidden");
        document.getElementById("unloop").classList.add("hidden");
    }
}

function piptog() {
    if (document.pictureInPictureElement) {
        document.exitPictureInPicture();
    } else {
        if (document.pictureInPictureEnabled) {
            pl.requestPictureInPicture();
        }
    }
}