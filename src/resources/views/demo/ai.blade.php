<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f8fb; color: #1f2937; }
        .container { max-width: 900px; margin: 0 auto; padding: 2rem 1rem; }
        nav a { margin-right: 1rem; color: #2563eb; text-decoration: none; font-weight: 600; }
        .card { margin-top: 1.5rem; background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; padding: 1.25rem; }
        .notice { margin-top: 1rem; padding: 0.9rem 1rem; border-radius: 8px; }
        .notice.warn { background: #fff7ed; border: 1px solid #fdba74; color: #9a3412; }
        .notice.ok { background: #ecfdf5; border: 1px solid #86efac; color: #166534; }
        .notice.error { background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; }
        textarea { width: 100%; min-height: 150px; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font: inherit; box-sizing: border-box; }
        button { margin-top: 1rem; background: #2563eb; color: #fff; border: 0; border-radius: 8px; padding: 0.75rem 1rem; cursor: pointer; font-weight: 600; }
        button:hover { background: #1d4ed8; }
        .label { display: block; margin-bottom: 0.5rem; font-weight: 700; }
        .answer { white-space: pre-wrap; line-height: 1.55; }
    </style>
</head>
<body>
<div class="container">
    <h1>AI Demo</h1>
    <nav>
        <a href="{{ route('demo.home') }}">Home</a>
        <a href="{{ route('demo.about') }}">About</a>
        <a href="{{ route('demo.services') }}">Services</a>
        <a href="{{ route('demo.contact') }}">Contact</a>
        <a href="{{ route('demo.ai') }}">AI Demo</a>
    </nav>

    <div class="card">
        <p>Test the Laravel AI SDK with Gemini by entering a prompt below.</p>

        @if (! $hasGeminiKey)
            <div class="notice warn">
                Gemini is not configured yet. Add <code>GEMINI_API_KEY</code> to <code>src/.env</code> to enable live responses.
            </div>
        @endif

        @if ($errors->any())
            <div class="notice error">
                {{ $errors->first('prompt') }}
            </div>
        @endif

        @if ($configError)
            <div class="notice error">
                {{ $configError }}
            </div>
        @endif

        @if ($answer)
            <div class="notice ok">
                Gemini returned a response successfully.
            </div>
        @endif

        <form method="POST" action="{{ route('demo.ai.store') }}">
            @csrf
            <label class="label" for="prompt">Prompt</label>
            <textarea id="prompt" name="prompt" placeholder="Example: Write a 3-day Kuala Lumpur travel plan.">{{ old('prompt', $prompt) }}</textarea>
            <button type="submit">Ask Gemini</button>
        </form>
    </div>

    @if ($answer)
        <div class="card">
            <h2>Response</h2>
            <div class="answer">{{ $answer }}</div>
        </div>
    @endif

    <div class="card">
        <h2>Recent AI Requests</h2>

        @if ($history->isEmpty())
            <p>No AI requests have been recorded yet.</p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th style="text-align: left; border-bottom: 1px solid #e5e7eb; padding: 0.5rem;">Time</th>
                        <th style="text-align: left; border-bottom: 1px solid #e5e7eb; padding: 0.5rem;">Provider</th>
                        <th style="text-align: left; border-bottom: 1px solid #e5e7eb; padding: 0.5rem;">Status</th>
                        <th style="text-align: left; border-bottom: 1px solid #e5e7eb; padding: 0.5rem;">Prompt</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($history as $item)
                        <tr>
                            <td style="vertical-align: top; border-bottom: 1px solid #f3f4f6; padding: 0.5rem;">{{ $item->created_at?->format('Y-m-d H:i:s') }}</td>
                            <td style="vertical-align: top; border-bottom: 1px solid #f3f4f6; padding: 0.5rem;">{{ $item->provider }}</td>
                            <td style="vertical-align: top; border-bottom: 1px solid #f3f4f6; padding: 0.5rem;">{{ $item->status }}</td>
                            <td style="vertical-align: top; border-bottom: 1px solid #f3f4f6; padding: 0.5rem;">{{ $item->prompt }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
</body>
</html>
