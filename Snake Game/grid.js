function Grid(ctx, numRows, numColumns, x0, y0, width, height, 
    backgroundColor, strokeColor, colorPalette) {
        this.ctx = ctx;
        this.numRows = numRows;
        this.numColumns = numColumns;
        this.x0 = x0;
        this.y0 = y0;
        this.width = width;
        this.height = height;
        this.cellWidth = this.width / this.numColumns;
        this.cellHeight = this.height / this.numRows;
        this.backgroundColor = backgroundColor;
        this.strokeColor = strokeColor;
        this.colorPalette = colorPalette;
        this.curColorPaletteIndex = 0;
        this.grid = [] ;
        this.snakeList = [];
        this.cellGoalPosition = {};
        this.cellGoalColor = 'red';
        this.level = 0;

        this.init = function(isNewLevel = false) {
            if(isNewLevel) {
                goalX = Math.floor(Math.random() * this.numColumns);
                goalY = Math.floor(Math.random() * this.numRows);
                this.cellGoalPosition = {'x': goalX, 'y': goalY};
            }

            this.grid = [];
            for(row = 0; row < this.numRows; row++) {
                this.grid[row] = [];
                for(col = 0; col < this.numColumns; col++)
                    this.grid[row][col] = -1;
            }
        }

        this.setCellColor = function(row, col, colorPaletteIndex) {
            this.grid[row][col] = colorPaletteIndex;
        }

        this.drawGrid = function(drawEmptyCells = false) {
            for(var row = 0; row < this.numRows; row++)
                for(var col = 0; col < this.numColumns; col++) {
                    if((drawEmptyCells) || (this.grid[row][col] > -1))
                    this.drawCell(row, col);
                }
            this.drawCell(this.cellGoalPosition.y, this.cellGoalPosition.x, this.cellGoalColor);
        }

        this.drawCell = function(row, col, specificColor = -1) {
            var x = this.x0 + col * this.cellWidth;
            var y = this.y0 + row * this.cellHeight;

            cellColor = this.backgroundColor;

            if(this.grid[row][col] >= 0) {
                cellColor = this.colorPalette[this.grid[row][col]];
            }  

            if(specificColor != -1)
                cellColor = specificColor;

            this.ctx.fillStyle = cellColor; 
            this.ctx.fillRect(x, y, this.cellWidth, this.cellHeight);
            this.ctx.strokeStyle = this.strokeColor;
            this.ctx.strokeRect(x, y, this.cellWidth, this.cellHeight);
            this.ctx.stroke();
        }

        this.clearCanvas = function() {
            this.ctx.fillStyle = this.backgroundColor;

            this.ctx.fillRect(this.x0, this.y0, this.width, this.height);
            this.ctx.strokeStyle = this.strokeColor;
            this.ctx.strokeRect(this.x0, this.y0, this.width, this.height);
            this.ctx.stroke();
        }

        this.addSnake = function(tailLength) {
            headPosX = Math.floor(Math.random() * (this.numColumns - 2*tailLength)) + tailLength;
            headPosY = Math.floor(Math.random() * (this.numRows - 2*tailLength)) + tailLength;

            velocityList = [1, -1];

            vx = 0, vy = 0;
            coinToss = Math.floor(Math.random() * 2);
            velocityListIndex = Math.floor(Math.random() * velocityList.length);
            if(coinToss == 0)
                vx = velocityList[velocityListIndex];
            else 
                vy = velocityList[velocityListIndex];

            tailList = [ {'x': headPosX, 'y': headPosY}];

            for(i = 1; i < tailLength; i++) {
                var posX = tailList[i-1].x - vx;
                var posY = tailList[i-1].y - vy;

                tailList.push( {'x': posX, 'y': posY});
            }

            newSnake = new Snake(tailList, this.numColumns, this.numRows, vx, vy, this.curColorPaletteIndex);

            this.snakeList.push(newSnake);

            this.curColorPaletteIndex++; 
            if(this.curColorPaletteIndex >= this.colorPalette.length)
                this.curColorPaletteIndex = 1;
        }

        this.drawSnakes = function() {
            this.init();

            this.clearCanvas();

            this.snakeList.forEach((curSnake) => {
                curSnake.tailList.forEach((curSnakeCell) => {
                    this.grid[curSnakeCell.y][curSnakeCell.x] = curSnake.tailColorPaletteIndex;
                });
            });

            this.drawGrid();
        }

        this.moveSnakes = function() {
            this.snakeList[0].move();

            for(i = 1; i < this.snakeList.length; i++) {
                this.snakeList[i].changeRandomDirection();
                this.snakeList[i].move();
            }

            this.drawSnakes();

            if(this.reachedGoal()) 
                this.startnewLevel();
        }

        this.reachedGoal = function() {
            var userSnake = this.snakeList[0];
            var userSnakeHeadX = userSnake.tailList[0].x;
            var userSnakeHeadY = userSnake.tailList[0].y;

            return (userSnakeHeadX == this.cellGoalPosition.x && userSnakeHeadY == this.cellGoalPosition.y)
        }

        this.startnewLevel = function() {
            this.level++;
            this.addSnake(3 + this.level);

            this.init(true);
        }
    }
