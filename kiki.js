let mySound = new Audio('jumping_sound.wav')
class Kiki {
    constructor(){
        this.r=150;
        this.x=50;
        this.y= -150;
        this.vy = 0;
        this.gravity = 2;
    }

    show(){
        image(kimg,this.x , this.y , this.r, this.r);
       
    }

    fly(){
        this.vy = -30; 
        mySound.play() 
    }

    move(){
        this.y += this.vy;
        this.vy += this.gravity;
        this.y = constrain(this.y ,0 ,height- this.r )
    }

    hits(bird){

        let x1 = this.x + this.r * 0.5;
        let y1 = this.y + this.r * 0.5;
        let x2 = bird.x + bird.r * 0.5;
        let y2 = bird.y + bird.r * 0.5;



       let  collide = collideCircleCircle(x1, y1, this.r, x2, y2, bird.r);
     


       return collide;
    }
}