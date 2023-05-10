<?php
session_start();

if (!isset($_SESSION["username"])) {
  // Redirect to the login page if the user is not logged in
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Process the weight form submission
  $weight = $_POST["weight"];
  $weight_unit = $_POST["weight_unit"];
  
  // Perform any necessary validation or data processing
  
  // Save the weight data to the database or perform any other required actions
  
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
  <title>Fitness Tracker - Weight</title>
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
        <li><a href="external_links.php">External Links</a></li>
        <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Weight</h2>
    <form action="weight.php" method="post">
      <div class="form-group">
        <label for="weight">Weight:</label>
        <input type="number" name="weight" id="weight" required>
        <select name="weight_unit">
          <option value="kg">kg</option>
          <option value="lbs">lbs</option>
        </select>
      </div>
      <button type="submit">Submit</button>
    </form>
  </main>
</body>
</html>
