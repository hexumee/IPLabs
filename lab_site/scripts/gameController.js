function fadeOutAlt(elem) {
    elem.style.opacity = "1";
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = "0";
}

function fadeInAlt(elem) {
    elem.style.opacity = "0";
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = "1";
}

function fireItUp() {
    fadeOutAlt(document.querySelector("#gameFrame"));

    setTimeout(() => {
        document.querySelector("#gameFrame").style.display = "none";
        callGameFrame();
    }, 200);
}

function callGameFrame() {
    let gameFrame = document.createElement("iframe");
    gameFrame.src = "/fragments/snake.html";
    gameFrame.setAttribute("style", "width: 100%; height: 100%; border: 0; transition: opacity 200ms");
    gameFrame.style.opacity = "0";

    setTimeout(() => {
        document.body.appendChild(gameFrame);
    }, 200);
    setTimeout(() => {
        gameFrame.style.opacity = "1";
        gameFrame.focus();
    }, 200);
}

function loadHighscores() {
    fadeOutAlt(document.querySelector("#gameFrame"));

    setTimeout(() => {
        document.querySelector("#gameFrame").style.display = "none";

        let tableFrame = document.createElement("iframe");
        tableFrame.src = "/fragments/highscores.php";
        tableFrame.id = "hs";
        tableFrame.setAttribute("style", "width: 100%; height: 100%; border: 0; transition: opacity 200ms");
        tableFrame.style.opacity = "0";
        setTimeout(() => {
            document.body.appendChild(tableFrame);
        }, 200);
        setTimeout(() => {
            tableFrame.style.opacity = "1";
            tableFrame.focus();
        }, 200);
    }, 200);
}

function goToMainScreen() {
    fadeOutAlt(parent.document.getElementById("hs"));

    setTimeout(() => {
        parent.document.getElementById("hs").id = "hsTrashed";
    }, 300);
    setTimeout(() => {
        parent.document.querySelector("#gameFrame").style.display = "block";
        fadeInAlt(parent.document.querySelector("#gameFrame"));
        parent.document.body.removeChild(parent.document.getElementById("hsTrashed"));
    }, 300);
}

function callModal() {
    let modal = document.createElement("iframe");
    modal.src = "fragments/modal.php";
    modal.id = "lrm";
    modal.setAttribute("style", "width: 100%; height: 100%; position: fixed; z-index: 1000; border: 0; margin: auto auto; transition: opacity 200ms");
    modal.style.opacity = "0";

    setTimeout(() => {
        parent.document.body.insertBefore(modal, document.querySelector(".header"));
    }, 200);
    setTimeout(() => {
        modal.style.opacity = "1";
    }, 200);
}
