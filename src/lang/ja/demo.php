<?php

return [
    'nav' => [
        'home' => 'ホーム',
        'about' => '概要',
        'services' => 'サービス',
        'contact' => 'お問い合わせ',
        'ai' => 'AI デモ',
    ],
    'home' => [
        'title' => 'デモホーム',
        'heading' => 'Laravel デモページ',
        'welcome_title' => 'ようこそ',
        'welcome_text' => 'これは Docker 上で動作する Laravel 13 のデモランディングページです。',
    ],
    'about' => [
        'title' => 'デモについて',
        'heading' => 'このデモについて',
        'body_1' => 'このページは Blade のレンダリングとルーティング遷移を示します。',
        'body_2' => '構成: Laravel 13、MySQL、MongoDB、Redis、Docker。',
    ],
    'services' => [
        'title' => 'サービスデモ',
        'heading' => 'デモサービス',
        'item_1' => 'Laravel を使った Web 開発',
        'item_2' => 'REST API 開発',
        'item_3' => 'データベース連携（MySQL + MongoDB）',
        'item_4' => 'Redis によるキャッシュとキュー設定',
    ],
    'contact' => [
        'title' => 'お問い合わせデモ',
        'heading' => 'お問い合わせデモ',
        'email' => 'メール',
        'phone' => '電話',
        'address' => '住所',
        'address_value' => 'マレーシア、クアラルンプール',
    ],
    'ai' => [
        'title' => 'AI デモ',
        'heading' => 'AI デモ',
        'intro' => '以下にプロンプトを入力して、Gemini と Laravel AI SDK を試してください。',
        'missing_key_notice' => 'Gemini はまだ設定されていません。src/.env に GEMINI_API_KEY を追加してください。',
        'success_notice' => 'Gemini からの応答を正常に受信しました。',
        'prompt_label' => 'プロンプト',
        'prompt_placeholder' => '例: クアラルンプール3日間の旅行プランを書いてください。',
        'submit_button' => 'Gemini に質問',
        'response_title' => '応答',
        'history_title' => '最近の AI リクエスト',
        'history_empty' => 'まだ AI リクエストは記録されていません。',
        'config_error' => 'AI デモページを試す前に、src/.env で GEMINI_API_KEY を設定してください。',
        'table' => [
            'time' => '時刻',
            'provider' => 'プロバイダー',
            'status' => 'ステータス',
            'prompt' => 'プロンプト',
        ],
    ],
];
