<?php

session_start();

include("connection.php"); // a file that includes the connection for the database and some functions.

    $h= isset($_GET["hidden"]) ? $_GET["hidden"] : "";
    

    //this query is to get the previous highscore daved in the database
    $result= " SELECT highScore From registration3 WHERE username = '".$_SESSION["user"]."' LIMIT 1 ";
    $rs2 = mysqli_query($conn2,$result);
    $row = mysqli_fetch_array($rs2); // we retrieved the old highscore

    if ($row["highScore"] <= $h ){ // compare highscore with current score
    $query3 = "UPDATE registration3 SET highScore = '$h'  WHERE username = '".$_SESSION["user"]."'"; // save new highscore in database
    $rf = mysqli_query($conn2,$query3);
  }



?>

<!DOCTYPE html>
<html>
  <head>
    <title>Leaderboards</title>
    <script src="script.js"></script>
    

    <style>
      p{
        text-align:center;
        font-size: 18pt;
        font-weight:600;

        
      }

      body {
        background-image: url(cloudsBackgroundFast.gif);
      }


      .box2{
        margin-left: 30%;
        margin-top: 3%;
        width: 300px;
        height: 390px;
        border-radius: 10px;
        background-color: white;
        opacity: 0.7;
        font-size: 18pt;
        font-family: gaming;
        align-items: center;
        padding: 3%;
       
      }


      .btn{

        font-size: large;
        background-color: rgb(113, 179, 229);
        border-radius: 5px;
        text-align: center;
        font-family: gaming;
        width: auto;



}
    .div1{
      margin-left: 39%;
      width: auto;
      justify-content: center;  
      align-items: center;
      display :inline;

    }

    </style>
  </head>
<body>
<br>
<div class = "div1">
<a href="login.php"><button class="btn" >Logout</button></a>
<a href="index.html"><button class="btn">Go Back</button></a>
</div>

<!-- this div shows the leaderboards of the top 10 users-->
<div class = "box2">
<?php
// a query that selects the top 10 highscores from the database.
$sql = "SELECT username, highScore  FROM registration3 ORDER BY highScore DESC LIMIT 10" ;
$result2 = $conn2->query($sql);
$c = 1;
echo "<p> Leaderboards </p>";
if ($result2->num_rows >= 0) {
  // Put the users in a table
  echo "<table style= 'width:100%; text-align: center;'> <tr style='background:rgb(123,146,196); color:white'><td><b>Ranking<b></td><td><b>Name<b></td><td><b>Score<b></td></tr>";
  while($row = $result2->fetch_assoc()) {
      echo "<tr><td>". $c."</td><td>". $row["username"]."</td><td>".$row["highScore"]."</td></tr>";
      $c++;
    }
} else {
    echo "0 results";
}
$conn->close();
?>



</body>
</html>





