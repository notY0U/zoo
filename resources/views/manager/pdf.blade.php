
<!DOCTYPE html>
<html>
    <head>
        {{-- <meta charset="UTF-8"> --}}
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> --}}
    <title>Autorius</title>
    <style>
         @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: url({{ asset('fonts/Roboto-Regular.ttf') }});

        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap'); */
        </style>

</head>
<body>
    
    <h1>
        {{$manager->name}}
        {{$manager->surname}}
    </h1>
</body>
</html>