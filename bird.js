

class bird { 
    constructor() {
      this.r = 80;
      this.x = width;
      this.y = height - this.r;
    }
  
    move() {
      this.x -= 10;
    }
  
    show() {
      image(biimg, this.x, this.y, this.r, this.r);

    }
  }