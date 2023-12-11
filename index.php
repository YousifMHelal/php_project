<?php
require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/main.css?>=<?php echo time(); ?>" />
  <link rel="stylesheet" href="css/index.css?>=<?php echo time(); ?>" />

  <title>Home</title>
</head>

<body>
  <div class="wrapper">
    <div class="nav">
      <div class="logo">
        <img src="assets/logo.png" alt="background" />
      </div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if (!isset($_SESSION["id"])) {
          echo "<li><a href='signin.php'>Survey</a></li>";
        } else {
          echo "<li><a href='survey.php'>Survey</a></li>";
        }
        ?>
        <li><a href="info.php">info</a></li>
        <li><a href="about.php">About</a></li>
      </ul>

      <?php
      if (!isset($_SESSION["id"])) {
        echo "<a href='signin.php' class='sign'>sign in</a>";
      } else {
        echo "<a href='logout.php' class='sign'>logout</a>";
      }
      ?>

    </div>
    <div class="container">
      <div class="info">
        <h1>online survey</h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores
          corrupti tempore accusamus perferendis debitis reiciendis architecto,
          id dolore beatae quae fuga, facilis ipsam.
        </p>
        <?php
        if (!isset($_SESSION["id"])) {
          echo "<a href='signin.php'>Start your survey</a>";
        } else {
          echo "<a href='survey.php'>Start your survey</a>";
        }
        ?>
      </div>
      <div class="imgContainer">
        <img src="assets/bg.png" alt="background" />
      </div>
    </div>
  </div>
</body>

</html>