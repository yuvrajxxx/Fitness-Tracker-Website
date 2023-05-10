<?php
session_start();

if (!isset($_SESSION["username"])) {
  // Redirect to the login page if the user is not logged in
  header("Location: login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness Tracker</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Fitness Tracker</h1>
  <nav>
    <ul>
      <li><a href="weight.php">Weight</a></li>
      <li><a href="height.php">Height</a></li>
      <li><a href="exercise.php">Exercise</a></li>
      <li><a href="food.php">Food Intake</a></li>
      <li><a href="external_links.php">External Links</a></li>
      <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

  <main>
  <form action="confirmation.php" method="post">
            <h2 id="weight">Weight</h2>
      <div class="form-group">
        <!--<label for="weight">Weight:</label>-->
        <input type="number" name="weight" id="weight" required>
        <select name="weight_unit">
          <option value="kg">kg</option>
          <option value="lbs">lbs</option>
        </select>
      </div>

      <h2 id="height">Height</h2>
      <div class="form-group">
        <!--<label for="height">Height:</label>-->
        <input type="number" name="height" id="height" required>
        <select name="height_unit">
          <option value="cm">cm</option>
          <option value="in">in</option>
        </select>
      </div>

      <h2 id="exercise">Exercise</h2>
      <div class="form-group">
        <!--<label for="exercise">Exercise:</label>-->
        <select name="exercise" id="exercise">
          <option value="sedentary">Sedentary</option>
          <option value="lightly_active">Lightly Active</option>
          <option value="moderately_active">Moderately Active</option>
          <option value="very_active">Very Active</option>
<option value="extra_active">Extra Active</option>
</select>
</div>
  <h2 id="food">Food Intake</h2>
  <div class="form-group">
    <!--<label for="food">Food Intake:</label>-->
    <input type="number" name="food" id="food" required>
    <select name="food_unit">
      <option value="calories">calories</option>
      <option value="kj">kj</option>
    </select>
  </div>

  <h2 id="water">Water Intake</h2>
  <div class="form-group">
    <!--<label for="water">Water Intake:</label>-->
    <input type="number" name="water" id="water" required>
    <select name="water_unit">
      <option value="ml">ml</option>
      <option value="oz">oz</option>
    </select>
  </div>

  <button type="submit">Submit</button>
</form>
<?php
  if (isset($_GET["weight"]) && isset($_GET["weight_unit"]) && isset($_GET["height"]) && isset($_GET["height_unit"]) && isset($_GET["exercise"]) && isset($_GET["food"]) && isset($_GET["food_unit"]) && isset($_GET["water"]) && isset($_GET["water_unit"])) {
    $weight = $_GET["weight"];
    $weight_unit = $_GET["weight_unit"];
    $height = $_GET["height"];
    $height_unit = $_GET["height_unit"];
    $exercise = $_GET["exercise"];
    $food = $_GET["food"];
    $food_unit = $_GET["food_unit"];
    $water = $_GET["water"];
    $water_unit = $_GET["water_unit"];
    $username = $_SESSION["username"];

    echo "<h2>Confirm your submission</h2>";
    echo "<p>Please confirm your submission before proceeding:</p>";
    echo "<ul>";
    echo "<li>Weight: $weight $weight_unit</li>";
    echo "<li>Height: $height $height_unit</li>";
    echo "<li>Exercise: $exercise</li>";
    echo "<li>Food Intake: $food $food_unit</li>";
    echo "<li>Water Intake: $water $water_unit</li>";
    echo "</ul>";

    echo "<form action='confirmation.php' method='post'>";
    echo "<input type='hidden' name='weight' value='$weight'>";
    echo "<input type='hidden' name='weight_unit' value='$weight_unit'>";
    echo "<input type='hidden' name='height' value='$height'>";
    echo "<input type='hidden' name='height_unit' value='$height_unit'>";
    echo "<input type='hidden' name='exercise' value='$exercise'>";
    echo "<input type='hidden' name='food' value='$food'>";
    echo "<input type='hidden' name='food_unit' value='$food_unit'>";
    echo "<input type='hidden' name='water' value='$water'>";
    echo "<input type='hidden' name='water_unit' value='$water_unit'>";
    echo "<input type='hidden' name='username' value='$username'>";
    echo "<button type='submit' name='submit'>Submit</button>";
    echo "</form>";
  }
?>
</main>
</body>
</html>
