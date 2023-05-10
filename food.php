<?php
session_start();

if (!isset($_SESSION["username"])) {
  // Redirect to the login page if the user is not logged in
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Process the food intake form submission
  $food = $_POST["food"];
  
  // Perform any necessary validation or data processing
  
  // Save the food intake data to the database or perform any other required actions
  
  // Redirect to the index page or display a success message
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness Tracker - Food Intake</title>
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
    <h2>Food Intake</h2>
    <form action="food.php" method="post">
      <div class="form-group">
        <label for="food">Food Intake:</label>
        <input type="number" name="food" id="food" required>
        <select name="food_unit">
          <option value="calories">calories</option>
          <option value="kj">kj</option>
        </select>
      </div>
      <button type="submit">Submit</button>
    </form>
  </main>
</body>
</html>
