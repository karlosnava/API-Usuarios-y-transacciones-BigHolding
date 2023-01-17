<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") | Carlos Rodriguez</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-10">
    <div class="w-11/12 md:w-8/12 mx-auto rounded-md p-8 bg-white">
        @yield('content')
    </div>
</body>
</html>