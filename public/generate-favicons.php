<?php
// This script generates all favicon files from the SVG source
// Run this script once after deployment or when changing the favicon

// Create a simple HTML page to generate favicons
$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Favicon Generator</title>
    <script src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.17/pwacompat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html-to-image/1.11.11/html-to-image.min.js"></script>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        #preview { margin: 20px 0; display: flex; gap: 20px; flex-wrap: wrap; }
        .preview-item { text-align: center; margin-bottom: 20px; }
        .preview-item img { border: 1px solid #ddd; border-radius: 4px; }
        button {
            background: #0e7490;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
        }
        button:hover { background: #0c5a6e; }
    </style>
</head>
<body>
    <h1>Favicon Generator</h1>
    <p>This page will help you generate all necessary favicon files.</p>
    
    <div id="preview">
        <div class="preview-item">
            <h3>Original SVG</h3>
            <img src="favicon.svg" width="64" height="64" id="svg-preview">
        </div>
        <div class="preview-item">
            <h3>ICO (32x32)</h3>
            <canvas id="ico-preview" width="64" height="64" style="border: 1px solid #ddd;"></canvas>
        </div>
        <div class="preview-item">
            <h3>PNG (180x180)</h3>
            <canvas id="apple-preview" width="64" height="64" style="border: 1px solid #ddd;"></canvas>
        </div>
    </div>

    <div>
        <button id="download-all">Download All Favicon Files</button>
    </div>

    <script>
        // Load the SVG into canvases
        window.onload = function() {
            const svgImg = document.getElementById('svg-preview');
            
            // Draw SVG to ICO canvas (32x32)
            const icoCanvas = document.getElementById('ico-preview');
            const icoCtx = icoCanvas.getContext('2d');
            icoCtx.drawImage(svgImg, 0, 0, 32, 32);
            
            // Draw SVG to Apple Touch Icon canvas (180x180)
            const appleCanvas = document.getElementById('apple-preview');
            const appleCtx = appleCanvas.getContext('2d');
            appleCtx.drawImage(svgImg, 0, 0, 180, 180);
            
            // Set up download button
            document.getElementById('download-all').addEventListener('click', downloadAll);
        };
        
        async function downloadAll() {
            // Generate ICO (favicon.ico)
            const icoCanvas = document.createElement('canvas');
            icoCanvas.width = 32;
            icoCanvas.height = 32;
            const icoCtx = icoCanvas.getContext('2d');
            const svgImg = document.getElementById('svg-preview');
            icoCtx.drawImage(svgImg, 0, 0, 32, 32);
            
            // Generate PNGs in different sizes
            const sizes = [16, 32, 180];
            for (const size of sizes) {
                const canvas = document.createElement('canvas');
                canvas.width = size;
                canvas.height = size;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(svgImg, 0, 0, size, size);
                
                const link = document.createElement('a');
                link.download = size === 180 ? 'apple-touch-icon.png' : `favicon-${size}x${size}.png`;
                link.href = canvas.toDataURL('image/png');
                link.click();
            }
            
            // Generate site.webmanifest
            const manifest = {
                "name": "Dashboard Kinerja",
                "short_name": "Kinerja",
                "icons": [
                    {
                        "src": "/android-chrome-192x192.png",
                        "sizes": "192x192",
                        "type": "image/png"
                    },
                    {
                        "src": "/android-chrome-512x512.png",
                        "sizes": "512x512",
                        "type": "image/png"
                    }
                ],
                "theme_color": "#0e7490",
                "background_color": "#ffffff",
                "display": "standalone"
            };
            
            const manifestBlob = new Blob([JSON.stringify(manifest, null, 2)], {type: 'application/json'});
            const manifestUrl = URL.createObjectURL(manifestBlob);
            
            const manifestLink = document.createElement('a');
            manifestLink.download = 'site.webmanifest';
            manifestLink.href = manifestUrl;
            document.body.appendChild(manifestLink);
            manifestLink.click();
            document.body.removeChild(manifestLink);
            
            // For ICO, we'll use a simple PNG for now
            // In a real scenario, you'd want to use a proper ICO generator library
            const icoLink = document.createElement('a');
            icoLink.download = 'favicon.ico';
            icoLink.href = icoCanvas.toDataURL('image/x-icon');
            icoLink.click();
            
            alert('All favicon files have been downloaded. Please upload them to your public directory.');
        }
    </script>
</body>
</html>
HTML;

// Output the HTML
echo $html;

// Create a simple favicon.ico as fallback
if (!file_exists('favicon.ico') && extension_loaded('imagick')) {
    try {
        $im = new Imagick();
        $im->newImage(32, 32, new ImagickPixel('transparent'));
        $draw = new ImagickDraw();
        
        // Draw a simple diamond shape as fallback
        $draw->setFillColor(new ImagickPixel('#0e7490'));
        $draw->rectangle(0, 0, 31, 31);
        $draw->setFillColor('white');
        $draw->polygon([
            ['x' => 16, 'y' => 8],
            ['x' => 24, 'y' => 16],
            ['x' => 16, 'y' => 24],
            ['x' => 8, 'y' => 16]
        ]);
        $draw->setFillColor('#0e7490');
        $draw->polygon([
            ['x' => 16, 'y' => 13],
            ['x' => 19, 'y' => 16],
            ['x' => 16, 'y' => 19],
            ['x' => 13, 'y' => 16]
        ]);
        
        $im->drawImage($draw);
        $im->setImageFormat('ico');
        $im->writeImage('favicon.ico');
    } catch (Exception $e) {
        // If Imagick fails, we'll just have the SVG
    }
}
?>
