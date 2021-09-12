const pl = document.getElementById("mplay");
const plb = document.getElementById("play");
const pab = document.getElementById("pause");
const nxt = document.getElementById("next");
const prv = document.getElementById("back");

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

pl.addEventListener("play", play);
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