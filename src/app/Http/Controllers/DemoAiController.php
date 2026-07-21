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
    private const LOCALE_LANGUAGE_MAP = [
        'en' => 'English',
        'zh_TW' => 'Traditional Chinese',
        'ja' => 'Japanese',
        'es' => 'Spanish',
        'fr' => 'French',
    ];

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

        $locale = app()->getLocale();
        $targetLanguage = self::LOCALE_LANGUAGE_MAP[$locale] ?? self::LOCALE_LANGUAGE_MAP['en'];

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
                'error_message' => __('demo.ai.config_error'),
            ]);

            return response()->view('demo.ai', [
                'answer' => null,
                'configError' => __('demo.ai.config_error'),
                'hasGeminiKey' => false,
                'history' => AiRequest::query()->latest()->limit(10)->get(),
                'prompt' => $validated['prompt'],
            ], 422);
        }

        $response = agent(
            instructions: implode(' ', [
                'You are a concise demo assistant for a Laravel application.',
                'Always respond in '.$targetLanguage.'.',
                'Keep responses clear and short.',
                'If the user explicitly requests a different language, follow the user request.',
            ])
        )->prompt(
            implode("\n", [
                'User locale: '.$locale,
                'Target response language: '.$targetLanguage,
                'User prompt: '.$validated['prompt'],
            ]),
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
