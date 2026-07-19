<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f8fb; color: #1f2937; }
        .container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
        nav a { margin-right: 1rem; color: #2563eb; text-decoration: none; font-weight: 600; }
        .card { margin-top: 1.5rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; }
    </style>
</head>
<body>
<div class="container">
    <h1>About This Demo</h1>
    <nav>
        <a href="{{ route('demo.home') }}">Home</a>
        <a href="{{ route('demo.about') }}">About</a>
        <a href="{{ route('demo.services') }}">Services</a>
        <a href="{{ route('demo.contact') }}">Contact</a>
    </nav>

    <div class="card">
        <p>This page demonstrates Blade rendering and route navigation.</p>
        <p>Stack: Laravel 13, MySQL, MongoDB, Redis, and Docker.</p>
    </div>
</div>
</body>
</html>
