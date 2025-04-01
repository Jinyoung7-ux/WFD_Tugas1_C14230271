<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body class="bg-gray-700">
    <div class="w-3xl mx-auto px-10 py-10 mt-5 dark:bg-gray-800 rounded-lg shadow-lg ">
        @yield('content')
    </div>    
    @vite('resources/js/app.js')
  </body>
</html>