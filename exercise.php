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
  <title>Fitness Tracker - Exercise</title>
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
    <h2>Exercise</h2>
    <form action="exercise_submit.php" method="post">
      <div class="form-group">
        <label for="exercise">Exercise Level:</label>
        <select name="exercise" id="exercise">
          <option value="sedentary">Sedentary (little or no exercise)</option>
          <option value="lightly_active">Lightly Active (light exercise/sports 1-3 days/week)</option>
          <option value="moderately_active">Moderately Active (moderate exercise/sports 3-5 days/week)</option>
          <option value="very_active">Very Active (hard exercise/sports 6-7 days/week)</option>
          <option value="extra_active">Extra Active (very hard exercise/sports & physical job or 2x training)</option>
        </select>
      </div>
      <button type="submit">Submit</button>
    </form>
  </main>
</body>
</html>
