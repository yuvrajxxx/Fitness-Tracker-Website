<?php
session_start();

if (!isset($_SESSION["username"])) {
  // Redirect to the login page if the user is not logged in
  header("Location: login.php");
  exit();
}

// Retrieve user data from the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $weight = $_POST["weight"];
  $weight_unit = $_POST["weight_unit"];
  $height = $_POST["height"];
  $height_unit = $_POST["height_unit"];
  $exercise = $_POST["exercise"];
  $food = $_POST["food"];
  $food_unit = $_POST["food_unit"];
  $water = $_POST["water"];
  $water_unit = $_POST["water_unit"];
  $username = $_SESSION["username"];

  // Store the user data in a session variable
  $_SESSION["user_data"] = [
    "weight" => $weight,
    "weight_unit" => $weight_unit,
    "height" => $height,
    "height_unit" => $height_unit,
    "exercise" => $exercise,
    "food" => $food,
    "food_unit" => $food_unit,
    "water" => $water,
    "water_unit" => $water_unit,
    "username" => $username
  ];
} else {
  // Redirect to the index page if accessed directly without form submission
  header("Location: index.php");
  exit();
}

// Function to calculate BMI
function calculateBMI($weight, $weight_unit, $height, $height_unit)
{
  // Convert weight to kg if the unit is in pounds
  if ($weight_unit === "lbs") {
    $weight = $weight * 0.453592;
  }

  // Convert height to meters if the unit is in inches
  if ($height_unit === "in") {
    $height = $height * 0.0254;
  }

  // Calculate BMI
  $bmi = $weight / ($height * $height);
  return $bmi;
}

// Calculate the BMI using the user's weight and height
$bmi = calculateBMI($weight, $weight_unit, $height, $height_unit);

// Function to generate a random suggestion based on user data
function generateSuggestion($bmi, $exercise, $food, $water)
{
  // Generate a random suggestion based on user data
  $suggestions = [
    "Keep up the good work! Your BMI is within the healthy range.",
    "Consider increasing your exercise intensity for better results.",
    "Make sure to maintain a balanced diet with a variety of nutrients.",
    "Stay hydrated by drinking enough water throughout the day.",
    "Consult a healthcare professional for personalized advice."
  ];

  // Select a random suggestion
  $randomSuggestion = $suggestions[array_rand($suggestions)];

  return $randomSuggestion;
}

// Generate a random suggestion based on user data
$suggestion = generateSuggestion($bmi, $exercise, $food, $water);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>
  <link rel="stylesheet" href="style.css">
  <!-- Include the necessary libraries for graph generation -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <style>
    .summary,
    .suggestions,
    .graph {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Fitness Tracker</h1>
    <nav>
      <ul>
        <li><a href="#weight">Weight</a></li>
        <li><a href="#height">Height</a></li>
        <li><a href="#exercise">Exercise</a></li>
        <li><a href="#food">Food Intake</a></li>
        <li><a href="#">External Links</a></li>
        <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="summary">
      <h2>Data Summary</h2>
      <ul>
        <li><strong>Weight:</strong> <?php echo $weight . " " . $weight_unit; ?></li>
        <li><strong>Height:</strong> <?php echo $height . " " . $height_unit; ?></li>
        <li><strong>Exercise:</strong> <?php echo $exercise; ?></li>
        <li><strong>Food Intake:</strong> <?php echo $food . " " . $food_unit; ?></li>
        <li><strong>Water Intake:</strong> <?php echo $water . " " . $water_unit; ?></li>
        <li><strong>BMI:</strong> <?php echo $bmi; ?></li>
      </ul>
    </div>
    <div class="suggestions">
  <h2>Suggestions</h2>
  <p><?php echo $suggestion; ?></p>
</div>

<div class="graph">
  <h2>Data Graph</h2>
  <div id="graph"></div>
</div>
</main>
  <script>
    // Retrieve user data from the session
    var userData = <?php echo json_encode($_SESSION["user_data"]); ?>;

    // Extract necessary data for the graph
    var weight = userData.weight;
    var height = userData.height;
    var exercise = userData.exercise;
    var food = userData.food;
    var water = userData.water;

    // Generate a random data for demonstration
    var dates = ['2023-01-01', '2023-01-02', '2023-01-03', '2023-01-04', '2023-01-05'];
    var data = [weight, weight - 1, weight - 2, weight - 3, weight - 4];

    // Create a graph using Plotly
    var trace = {
      x: dates,
      y: data,
      type: 'scatter',
      mode: 'lines+markers',
      marker: {
        size: 8,
        color: 'blue'
      },
      line: {
        color: 'blue'
      }
    };

    var layout = {
      title: 'Weight Progress',
      xaxis: {
        title: 'Date'
      },
      yaxis: {
        title: 'Weight'
      }
    };

    var config = {
      responsive: true
    };

    var graphData = [trace];
    Plotly.newPlot('graph', graphData, layout, config);
</script>

</body>
</html>