<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoAiPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_locale_can_be_switched_to_japanese(): void
    {
        $switchResponse = $this->withHeader('referer', '/demo/ai')->get('/locale/ja');

        $switchResponse->assertRedirect('/demo/ai');
        $this->assertSame('ja', session('locale'));

        $page = $this->withSession(['locale' => 'ja'])->get('/demo/ai');

        $page->assertOk();
        $page->assertSee('AI デモ');
        $page->assertSee('Gemini に質問');
    }

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
