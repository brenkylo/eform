<?php
// Create an associative array to store form data
$formData = [
  'projectName' => "Project Name",
  'customer' => "Customer",
  'audit' => true, // Initialize to false (unchecked)
  'equipmentStartup' => false, // Initialize to false (unchecked)
];

// Load an image from PNG file
$im = imagecreatefrompng('img_eform.png');

// Define the text and checkbox colors
$textColor = imagecolorallocate($im, 0, 0, 0); // Black

// Define the TrueType font file and font size
$textFont = 'font/arial.ttf'; // You should have a TrueType font file for this
$fontSize = 12;

// Customize the position and wrap text as needed
$projectnameX = 155;
$projectnameY = 230;
$customerX = 155;
$customerY = 257;
$auditX = 57;
$auditY = 375;
$equipmentStartupX = 57;
$equipmentStartupY = 400;

// Use imagettftext for text and draw checkboxes based on boolean values
foreach ($formData as $fieldName => $value) {
  if (is_bool($value)) {
      // If it's a checkbox (boolean value)
      $checkboxSize = 18;
      $checkboxColor = imagecolorallocate($im, 0, 0, 0); // Black
      $checkboxX = $fieldName === 'audit' ? $auditX : $equipmentStartupX;
      $checkboxY = $fieldName === 'audit' ? $auditY : $equipmentStartupY;

      // Draw the checkbox based on the boolean value
      if ($value) {
          imagefilledrectangle($im, $checkboxX, $checkboxY, $checkboxX + $checkboxSize, $checkboxY + $checkboxSize, $checkboxColor);
      }
  } else {
      // If it's text (not a checkbox)
      $text = $value;
      $textX = $fieldName === 'projectName' ? $projectnameX : $customerX;
      $textY = $fieldName === 'projectName' ? $projectnameY : $customerY;

      // Customize the position and wrap text as needed
      if ($fieldName === 'projectName') {
          $text = wordwrap($text, 20, "\n", true);
      }

      // Draw the text using imagettftext
      imagettftext($im, $fontSize, 0, $textX, $textY, $textColor, $textFont, $text);
  }
}

// Set the content type to be displayed as an image
header('Content-type: image/png');

// Output the image to the browser
imagepng($im);

// Clean up (destroy the image resource)
imagedestroy($im);

?>
