var canvas = document.getElementById('mainCanvas');
var c = canvas.getContext('2d');

var gridRows = 60, gridColumns = 120;
var paletteCyan = getGradient(10, 180, 100);
var paletteSnakes = ['lime'];
paletteSnakes = paletteSnakes.concat(paletteCyan);

canvas.width = window.innerWidth * .7;
canvas.height = window.innerHeight * .7;
canvas.backgroundColor = 'beige';

var cWidth = canvas.width, cHeight = canvas.height;

window.onload = function() {
    document.addEventListener("keydown", keyPush);
    setInterval(game, 1000/15);
}

function changeCanvasColor(bgColor) {
    c.beginPath();
    c.rect(0, 0, cWidth, cHeight);
    c.fillStyle = bgColor;
    c.fill();
}

changeCanvasColor("silver");

var myGrid = new Grid(c, gridRows, gridColumns, 0, 0, cWidth, cHeight, "black", "rgb(30, 30, 30)", paletteSnakes);

function init() {
    myGrid.init(true);
    myGrid.addSnake(6);
    myGrid.addSnake(5);
    myGrid.drawSnakes();

}

function game() {
    myGrid.moveSnakes();
}

function keyPush(evt) {
    vx = 0; vy = 0; i = 0;
    switch (evt.keyCode) {
        case 37:
            vx = -1; vy = 0;
            myGrid.snakeList[i].changeXDirection(vx);
            break;
        case 38:
            vx = 0; vy = -1;
            myGrid.snakeList[i].changeYDirection(vy);
            break;
        case 39:
            vx = 1; vy = 0;
            myGrid.snakeList[i].changeXDirection(vx);
            break;
        case 40:
            vx = 0; vy = 1;
            myGrid.snakeList[i].changeYDirection(vy);
            break;
    }
}
init();

function getGradient(numColors, hue, saturation) {
    var brightnessStep = Math.floor(100.0/numColors);
    var colorList = [];

    for(var i = 0; i < numColors; i++) {
        brightness = (numColors - i) * brightnessStep;
        newColor = 'hsl(' + hue + ', ' + saturation + '%, ' + brightness + '%)';
        colorList.push(newColor);
    }
    return colorList;
}