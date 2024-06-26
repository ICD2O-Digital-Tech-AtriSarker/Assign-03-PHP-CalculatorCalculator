<!--
  * Created by: Atri Sarker
  * Created on: April, 2024
  * Description: This file contains the calculations.php for the Calculator Calculator, a widget that takes in integer input, n and calculates the html code for the calculator of a regular n-sided polygon.
-->
<!-- CSS -->
<link rel="stylesheet" href="./css/iframe.css">
<!-- MDL -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<?php
  if(isset($_POST['submit'])) 
  {
    // Get amount of sides, n
    $n = intval($_POST['sidesInput']);
    // Get Unit Type
    $unitType = $_POST['unitTypeInput'];

    // I used the JS calculator calculator [copy HTMl] feature to make this
    // Fstring with |n| in place of $n, and |unit| in place of $unitType
    $fstring = '
    <div id="mainDiv">
      <h3>Area+Perimeter of a Regular |n|-sided Polygon</h3>
      <form id="calculateForm">
      <table>
        <tr>
          <td>
            <label for="sideLengthInput">Enter side length (|unit|): </label>
            <input type="number" step="0.001" min="0" id="sideLengthInput" name="sideLengthInput">
          </td>
          <td>
            <canvas id="polygonDisplay" width="100%" height="auto">
            </canvas>
          </td>
        </tr>
      </table>
      <button id="calcBtn" type="submit">Calculate!</button>
      </form>
      <br>
      <p>The Area is <b id="areaResult">?</b></p>
      <p>The Perimeter is <b id="periResult">?</b>
      </p><script type="text/javascript" defer="">
        function main() {
        // Elements
        // Input
        let lengthInput = document.getElementById("sideLengthInput");
        // Calculate Button
        let calcBtn = document.getElementById("calcBtn");
        // Calculate Form
        let calcForm = document.getElementById("calculateForm");
        // Canvas
        let canvas = document.getElementById("polygonDisplay");
        // Result Displays
        let areaResult = document.getElementById("areaResult");
        let periResult = document.getElementById("periResult");
  
        function Calculate() {
  
          // Get Input
          let sideLength = lengthInput.value;
  
          // Calculate Area
          let area =  |n| * (1/4) * (sideLength**2) * Math.tan((0.5 - (1 / |n|))*Math.PI);
          // Calculate Perimeter
          let peri = sideLength * |n|;
  
          // Round answers up to 2 decimal places, if needed
          if (area % 1 != 0) {
            area = area.toFixed(2);
          }
          if (peri % 1 != 0) {
            peri = peri.toFixed(2);
          }
  
          // Display Result
          areaResult.innerHTML = "" + area + "|unit|<sup>2</sup>";
          periResult.innerHTML = "" + peri + "|unit|";
          return;
        }
  
        // Connect Button Click to form validation + calculation
        calcForm.onsubmit = function() {
          Calculate();
          return false;
        }
  
        // Draw Polygon
        // Prevent Lag
        sides = Math.min(314, |n|)
        let ctx = canvas.getContext("2d");
        let centerX = canvas.width * 0.45;
        let centerY = canvas.height / 2;
        let radius = Math.min(canvas.width, canvas.height) * 0.4
  
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.lineWidth = 4;
  
        let angle = (Math.PI * 2) / sides;
        // Draw Shape
        ctx.strokeStyle = "black";
        ctx.beginPath();
        ctx.moveTo(centerX + radius, centerY);
        for (let i = 1; i <= sides; i++) {
          let vertexX = centerX + radius * Math.cos(i * angle);
          let vertexY = centerY + radius * Math.sin(i * angle);
          ctx.lineTo(vertexX, vertexY);
        }
        ctx.closePath();
        ctx.fillStyle = "white";
        ctx.fill();
        ctx.stroke();
  
        // Draw Red Line
        ctx.strokeStyle = "red";
        ctx.beginPath();
        ctx.moveTo(centerX + radius, centerY);
        ctx.lineTo(centerX + radius * Math.cos(1 * angle), centerY + radius * Math.sin(1 * angle));
        ctx.closePath();
        ctx.stroke();
  
        ctx.font = "bold 24px serif";
        ctx.fillStyle = "red";
        ctx.fillText("s", centerX + 1.1 * radius * Math.cos(0.5 * angle), centerY + 1.1 * radius * Math.sin(0.5 * angle));
  
  
        }
  
        main();
      </script>
    </div>
      ';

    $htmlCode = str_replace("|n|", "$n", $fstring);
    $htmlCode = str_replace("|unit|", "$unitType", $htmlCode);
    echo $htmlCode ;
    
    $copyCommand = "navigator.clipboard.writeText(`" . str_replace('"', "'", $htmlCode) . "`)";
    echo '<div id="snackbar" class="mdl-js-snackbar mdl-snackbar">
            <div class="mdl-snackbar__text"></div>
            <button class="mdl-snackbar__action" type="button"></button>
          </div>';
    $snackbarCommand = '
      ;document.getElementById(`snackbar`).MaterialSnackbar.showSnackbar({message: `Copied!`,
      timeout: 500,});
    ';
    // COPY HTML BUTTON
    echo '<br><button 
          class="mdl-button 
                mdl-js-button mdl-button--raised 
                mdl-js-ripple-effect mdl-button--colored"
          onclick = "'. $copyCommand . $snackbarCommand .'"
          >
          Copy HTML!
          </button>';
  }
  else {
    // Default
    echo "Calculator will be displayed here";
  }
?>