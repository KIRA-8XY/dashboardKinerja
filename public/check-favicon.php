<?php
header('Content-Type: text/plain');

echo "Checking favicon files in: " . __DIR__ . "\n\n";

$files = [
    'favicon.ico',
    'favicon.png',
    'favicon.svg',
    'site.webmanifest'
];

foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    echo "Checking: $file - ";
    if (file_exists($path)) {
        echo "EXISTS - " . filesize($path) . " bytes - ";
        echo is_readable($path) ? "READABLE" : "NOT READABLE";
    } else {
        echo "NOT FOUND";
    }
    echo "\n";
}

echo "\nTesting asset URLs (relative to public directory):\n";
echo "favicon.ico: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/favicon.ico\n";
echo "favicon.png: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/favicon.png\n";
echo "favicon.svg: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/favicon.svg\n";
?>
