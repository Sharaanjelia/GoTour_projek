<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GoTour</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-green-100 to-blue-200 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-2xl">
        <div class="flex flex-col items-center mb-6">
            <img src="/images/GoTourLogo.png" alt="GoTour Logo" class="w-16 h-16 mb-2">
            <h1 class="text-2xl font-bold text-green-700 mb-1">Masuk ke GoTour</h1>
            <p class="text-gray-500 text-sm">Silakan login untuk melanjutkan</p>
        </div>
        {{ $slot }}
    </div>
</body>
</html>
