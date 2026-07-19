<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoAiPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_ai_demo_page_renders(): void
    {
        $response = $this->get('/demo/ai');

        $response->assertOk();
        $response->assertSee('AI Demo');
        $response->assertSee('Ask Gemini');
    }

    public function test_ai_demo_requires_a_gemini_key_for_live_requests(): void
    {
        config()->set('ai.providers.gemini.key', null);

        $response = $this->withSession(['_token' => 'test-token'])->post('/demo/ai', [
            '_token' => 'test-token',
            'prompt' => 'Say hello',
        ]);

        $response->assertStatus(422);
        $response->assertSee('Set GEMINI_API_KEY in src/.env before testing the AI demo page.');
        $this->assertDatabaseHas('ai_requests', [
            'provider' => 'gemini',
            'prompt' => 'Say hello',
            'status' => 'config_error',
        ]);
    }
}
