<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dompdf Add Custom Font Family Example - ItSolutionStuff.com</title>
    <style>
        @font-face {
            font-family: 'Croissant One';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/Croissant_One/CroissantOne-Regular.ttf") format('truetype');
        }
        body {
            font-family: 'Croissant One', sans-serif;
        }
    </style>
</head>
<body>
        {{storage_path('fonts/Croissant_One/CroissantOne-Regular.ttf');}}
    <p>Hi, I am custom font family in pdf file.
    </p>
    
</body>
</html>
