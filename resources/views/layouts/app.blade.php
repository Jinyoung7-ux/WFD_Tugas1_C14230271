<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas1_WFD_C14230271</title>
    @vite('../../resources/css/app.css')
</head>

<body class="bg-gray-700 overflow-x-hidden">
    <div class="container">
        <div>
            <div class="w-screen h-24 text-white flex items-center justify-center">
                  @include('layouts.header')
            </div>

            <div class="content flex flex-col items-center justify-center mt-5 sm:grid-cols-2 xl:grid-cols-3 gap-3 px-4 py-3">
                  @yield('content')
            </div>
        </div>
    </div>
</body>
</html>