// var header = document.getElementById("myHeader");
// var sticky = header.offsetTop;

// function scrollFunction() {
//     if (window.pageYOffset > sticky) {
//         header.classList.add("sticky");
//     } else {
//         header.classList.remove("sticky");
//     }
// }

// this code controls the display of the promotion registration page
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

// the first 2 functions control the open and close for the overlay for the nav for the mobile naviagtion
function openNav() {
    document.getElementById("mySidepanel").style.width = "300px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}