///////////////////////////
// Объявление переменных //
///////////////////////////
let photoIndex = 0;
let names = ["Цветение", "Лодки", "Ночная река", "Башня"];
let paths = ["Blooming.jpg", "Boats.jpg", "Moraine_Lake_at_night.jpg", "Tower.jpg"];
let autoAnimationId;
let autoAnimationStopped = false;
let sliceView = document.getElementById("sv");
let slices = [];


//////////////////
// Анимирование //
//////////////////
function fadeOut(elem) {
    elem.style.opacity = "1";
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = "0";
}

function fadeIn(elem) {
    elem.style.opacity = "0";
    elem.style.transition = "opacity 200ms";
    elem.style.opacity = "1";
}

function prepareAnimation() {
    document.getElementById("g_title").innerHTML = names[0];
    mosaicify(true);
    startAnimation();
}

function startAnimation() {
    autoAnimationId = setInterval(() => {
        slideRight();
    }, 7500);
}

function doRoutine() {
    fadeOut(sliceView);
    mosaicify();
    setTimeout(() => {
        fadeIn(sliceView);
    }, 300);
    setTimeout(() => {
        for (let i = 0; i < slices.length; i++) {
            setTimeout(() => {
                fadeIn(document.getElementById(slices.splice(Math.floor(Math.random()*slices.length), 1)[0].id));
            }, 7*i);
        }
    }, 300);
}

function slideLeft() {
    if (photoIndex-1 < 0) {
        photoIndex = names.length-1;
    } else {
        photoIndex--;
    }

    doRoutine();
}

function slideRight() {
    if (photoIndex+1 === names.length) {
        photoIndex = 0;
    } else {
        photoIndex++;
    }

    doRoutine();
}

function mosaicify(isBeingPrepared) {
    let image = new Image();

    image.onload = function () {
        let canvas = document.createElement('canvas');
        let context = canvas.getContext('2d');
        canvas.width = 60;
        canvas.height = 60;
        slices = [];

        for (let i = 0; i < 9; i++) {
            for (let j = 0; j < 16; j++) {
                context.drawImage(image, 60*j, 60*i, 60, 60, 0, 0, 60, 60);
                let slice = document.createElement("img");
                slice.id = `slice${j+i*16}`;    // для правильной работы fadeAction
                slice.src = canvas.toDataURL();
                !isBeingPrepared ? fadeOut(slice) : null;
                slices.push(slice);
            }
        }

        sliceView.textContent = '';    // убираем все, что было

        for (let i = 0; i < 9; i++) {
            let row = document.createElement("div");
            for (let j = 0; j < 16; j++) {
                row.appendChild(slices[j+i*16]);
            }
            sliceView.appendChild(row);
        }
    };

    image.src =`../images/gallery/${paths[photoIndex]}`;
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

sliceView.addEventListener("transitionend", () => {
    document.getElementById("g_title").innerHTML = names[photoIndex];
});
