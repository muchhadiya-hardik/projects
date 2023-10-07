<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>ddd</h2>
@foreach($images as $image)
    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
@endforeach
</body>
</html>
