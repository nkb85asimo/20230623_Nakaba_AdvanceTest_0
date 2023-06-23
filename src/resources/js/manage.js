var elem = document.getElementById("js-cursor");

elem.addEventListener(
    "mouseover", function (event) {
        event.target.style.backgroundColor = "orange";
        setTimeout(function () {
            event.target.style.backgroundColor = "";
        }, 500);
    }, false
);
