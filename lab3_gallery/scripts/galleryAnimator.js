///////////////////////////
// Объявление переменных //
///////////////////////////
let photoIndex = 0;
let names = ["Цветение", "Лодки", "Ночная река", "Башня"];
let autoAnimationId;
let autoAnimationStopped = false;
let slider = document.querySelector(".slideShow");
let images = document.querySelectorAll(".slideShow img");
slider.style.transform = `translateX(${-images[0].clientWidth*photoIndex}px)`;


//////////////////
// Анимирование //
//////////////////
function prepareAnimation() {
    document.getElementById("g_title").innerHTML = names[0];
    startAnimation();
}

function startAnimation() {
    autoAnimationId = setInterval(() => {
        slideRight();
    }, 7500);
}

function slideLeft() {
    if (photoIndex-1 < 0) {
        return;
    }
    document.querySelector(".slideShow").style.transition = "transform 0.4s ease-in-out";
    photoIndex--;
    slider.style.transform = `translateX(${-images[0].clientWidth*photoIndex}px)`;
}

function slideRight() {
    if (photoIndex+1 === names.length) {
        return;
    }
    document.querySelector(".slideShow").style.transition = "transform 0.4s ease-in-out";
    photoIndex++;
    slider.style.transform = `translateX(${-images[0].clientWidth*photoIndex}px)`;
}


///////////////////////
// Обработка событий //
///////////////////////
function leftButtonHandler() {
    if (autoAnimationStopped === false) {
        clearInterval(autoAnimationId);
        autoAnimationId = null;
        autoAnimationStopped = true;
    }
    slideLeft();
}

function rightButtonHandler() {
    if (autoAnimationStopped === false) {
        clearInterval(autoAnimationId);
        autoAnimationId = null;
        autoAnimationStopped = true;
    }
    slideRight();
}

window.addEventListener("load", prepareAnimation);

slider.addEventListener("transitionend", () => {
    document.getElementById("g_title").innerHTML = names[photoIndex];
});
