<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dish</title>
    <style>
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        src: url({{ asset('fonts/Roboto-Regular.ttf') }});
        }
        @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: bold;
        src: url({{ asset('fonts/Roboto-Bold.ttf') }});
        }
        body {
            font-family:'Roboto';
        }
    </style>
</head>
<body>
<h1>
    
    {{$menu->title}} 
    <hr>
</h1>
  Price:  {{$menu->price}}Eur
    weight: {{$menu->weight}}g.
    of which is meat  {{$menu->meat}}g.
    <br>
    {!!$menu->about!!}

</body>
</html>