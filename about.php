<?php
require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css?>=<?php echo time(); ?>" />
  <link rel="stylesheet" href="css/about.css?>=<?php echo time(); ?>" />
  <title>About</title>
</head>

<body>
  <div class="container">
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
      <h2 class='title'>this project have been done by : </h2>
      <table>
        <colgroup>
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 65%;">
          <col span="1" style="width: 20%;">
        </colgroup>
        <thead>
          <tr>
            <th>A</th>
            <th>Name</th>
            <th>Group</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Suhaila Sami Mohammed Murad</td>
            <td>PHP</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Asma Sultan Ali Sultan</td>
            <td>PHP</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Shahd Wael Saleh Ahmed</td>
            <td>PHP</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Tariq Akrami Abdul Tawab Mohammed</td>
            <td>PHP</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Radwa Waleed Hamdi Mahmoud</td>
            <td>PHP</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Shaimaa Reda Taha Mohammed</td>
            <td>SQL</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Yousif Mamdouh Saeed Ibrahim</td>
            <td>SQL</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Aya Ibrahim Abdul Nabi Ibrahim</td>
            <td>SQL</td>
          </tr>
          <tr>
            <td>9</td>
            <td>Yamna Amr Mohammed Fadl</td>
            <td>SQL</td>
          </tr>
          <tr>
            <td>10</td>
            <td>Mahmoud Khalil Mohammed Khalil</td>
            <td>SQL</td>
          </tr>
          <tr>
            <td>11</td>
            <td>Mustafa Yasser Saleh Mahmoud</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>12</td>
            <td>Mustafa Abdelbaset Mahfouz Sayed</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>13</td>
            <td>Salma Mohammed Saeed Abdullah</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>14</td>
            <td>Ahmed Atef Mohammed Abu Hashish</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>15</td>
            <td>Ahmed</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>16</td>
            <td>Farah Hisham Zein Mohammed</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>17</td>
            <td>Farah Ala Atef Abdelhamid</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>18</td>
            <td>Fatima Mohammed Abu Al-Fotouh Mohammed</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>19</td>
            <td>Mohammed Gamal Abdel Aati Tahamy</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>20</td>
            <td>Mohammed Ashraf Mohammed Abu Salem</td>
            <td>CSS</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>