<?php
// Create a 32x32 image
$im = imagecreatetruecolor(32, 32);

// Colors
$bg = imagecolorallocate($im, 14, 116, 144); // #0e7490
$white = imagecolorallocate($im, 255, 255, 255);

// Fill background
imagefill($im, 0, 0, $bg);

// Draw outer diamond
$points = [
    16, 8,   // Top
    24, 16,  // Right
    16, 24,  // Bottom
    8, 16,   // Left
    16, 8    // Back to top
];
imagefilledpolygon($im, $points, 5, $white);

// Draw inner diamond
$innerPoints = [
    16, 11,
    19, 16,
    16, 21,
    13, 16,
    16, 11
];
imagefilledpolygon($im, $innerPoints, 5, $bg);

// Save as favicon.ico
imagepng($im, 'favicon-new.ico');

// Create a simple SVG favicon
$svg = '<?xml version="1.0" encoding="UTF-8"?>
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect width="32" height="32" rx="6" fill="#0e7490"/>
  <path d="M16 8L24 16L16 24L8 16L16 8Z" fill="white"/>
  <path d="M16 11L13 16L16 21L19 16L16 11Z" fill="#0e7490"/>
  <path d="M11 16L16 13L21 16L16 19L11 16Z" fill="#0e7490"/>
</svg>';

file_put_contents('favicon-new.svg', $svg);

// Create a simple PNG favicon
imagepng($im, 'favicon-new.png');

// Create manifest
$manifest = [
    'name' => 'Dashboard Kinerja',
    'short_name' => 'Kinerja',
    'icons' => [
        [
            'src' => '/favicon-new.png',
            'sizes' => '32x32',
            'type' => 'image/png'
        ]
    ],
    'theme_color' => '#0e7490',
    'background_color' => '#ffffff',
    'display' => 'standalone'
];

file_put_contents('site-new.webmanifest', json_encode($manifest, JSON_PRETTY_PRINT));

echo "New favicon files created successfully!\n";
?>
