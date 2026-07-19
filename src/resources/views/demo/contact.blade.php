<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f8fb; color: #1f2937; }
        .container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
        nav a { margin-right: 1rem; color: #2563eb; text-decoration: none; font-weight: 600; }
        .card { margin-top: 1.5rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; }
        .line { margin: 0.5rem 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Contact Demo</h1>
    <nav>
        <a href="{{ route('demo.home') }}">Home</a>
        <a href="{{ route('demo.about') }}">About</a>
        <a href="{{ route('demo.services') }}">Services</a>
        <a href="{{ route('demo.contact') }}">Contact</a>
        <a href="{{ route('demo.ai') }}">AI Demo</a>
    </nav>

    <div class="card">
        <p class="line"><strong>Email:</strong> demo@example.com</p>
        <p class="line"><strong>Phone:</strong> +60 12-345 6789</p>
        <p class="line"><strong>Address:</strong> Kuala Lumpur, Malaysia</p>
    </div>
</div>
</body>
</html>
