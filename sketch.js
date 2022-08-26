

let K;
let kimg;
let biimg;
let bimg;
let birds =[];
let soundClassifier;
let counter = 0; // this counter is for the current score of the user.
var localStorageName = "highScore";
var highScore;
let mySound1 = new Audio('game_over.wav') // this is the game over sound


if(localStorage.getItem(localStorageName) == null) {
    highScore = 0;
} else {
    highScore = localStorage.getItem(localStorageName);
}

function preload(){  // preload the images

   const options = { probabilityThreshold: 0.95};
  soundClassifier = ml5.soundClassifier('SpeechCommands18w', options);

    bimg = loadImage('cloudsBackgroundFast.gif');
    kimg = loadImage('kiki.png');
    biimg = loadImage('bird.gif');


}
function setup(){  // create canvas
    createCanvas(1280,600);
    K = new Kiki();

    soundClassifier.classify(gotCommand);
}

function gotCommand(error, results) { 
    if (error) {
      console.error(error);
    }
    console.log(results[0].label, results[0].confidence);
    if (results[0].label == 'up') {
        K.fly();
    }
  }

function keyPressed(){ // when the key space is pressed, make kiki jump.
    if(key == ' '){
        K.fly();
    }
}

function draw(){  //this is for the display of the birds.
    if(random(1) < 0.005){
        birds.push(new bird());
    }

    background(bimg);

    for( let b of birds){
        b.move();
        b.show();
        if( !K.hits(b)){
            counter++;
            highScore = Math.max(counter, highScore);
            localStorage.setItem(localStorageName, highScore);
        }

        if( K.hits(b)){  // if kiki hits the bird, then play gameover sound.
            mySound1.play()
            console.log('game over');
            showEnd();
            noLoop();
          


    console.log(highScore);
        }

    }
    document.getElementById("cs").innerHTML = ('SCORE: ' + counter);
    K.show();
    K.move();
   

}

// this function shows your current score.
function showEnd(){

    document.getElementById("score").innerHTML="Your Score:"+ counter;
    document.getElementById("hidden1").value = counter;
    document.getElementById("endScreen").style.display="block";
    
}

