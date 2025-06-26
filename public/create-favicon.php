<?php
// Create a simple favicon.ico using GD
$size = 32;
$image = imagecreatetruecolor($size, $size);

// Define colors
$bg = imagecolorallocate($image, 14, 116, 144); // #0e7490
$white = imagecolorallocate($image, 255, 255, 255);

// Fill background
imagefill($image, 0, 0, $bg);

// Draw a simple diamond shape
$points = [
    16, 8,   // Top
    24, 16,  // Right
    16, 24,  // Bottom
    8, 16,   // Left
    16, 8    // Back to top
];
imagefilledpolygon($image, $points, 5, $white);

// Draw inner diamond
$innerPoints = [
    16, 11,
    19, 16,
    16, 21,
    13, 16,
    16, 11
];
imagefilledpolygon($image, $innerPoints, 5, $bg);

// Save as favicon.ico
imagepng($image, 'favicon.png');

// Create a simple site.webmanifest
$manifest = [
    'name' => 'Dashboard Kinerja',
    'short_name' => 'Kinerja',
    'theme_color' => '#0e7490',
    'background_color' => '#ffffff',
    'display' => 'standalone'
];

file_put_contents('site.webmanifest', json_encode($manifest, JSON_PRETTY_PRINT));

// Create a simple SVG favicon
$svg = '<?xml version="1.0" encoding="UTF-8"?>
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect width="32" height="32" rx="6" fill="#0e7490"/>
  <path d="M16 8L24 16L16 24L8 16L16 8Z" fill="white"/>
  <path d="M16 11L13 16L16 21L19 16L16 11Z" fill="#0e7490"/>
  <path d="M11 16L16 13L21 16L16 19L11 16Z" fill="#0e7490"/>
</svg>';

file_put_contents('favicon.svg', $svg);

echo "Favicon files created successfully!\n";
?>
