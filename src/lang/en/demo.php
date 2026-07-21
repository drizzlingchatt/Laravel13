<?php

return [
    'nav' => [
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'contact' => 'Contact',
        'ai' => 'AI Demo',
    ],
    'home' => [
        'title' => 'Demo Home',
        'heading' => 'Laravel Demo Pages',
        'welcome_title' => 'Welcome',
        'welcome_text' => 'This is a demo landing page running on Laravel 13 in Docker.',
    ],
    'about' => [
        'title' => 'About Demo',
        'heading' => 'About This Demo',
        'body_1' => 'This page demonstrates Blade rendering and route navigation.',
        'body_2' => 'Stack: Laravel 13, MySQL, MongoDB, Redis, and Docker.',
    ],
    'services' => [
        'title' => 'Services Demo',
        'heading' => 'Demo Services',
        'item_1' => 'Web development with Laravel',
        'item_2' => 'REST API development',
        'item_3' => 'Database integrations (MySQL + MongoDB)',
        'item_4' => 'Caching and queue setup with Redis',
    ],
    'contact' => [
        'title' => 'Contact Demo',
        'heading' => 'Contact Demo',
        'email' => 'Email',
        'phone' => 'Phone',
        'address' => 'Address',
        'address_value' => 'Kuala Lumpur, Malaysia',
    ],
    'ai' => [
        'title' => 'AI Demo',
        'heading' => 'AI Demo',
        'intro' => 'Test the Laravel AI SDK with Gemini by entering a prompt below.',
        'missing_key_notice' => 'Gemini is not configured yet. Add GEMINI_API_KEY to src/.env to enable live responses.',
        'success_notice' => 'Gemini returned a response successfully.',
        'prompt_label' => 'Prompt',
        'prompt_placeholder' => 'Example: Write a 3-day Kuala Lumpur travel plan.',
        'submit_button' => 'Ask Gemini',
        'response_title' => 'Response',
        'history_title' => 'Recent AI Requests',
        'history_empty' => 'No AI requests have been recorded yet.',
        'config_error' => 'Set GEMINI_API_KEY in src/.env before testing the AI demo page.',
        'table' => [
            'time' => 'Time',
            'provider' => 'Provider',
            'status' => 'Status',
            'prompt' => 'Prompt',
        ],
    ],
];
