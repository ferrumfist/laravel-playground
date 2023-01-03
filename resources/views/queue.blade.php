<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Queue</title>
</head>
<body class="antialiased">
<form method="post">
    @csrf
    <div>
        <button type="submit" value="">Create queue</button>
    </div>
</form>
</body>
</html>
