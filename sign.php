<?php

session_start();
include("connection.php");


 
     $username = $_POST['username'];
     $password = $_POST['password'];
     $_SESSION['user']=$username; //save user's name so that it can be used in other php files.

	if (!empty($username) && !empty($password)) // if both fields are filled, then register user.
	{
    //registration is the name of the table
    $query = "insert into registration3 (username,password,highScore) values ('$username','$password','0')";
		mysqli_query($conn2, $query);

    header("Location:  instruction_page.php"); // once logged in, head to the instructions page.

  }


?>



<!DOCTYPE html>
<html>
  <head>
    <title>Instructions</title>
    <style>
     body {
        background-image: url(cloudsBackgroundFast.gif);
      }
      canvas {
        display: block;
      }
      .box {
        margin-left: 25%;
        margin-top: 5%;
        width: 600px;
        height: 500px;
        border-radius: 10px;
        background-color: white;
        opacity: 0.7;
        font-family: gaming;
        align-items: center;
        display: none;
      }

      .box2{
        margin-left: 27%;
        margin-top: 5%;
        width: 300px;
        height: 200px;
        border-radius: 10px;
        background-color: white;
        opacity: 0.7;
        font-family: gaming;
        align-items: center;
        padding: 10%;
      }

      @font-face {
    font-family: 'gaming';
    src: url('FirstJob-X8rP.ttf');
}

    .button1{

        font-size: large;
        width: 70px;
        background-color: rgb(113, 179, 229);
        border-radius: 5px;
        text-align: center;
        margin-left: 45%;
        font-family: gaming;


    }

    .button2{

    font-size: large;
    width: 70px;
    background-color: rgb(113, 179, 229);
    border-radius: 5px;
    text-align: center;
    font-family: gaming;


}
    p{
        text-align: center;
    }
    label{
        text-align: center;
    }

      </style>
  </head>
  <body>

  </div>

    </div>
<!-- this page includes the html form of the signup page-->
    <div class="box2" id="form">
      <div>
        <h1  ALIGN = "center">Register to enjoy the game!</h1>
        <form method="post">
            <p>
                <label> 
                    <input  id="username" type="text" placeholder="create new username" name="username">
                </label>
            </p>
            <p>
                    <input id="password" type="password" placeholder="create new password" name="password">
            </p>
            <p>
            <input type="submit"  ALIGN = "center" id="btn" class="button2" value="Register" name="submit">
            <a href="login.php">
            <input type="button"  ALIGN = "center" class="button2" value="Login">
            </a>
            </p>
            
        </form>

      </div>
    </div>



  </body>
</html>
