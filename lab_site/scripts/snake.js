let canvas = document.getElementById('game');
let context = canvas.getContext('2d');

let animId = undefined;
let count = 0;
let isCollided = false;
let startMillis = -1;
let endMillis = -1;

let gridSize = 32;
let rb = canvas.width/gridSize;

let snake = {
    x: 160,
    y: 160,
    dx: gridSize,
    dy: 0,
    tail: [],
    len: 1
};

let apple = {
    x: getRandomInt(0, rb)*gridSize,
    y: getRandomInt(0, rb)*gridSize
};


function getRandomInt(min, max) {
    return Math.floor(Math.random()*(max-min))+min;
}

function restart() {
    count = 0;
    isCollided = false;

    snake = {
        x: 160,
        y: 160,
        dx: gridSize,
        dy: 0,
        tail: [],
        len: 1
    };

    apple = {
        x: getRandomInt(0, rb)*gridSize,
        y: getRandomInt(0, rb)*gridSize
    };

    startMillis = Date.now();
    endMillis = -1;

    document.getElementById("score").innerText = "0";
    document.getElementById("restartGame").style.display = "none";
    animId = requestAnimationFrame(loop);
}

function loop() {
    animId = requestAnimationFrame(loop);

    if (++count < 8) {
        return;
    }

    count = 0;

    context.clearRect(0, 0, canvas.width, canvas.height);

    snake.x += snake.dx;
    snake.y += snake.dy;

    if (isCollided || (snake.x < 0 || snake.x >= canvas.width) || (snake.y < 0 || snake.y >= canvas.height)) {
        snake.tail.forEach(function (cell, index) {
            context.fillRect(cell.x, cell.y, gridSize-1, gridSize-1);
        });
        cancelAnimationFrame(animId);
        document.getElementById("restartGame").style.display = "block";
        generatePost(snake.len-1, ((Date.now()-startMillis)/1000).toFixed());
    } else {
        snake.tail.unshift({x: snake.x, y: snake.y});

        if (snake.tail.length > snake.len) {
            snake.tail.pop();
        }

        context.fillStyle = 'red';
        context.fillRect(apple.x, apple.y, gridSize-1, gridSize-1);

        context.fillStyle = 'green';
        snake.tail.forEach(function (cell, index) {
            context.fillRect(cell.x, cell.y, gridSize-1, gridSize-1);
            if (cell.x === apple.x && cell.y === apple.y) {
                document.getElementById("score").innerText = snake.len;
                snake.len++;
                apple.x = getRandomInt(0, rb)*gridSize;
                apple.y = getRandomInt(0, rb)*gridSize;
            }

            for (let i = index+1; i < snake.tail.length; i++) {
                if (cell.x === snake.tail[i].x && cell.y === snake.tail[i].y) {
                    isCollided = true;
                    break;
                }
            }
        });
    }
}

document.addEventListener('keydown', function (e) {
    if (e.keyCode === 37 && snake.dx === 0) {
        snake.dx = -gridSize;
        snake.dy = 0;
    } else if (e.keyCode === 38 && snake.dy === 0) {
        snake.dy = -gridSize;
        snake.dx = 0;
    } else if (e.keyCode === 39 && snake.dx === 0) {
        snake.dx = gridSize;
        snake.dy = 0;
    } else if (e.keyCode === 40 && snake.dy === 0) {
        snake.dy = gridSize;
        snake.dx = 0;
    }
});

setTimeout(() => {
    startMillis = Date.now();
    animId = requestAnimationFrame(loop);
}, 300);



function generatePost(score, time) {
    $.ajax({
        url : "/scripts/gameDbBridge.php",
        type: "POST",
        data : `score=${score}&time=${time}`,
        success: function() {
        },
        error: function() {
        }
    });
}
