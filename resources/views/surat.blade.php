<!DOCTYPE html>
<html>
<head>
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }
        #pdf-viewer {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            overflow: scroll;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        canvas {
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>

    <h1>Surat Pernyataan</h1>

    <!-- PDF Viewer -->
    <div id="pdf-viewer"></div>

    <!-- Tombol Download PDF -->
    <a href="{{ url('/surat/download-pdf') }}" class="btn">Download sebagai PDF</a>

    <!-- Script PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        var pdfUrl = '{{ url("/surat/download-pdf") }}';
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

        // Load PDF document
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            var viewer = document.getElementById('pdf-viewer');

            // Loop through each page
            for (var pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });

                    // Create canvas for each page
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    viewer.appendChild(canvas);

                    // Render page
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            }
        });
    </script>
</body>
</html>
