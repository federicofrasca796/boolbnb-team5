window.onscroll = function () { scrollFunction() };


function scrollFunction() {
    if (document.body.scrollTop > 75 || document.documentElement.scrollTop > 80) {
        document.getElementById("logo").style.justifyContent = "start";
    } else {
        document.getElementById("logo").style.justifyContent = "end";
    }
}

