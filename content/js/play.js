const pl = document.getElementById("mplay");
const plb = document.getElementById("play");
const pab = document.getElementById("pause");
const nxt = document.getElementById("next");
const prv = document.getElementById("back");

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