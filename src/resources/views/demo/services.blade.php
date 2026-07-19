<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f8fb; color: #1f2937; }
        .container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
        nav a { margin-right: 1rem; color: #2563eb; text-decoration: none; font-weight: 600; }
        .card { margin-top: 1.5rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; }
        ul { margin: 0; padding-left: 1.1rem; }
        li { margin: 0.45rem 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Demo Services</h1>
    <nav>
        <a href="{{ route('demo.home') }}">Home</a>
        <a href="{{ route('demo.about') }}">About</a>
        <a href="{{ route('demo.services') }}">Services</a>
        <a href="{{ route('demo.contact') }}">Contact</a>
    </nav>

    <div class="card">
        <ul>
            <li>Web development with Laravel</li>
            <li>REST API development</li>
            <li>Database integrations (MySQL + MongoDB)</li>
            <li>Caching and queue setup with Redis</li>
        </ul>
    </div>
</div>
</body>
</html>
