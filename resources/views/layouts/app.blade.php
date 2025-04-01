<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('../../resources/css/app.css')
</head>

<body class="bg-gray-700">
    <div class="container">
        <div>
            <div class="w-screen h-24 text-white flex items-center justify-center">
                  @include('layouts.header')
            </div>

            <div class="content flex flex-col items-center justify-center mt-5">
                  @yield('content')
            </div>
        </div>
    </div>
</body>
</html>