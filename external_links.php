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
  <title>Fitness Tracker - External Links</title>
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
        <li><a class="external-links" href="external_links.php">External Links</a></li>
        <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>External Links</h2>
    <ul>
      <li><a href="https://www.who.int/" target="_blank">World Heath Organization</a></li>
      <li><a href="https://main.mohfw.gov.in/#:~:text=%E0%A4%B8%E0%A5%8D%E0%A4%B5%E0%A4%BE%E0%A4%B8%E0%A5%8D%E0%A4%A5%E0%A5%8D%E0%A4%AF%20%E0%A4%8F%E0%A4%B5%E0%A4%82%20%E0%A4%AA%E0%A4%B0%E0%A4%BF%E0%A4%B5%E0%A4%BE%E0%A4%B0%20%E0%A4%95%E0%A4%B2%E0%A5%8D%E0%A4%AF%E0%A4%BE%E0%A4%A3%20%E0%A4%AE%E0%A4%82%E0%A4%A4%E0%A5%8D%E0%A4%B0%E0%A4%BE%E0%A4%B2%E0%A4%AF,Department%20of%20Health%20%26%20Family%20Welfare&text=Shri%20Rajesh%20Bhushan-,The%20Minister%20of%20State%20for%20Health%20and%20Family%20Welfare%2C%20Dr,Delhi%20on%20December%2001%2C%202021." target="_blank">Heath Ministry of India</a></li>
      <li><a href="https://unfoundation.org/what-we-do/issues/global-health/pandemic-accord-actualizing-ambition-in-2023/?gclid=CjwKCAjwge2iBhBBEiwAfXDBR3l4pIMHTaxzynwdMofS6iyUH7OYyMR0Amy2rYJ-kcIs27dmeZGc9RoCBVgQAvD_BwE" target="_blank">International Health Organization</a></li>
      <li><a href="https://macdonaldlaurier.ca/?gclid=CjwKCAjwge2iBhBBEiwAfXDBR7k-xwHPKRV_4s0Ts_8p9sOJOmSDye0SO_1Bc9FSXTnrSmMqsj_DdRoC4NIQAvD_BwE" target="_blank">Know Your Health</a></li>
    </ul>
  </main>
</body>
</html>
