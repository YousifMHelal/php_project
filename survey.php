<?php
require 'config.php';

$is_user = false;
$id = '';
//check if user sign in or not
if (isset($_SESSION["username"])) {
  $user = $_SESSION["username"];
  $id = $_SESSION["id"];
  $is_user = true;
} else {
  $user = 'sign in first';
}

//get the the user from the data
$sql_get = "SELECT DISTINCT user_id FROM `responses`;";
$user_id = mysqli_query($con, $sql_get);
$alreadySubmitted = false;

while ($row = mysqli_fetch_assoc($user_id)) {
  if ($id == $row['user_id']) {
    $alreadySubmitted = true;
    break;
  }
}

$sql_all_users = "SELECT COUNT(DISTINCT user_id) AS submission_count FROM `responses`";
$all_users = mysqli_query($con, $sql_all_users);
$row_users = mysqli_fetch_assoc($all_users);

$submission_users = implode(', ', $row_users);

$yes = 0;
$no = 0;
$sql_select_response = "SELECT response FROM `responses`";
$all_response = mysqli_query($con, $sql_select_response);
while ($row = mysqli_fetch_assoc($all_response)) {
  if ($row["response"] == 'yes') {
    $yes++;
  } else {
    $no++;
  }
}


$status = '';
$data = [];
$questions = 4 * $submission_users;

if ($alreadySubmitted) {
  $status = 'You have already submitted the survey.';
} else {
  $sql = "SELECT * FROM `questions`;";
  $data = mysqli_query($con, $sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "SELECT * FROM `questions`;";
  $data = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($data)) {
    $questionKey = "question_" . $row["id"];

    if (isset($_POST[$questionKey])) {
      $question_id = $row['id'];
      $response = $_POST[$questionKey];

      $sql_insert = "INSERT INTO responses (user_id, question_id, response) VALUES ('$id', '$question_id', '$response')";

      $status = '';

      if (mysqli_query($con, $sql_insert)) {
        echo "<script>console.log('Survey response submitted successfully for question $question_id')</script>";
        $status = 'Survey response submitted successfully';
      } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
      }
    } else {
      echo "Warning: Question key not set in POST for question {$row['id']}<br>";
    }
  }
  header("Location: survey.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/main.css?>=<?php echo time(); ?> " />
  <link rel="stylesheet" href="css/survey.css?>=<?php echo time(); ?> " />
  <title>Survey</title>
</head>

<body>
  <div class="wrapper">
    <div class="nav">
      <div class="logo">
        <img src="assets/hero.png" alt="logo" />
      </div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        if (!$is_user) {
          echo "<li><a href='signin.php'>Survey</a></li>";
        } else {
          echo "<li><a href='survey.php'>Survey</a></li>";
        }
        ?>
        <li><a href="info.php">info</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <?php
      if (!$is_user) {
        echo "<a href='signin.php' class='sign'>sign in</a>";
      } else {
        echo "<a href='logout.php' class='sign'>logout</a>";
      }
      ?>
    </div>
    <?php

    if ($is_user) {
      ?>
      <div class="info">
        <p>welcome <span>
            <?php echo $user ?>
          </span> start your</p>
        <h1>survey about Bullying</h1>
      </div>
      <form class="questions" method="post">
        <?php
        if ($data) {
          while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <div class="question">
              <label class='text'>
                <?php echo $row['question'] ?>
              </label>
              <label class="yes" for="yes_<?php echo $row['id'] ?>">
                <input id="yes_<?php echo $row['id'] ?>" type="radio" name="question_<?php echo $row['id'] ?>" value="yes"
                  required> Yes</label>
              <label class="no" for="no_<?php echo $row['id'] ?>">
                <input id="no_<?php echo $row['id'] ?>" type="radio" name="question_<?php echo $row['id'] ?>" value="no"
                  required> No</label>
            </div>
            <?php
          }
        }
        ?>
        <?php
        if ($alreadySubmitted) {
          echo "<h2 class='status'>$status</h2>";
          echo "<h3 class='result'>'$submission_users' people participated in this survey with a total of $questions questions, and the results were: $yes-->Yes | $no-->No</h3>";
        } else {
          echo '<input class="btn" type="submit" value="Submit">';
        }
        ?>
      </form>
      <?php
    } else {
      echo '<h1 class="no-user">You have to <a href="signin.php">Sign in</a> first to start the survey</h1>';
    }
    ?>
  </div>
  </div>
</body>

</html>