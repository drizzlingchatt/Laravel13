<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('demo.about.title') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f8fb; color: #1f2937; }
        .container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
        nav a { margin-right: 1rem; color: #2563eb; text-decoration: none; font-weight: 600; }
        .locale-switch { margin-top: 0.75rem; }
        .locale-switch a { margin-right: 0.75rem; font-size: 0.9rem; color: #4b5563; text-decoration: none; }
        .locale-switch a.active { font-weight: 700; color: #111827; text-decoration: underline; }
        .card { margin-top: 1.5rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ __('demo.about.heading') }}</h1>
    <nav>
        <a href="{{ route('demo.home') }}">{{ __('demo.nav.home') }}</a>
        <a href="{{ route('demo.about') }}">{{ __('demo.nav.about') }}</a>
        <a href="{{ route('demo.services') }}">{{ __('demo.nav.services') }}</a>
        <a href="{{ route('demo.contact') }}">{{ __('demo.nav.contact') }}</a>
        <a href="{{ route('demo.ai') }}">{{ __('demo.nav.ai') }}</a>
    </nav>

    <div class="locale-switch">
        @foreach (config('app.supported_locales', []) as $code => $label)
            <a href="{{ route('locale.switch', ['locale' => $code]) }}" class="{{ app()->getLocale() === $code ? 'active' : '' }}">{{ $label }}</a>
        @endforeach
    </div>

    <div class="card">
        <p>{{ __('demo.about.body_1') }}</p>
        <p>{{ __('demo.about.body_2') }}</p>
    </div>
</div>
</body>
</html>
