<?php

namespace App\Http\Controllers;

use App\Models\AiRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Laravel\Ai\Enums\Lab;

use function Laravel\Ai\agent;

class DemoAiController extends Controller
{
    public function show(): View
    {
        return view('demo.ai', [
            'answer' => null,
            'configError' => null,
            'hasGeminiKey' => filled(config('ai.providers.gemini.key')),
            'history' => AiRequest::query()->latest()->limit(10)->get(),
            'prompt' => '',
        ]);
    }

    public function store(Request $request): View|Response
    {
        $validated = $request->validate([
            'prompt' => ['required', 'string', 'max:4000'],
        ]);

        $aiRequest = AiRequest::create([
            'provider' => Lab::Gemini->value,
            'model' => null,
            'prompt' => $validated['prompt'],
            'status' => 'pending',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if (! filled(config('ai.providers.gemini.key'))) {
            $aiRequest->update([
                'status' => 'config_error',
                'error_message' => 'Set GEMINI_API_KEY in src/.env before testing the AI demo page.',
            ]);

            return response()->view('demo.ai', [
                'answer' => null,
                'configError' => 'Set GEMINI_API_KEY in src/.env before testing the AI demo page.',
                'hasGeminiKey' => false,
                'history' => AiRequest::query()->latest()->limit(10)->get(),
                'prompt' => $validated['prompt'],
            ], 422);
        }

        $response = agent(
            instructions: 'You are a concise demo assistant for a Laravel application. Answer clearly and keep responses short.'
        )->prompt(
            $validated['prompt'],
            provider: Lab::Gemini,
        );

        $aiRequest->update([
            'response' => $response->text,
            'status' => 'completed',
        ]);

        return view('demo.ai', [
            'answer' => $response->text,
            'configError' => null,
            'hasGeminiKey' => true,
            'history' => AiRequest::query()->latest()->limit(10)->get(),
            'prompt' => $validated['prompt'],
        ]);
    }
}
