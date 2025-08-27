<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ $page['props']['title'] ?? 'Social Shop' }}</title>
    
    @vite(['resources/css/vendor/social-shop/app.css', 'resources/js/vendor/social-shop/app.js'])
    @inertiaHead
</head>
<body class="h-full bg-gray-50 font-inter antialiased">
    @inertia
</body>
</html>