<?php
// Create a new image with transparent background
$size = 512;
$image = imagecreatetruecolor($size, $size);

// Define colors
$bgColor = imagecolorallocate($image, 14, 116, 144); // #0e7490
$white = imagecolorallocate($image, 255, 255, 255);
$transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);

// Fill background with transparent
imagefill($image, 0, 0, $transparent);
imagesavealpha($image, true);

// Draw outer diamond
$points = [
    $size/2, $size/4,           // Top
    $size*3/4, $size/2,          // Right
    $size/2, $size*3/4,          // Bottom
    $size/4, $size/2             // Left
];
imagefilledpolygon($image, $points, 4, $white);

// Draw inner diamond
$innerSize = $size/4;
$innerPoints = [
    $size/2, $size/2 - $innerSize/2,
    $size/2 + $innerSize/2, $size/2,
    $size/2, $size/2 + $innerSize/2,
    $size/2 - $innerSize/2, $size/2
];
imagefilledpolygon($image, $innerPoints, 4, $bgColor);

// Function to save in different sizes
function saveFavicon($image, $size, $filename) {
    $resized = imagescale($image, $size, $size);
    if ($size === 32) {
        imagepng($resized, $filename . '.png');
        // Convert to ICO for favicon.ico
        $ico = new Imagick();
        $ico->setFormat('ico');
        $ico->readImageBlob(file_get_contents($filename . '.png'));
        file_put_contents('favicon.ico', $ico);
    } else {
        imagepng($resized, $filename . '.png');
    }
    imagedestroy($resized);
}

// Save in different sizes
saveFavicon($image, 32, 'favicon-32x32');
saveFavicon($image, 16, 'favicon-16x16');
saveFavicon($image, 180, 'apple-touch-icon');

// Create site.webmanifest
$manifest = [
    'name' => 'Dashboard Kinerja',
    'short_name' => 'Kinerja',
    'icons' => [
        [
            'src' => '/android-chrome-192x192.png',
            'sizes' => '192x192',
            'type' => 'image/png'
        ],
        [
            'src' => '/android-chrome-512x512.png',
            'sizes' => '512x512',
            'type' => 'image/png'
        ]
    ],
    'theme_color' => '#0e7490',
    'background_color' => '#ffffff',
    'display' => 'standalone'
];

file_put_contents('site.webmanifest', json_encode($manifest, JSON_PRETTY_PRINT));

// Clean up
imagedestroy($image);

echo "Favicon files generated successfully!";
?>
