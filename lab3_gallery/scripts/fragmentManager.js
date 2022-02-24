//////////////
// Анимации //
//////////////
function fadeOut(elem) {
    elem.style.opacity = 1;
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = 0;
    setTimeout(() => {
        elem.style.display = "none";
    }, 200);
}

function fadeIn(elem) {
    elem.style.opacity = 0;
    elem.style.display = "block";
    elem.style.transition = "opacity 200ms";
    setTimeout(() => {
        elem.style.opacity = 1;
    }, 200);
}

function animateTo(dest) {
    fadeOut(document.getElementById("viewport"));
    setTimeout(() => {
        document.getElementById("rootView").setAttribute("src", `fragments/${dest}.html`);
    }, 200);
    setTimeout(() => {
        fadeIn(document.getElementById("viewport"));
    }, 200);
}


///////////////
// Фрагменты //
///////////////
function prepareHomeFragment() {
    document.getElementById("home").setAttribute("class", "active");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    document.getElementById("rootView").setAttribute("src", "fragments/home.html");
}

function setHomeFragment() {
    document.getElementById("home").setAttribute("class", "active");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    animateTo("home");
}

function setDoneContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").setAttribute("class", "active");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    animateTo("done");
}

function setPhotosContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").setAttribute("class", "active");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    animateTo("photos");
}

function setAboutContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").setAttribute("class", "active");
    document.getElementById("contacts").removeAttribute("class");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    animateTo("about");
}

function setContactsContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").setAttribute("class", "active");
    /*document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").removeAttribute("class");*/
    animateTo("contacts");
}

/*function setMemberWallContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    document.getElementById("member_wall").setAttribute("class", "active");
    document.getElementById("game").removeAttribute("class");
    animateTo("member_wall");
}

function setGameContent() {
    document.getElementById("home").removeAttribute("class");
    document.getElementById("done").removeAttribute("class");
    document.getElementById("photos").removeAttribute("class");
    document.getElementById("about").removeAttribute("class");
    document.getElementById("contacts").removeAttribute("class");
    document.getElementById("member_wall").removeAttribute("class");
    document.getElementById("game").setAttribute("class", "active");
    animateTo("game");
}*/


///////////////////////
// Обработка событий //
///////////////////////
window.addEventListener("load", prepareHomeFragment);
