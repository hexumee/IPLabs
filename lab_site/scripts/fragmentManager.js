//////////////
// Анимации //
//////////////
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

////////////////////////////
// Управление фрагментами //
////////////////////////////
function setFragment(frag) {
    fadeOutAlt(parent.document.getElementById("viewport"));
    setTimeout(() => {
        parent.document.getElementById("rootView").id = "rvTrashed";
        let frame = parent.document.createElement("iframe");
        frame.id = "rootView";
        frame.src = frag === "game" ? `fragments/${frag}.php` : `fragments/${frag}.html`;
        parent.document.getElementById("viewport").appendChild(frame);
    }, 300);
    setTimeout(() => {
        fadeInAlt(parent.document.getElementById("viewport"));
        parent.document.getElementById("viewport").removeChild(parent.document.getElementById("rvTrashed"));
    }, 300);
}

///////////////
// Фрагменты //
///////////////
function setHomeContent() {
    setTimeout(() => {
        setFragment("home");
    }, 300);
}

function setDoneContent() {
    setTimeout(() => {
        setFragment("done");
    }, 300);
}

function setPhotosContent() {
    setTimeout(() => {
        setFragment("photos");
    }, 300);
}

function setAboutContent() {
    setTimeout(() => {
        setFragment("about");
    }, 300);
}

function setContactsContent() {
    setTimeout(() => {
        setFragment("contacts");
    }, 300);
}

function setGameContent() {
    setTimeout(() => {
        setFragment("game");
    }, 300);
}

function callModal() {
    let modal = document.createElement("iframe");
    modal.src = "fragments/modal.php";
    modal.id = "lrm";
    modal.setAttribute("style", "width: 100%; height: 100%; position: fixed; z-index: 1000; border: 0; margin: auto auto; transition: opacity 200ms");
    modal.style.opacity = "0";
    setTimeout(() => {
        document.body.insertBefore(modal, document.querySelector(".header"));
    }, 200);
    setTimeout(() => {
        modal.style.opacity = "1";
    }, 200);
}
