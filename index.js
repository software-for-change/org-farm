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
// remebere to use display none for the topnav and block for mobile nav in css in order for it to show.
function openNav() {
    document.getElementById("mySidepanel").style.width = "300px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}



function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}