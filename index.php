<html>
<!--
  * Created by: Atri Sarker
  * Created on: April, 2024
  * Description: This file contains the index.php for the Calculator Calculator, a widget that takes in integer input, n and calculates the html code for the calculator of a regular n-sided polygon.
-->

<head>
  <!-- Metadata section -->
  <meta charset="utf-8">
  <meta name="description" content="Calculator for Calculator of a n-sided regular polygon, Using PHP">
  <meta name="keywords" content="immaculata, icd2o">
  <meta name="author" content="Atri Sarker">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png">
  <link rel="manifest" href="./fav_index/site.webmanifest">

  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css">

  <!-- MDL -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-indigo.min.css" />
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <!-- Title -->
  <title>Calculator Calculator in PHP</title>
</head>

<body>

  <!-- Script -->
  <script defer src="./js/script.js"></script>

  <!-- Header with Logo-->
  <h1>Calculator Calculator in <img src="./images/phpLogo.svg" alt="PHP Logo"></h1>

  <!-- FORM -->
  <form method="post" action="calculations.php" target="resultFrame">
    
    <!-- Amount of Sides Input -->
    <label for="sidesInput">Amount of sides:</label>
    <input id="sidesInput" type="number" name="sidesInput" step="1" min="3" max="9999999" />
    
    <br>
    <br>
    
    <!-- Unit Type Input -->
    <label for="unitTypeInput">Unit Type:</label>
    <select name="unitTypeInput" id="unitTypeInput">
      <option value="cm">cm</option>
      <option value="m">m</option>
      <option value="km">km</option>
    </select>
    
    <br>
    <br>

    <!-- Calculate Button -->
    <button type="submit" name="submit" value="Calculate!" id="CalculateBtn"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Calculate
    </button>

  <!-- End of Form -->
  </form>

  <!-- Result Label -->
  <h5>Output:</h5>

  <!-- Output IFRAME -->
  <iframe name="resultFrame" src="./calculations.php">
  </iframe>

</body>

</html>