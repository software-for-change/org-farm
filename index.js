var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function scrollFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

function on() {
    await sleep(2000);
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}