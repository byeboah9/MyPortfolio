function Snake(tailList, gridNumColumns, gridNumRows, vx, vy, tailColorPaletteIndex, 
    minNumMovesBeforeChangingDirection=20) {
        this.tailList = tailList;
        this.gridNumColumns = gridNumColumns;
        this.gridNumRows = gridNumRows;
        this.vx = vx;
        this.vy = vy;
        this.tailColorPaletteIndex = tailColorPaletteIndex;
        this.minNumMovesBeforeChangingDirection = minNumMovesBeforeChangingDirection;
        this.numMovesInSameDirection = 0;

        this.move = function() {
            newTailList = [];

            head = {
                'x' : this.tailList[0].x,
                'y' : this.tailList[0].y
            };

            head.x += this.vx;

            if (head.x < 0) 
                head.x = gridNumColumns-1;
            

            if (head.x > gridNumColumns-1) 
                head.x = 0;
            

            head.y += this.vy;

            if (head.y < 0) 
                head.y = gridNumRows-1;
            

            if (head.y > gridNumRows-1) 
                head.y = 0;
            

            newTailList.push(head);

            for(var i = 1; i < this.tailList.length; i++)
                newTailList.push(this.tailList[i-1]);

            this.tailList = newTailList;

            this.numMovesInSameDirection++;
        }

        this.changeXDirection = function(newXDIrection) {
            if(this.vx != 0)
                return;
            this.vx = newXDIrection;
            this.vy = 0;

            this.numMovesInSameDirection = 0;
        }

        this.changeYDirection = function(newYDIrection) {
            if(this.vy != 0)
                return;
            this.vy = newYDIrection;
            this.vx = 0;

            this.numMovesInSameDirection = 0;
        }

        this.changeRandomDirection = function() {
            if(this.numMovesInSameDirection < this.minNumMovesBeforeChangingDirection)
            return;
            
            newDirectionList = [1, -1];
            newDirectionIndex = Math.floor(Math.random() * newDirectionList.length);
            if (this.vx == 0) 
                this.changeXDirection(newDirectionList[newDirectionIndex]);
            else
                this.changeYDirection(newDirectionList[newDirectionIndex]);
        }
    }