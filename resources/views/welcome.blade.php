<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
 <div class="container">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 text-center gap-4">
        <div class="bg-blue-200 col-span-1 md:col-span-2">A</div>
        <div class="bg-blue-300">B</div>
        <div class="bg-blue-400">C</div>
        <div class="bg-blue-500">D</div>
        <div class="bg-blue-600">E</div>
        <div class="bg-blue-700">F</div>
    </div>
</div>
</body>
</html>