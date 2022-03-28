//////////////
// Анимации //
//////////////
function fadeOut(elem) {
    elem.style.opacity = "1";
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = "0";
    setTimeout(() => {
        elem.style.display = "none";
    }, 200);
}

function fadeIn(elem) {
    elem.style.opacity = "0";
    elem.style.display = "block";
    elem.style.transition = "opacity 200ms";
    setTimeout(() => {
        elem.style.opacity = "1";
    }, 200);
}

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

function animateToHeader(dest) {
    parent.document.getElementById("currentPage").style.animation = "navSlideRight 500ms 1 alternate";
    fadeOut(parent.document.getElementById("currentPage"));
    setTimeout(() => {
        parent.document.getElementById("currentPage").innerText = dest;
        parent.document.getElementById("currentPage").style.animation = "navAlign 500ms 1 alternate";
    }, 500);
    setTimeout(() => {
        fadeIn(parent.document.getElementById("navGraphBack"));
    }, 300);
    setTimeout(() => {
        fadeIn(parent.document.getElementById("currentPage"));
    }, 300);
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
        frame.src = `fragments/${frag}.html`;
        parent.document.getElementById("viewport").appendChild(frame);
    }, 300);
    setTimeout(() => {
        fadeInAlt(parent.document.getElementById("viewport"));
        parent.document.getElementById("viewport").removeChild(parent.document.getElementById("rvTrashed"));
    }, 300);
}

function navGoBack() {
    document.getElementById("currentPage").style.animation = "navSlideLeft 500ms 1 alternate";
    fadeOut(document.getElementById("navGraphBack"));
    fadeOut(document.getElementById("currentPage"));
    setTimeout(() => {
        document.getElementById("currentPage").innerText = "Главная";
    }, 500);
    setTimeout(() => {
        document.getElementById("currentPage").style.animation = "navAlign 500ms 1 alternate";
        fadeIn(document.getElementById("currentPage"));
    }, 300);
    setFragment("home");
}

///////////////
// Фрагменты //
///////////////
function setDoneContent() {
    animateToHeader("Выполненные работы");
    setTimeout(() => {
        setFragment("done");
    }, 300);
}

function setPhotosContent() {
    animateToHeader("Фотогалерея");
    setTimeout(() => {
        setFragment("photos");
    }, 300);
}

function setAboutContent() {
    animateToHeader("О себе");
    setTimeout(() => {
        setFragment("about");
    }, 300);
}

function setContactsContent() {
    animateToHeader("Контакты");
    setTimeout(() => {
        setFragment("contacts");
    }, 300);
}

function setGameContent() {
    animateToHeader("Игра");
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
