<?php
// Load an image from PNG file
$im = imagecreatefrompng('img_eform.png');

// Define the text and checkbox colors
$textColor = imagecolorallocate($im, 0, 0, 0); // Black

// Define the TrueType font file and font size
$textFont = 'font/arial.ttf'; // You should have a TrueType font file for this
$fontSize = 12;

// Define the project name and customer to display
$projectname = "Project Name";
$customer = "Customer";

// Customize the position of the project name
$projectnameX = 155; // Adjust the X-coordinate as needed
$projectnameY = 230; // Adjust the Y-coordinate as needed

// Customize the position of the customer
$customerX = 155; // Adjust the X-coordinate as needed
$customerY = 257; // Adjust the Y-coordinate as needed

// Wrap the project name to a maximum width (adjust as needed)
$projectname = wordwrap($projectname, 20, "\n", true);

// Using imagettftext function (TrueType text) for project name
imagettftext($im, $fontSize, 0, $projectnameX, $projectnameY, $textColor, $textFont, $projectname);

// Using imagettftext function (TrueType text) for customer
imagettftext($im, $fontSize, 0, $customerX, $customerY, $textColor, $textFont, $customer);

// Define checkbox coordinates for "audit"
$auditX = 57;
$auditY = 375; // Adjust the Y-coordinate as needed
$checkboxSize = 18;

// Draw the "audit" checkbox
$checkboxColor = imagecolorallocate($im, 0, 0, 0); // Black
imagefilledrectangle($im, $auditX, $auditY, $auditX + $checkboxSize, $auditY + $checkboxSize, $checkboxColor);

// Define coordinates for "equipment_startup"
$equipmentStartupX = 57; // Adjust the X-coordinate as needed
$equipmentStartupY = 400; // Adjust the Y-coordinate as needed

// Draw the "equipment_startup" checkbox
imagefilledrectangle($im, $equipmentStartupX, $equipmentStartupY, $equipmentStartupX + $checkboxSize, $equipmentStartupY + $checkboxSize, $checkboxColor);

// Set the content type to be displayed as an image
header('Content-type: image/png');

// Output the image to the browser
imagepng($im);

// Clean up (destroy the image resource)
imagedestroy($im);

?>
