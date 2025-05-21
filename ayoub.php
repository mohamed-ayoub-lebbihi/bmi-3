<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $weight = floatval($_POST['weight']);
  $height = floatval($_POST['height']);

  if ($weight <= 0 || $height <= 0) {
    echo '<div class="alert alert-danger">Invalid values provided.</div>';
    exit;
  }

  $bmi = $weight / pow($height / 100, 2);
  $bmi = round($bmi, 2);

  if ($bmi < 18.5) {
    $status = "Underweight";
    $alert = "alert-warning";
  } elseif ($bmi < 25) {
    $status = "Normal weight";
    $alert = "alert-success";
  } elseif ($bmi < 30) {
    $status = "Overweight";
    $alert = "alert-warning";
  } else {
    $status = "Obese";
    $alert = "alert-danger";
  }

  echo "<div class='alert $alert'>
          Hi <strong>$name</strong>, your BMI is <strong>$bmi</strong> which means you're <strong>$status</strong>.
        </div>";
}
?>
