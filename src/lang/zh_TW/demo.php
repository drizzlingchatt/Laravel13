<?php

return [
    'nav' => [
        'home' => '首頁',
        'about' => '關於',
        'services' => '服務',
        'contact' => '聯絡',
        'ai' => 'AI 示範',
    ],
    'home' => [
        'title' => '示範首頁',
        'heading' => 'Laravel 示範頁面',
        'welcome_title' => '歡迎',
        'welcome_text' => '這是執行於 Docker 中 Laravel 13 的示範首頁。',
    ],
    'about' => [
        'title' => '關於示範',
        'heading' => '關於此示範',
        'body_1' => '此頁面示範 Blade 渲染與路由導覽。',
        'body_2' => '技術堆疊：Laravel 13、MySQL、MongoDB、Redis 與 Docker。',
    ],
    'services' => [
        'title' => '服務示範',
        'heading' => '示範服務',
        'item_1' => '使用 Laravel 的網站開發',
        'item_2' => 'REST API 開發',
        'item_3' => '資料庫整合（MySQL + MongoDB）',
        'item_4' => '使用 Redis 的快取與佇列設定',
    ],
    'contact' => [
        'title' => '聯絡示範',
        'heading' => '聯絡示範',
        'email' => '電子郵件',
        'phone' => '電話',
        'address' => '地址',
        'address_value' => '馬來西亞吉隆坡',
    ],
    'ai' => [
        'title' => 'AI 示範',
        'heading' => 'AI 示範',
        'intro' => '請輸入提示詞，測試 Laravel AI SDK 與 Gemini。',
        'missing_key_notice' => 'Gemini 尚未設定。請在 src/.env 加入 GEMINI_API_KEY 以啟用即時回應。',
        'success_notice' => 'Gemini 已成功回傳回應。',
        'prompt_label' => '提示詞',
        'prompt_placeholder' => '範例：請規劃一個 3 天吉隆坡旅遊行程。',
        'submit_button' => '詢問 Gemini',
        'response_title' => '回應',
        'history_title' => '最近的 AI 請求',
        'history_empty' => '目前尚未有 AI 請求紀錄。',
        'config_error' => '測試 AI 示範頁面前，請先在 src/.env 設定 GEMINI_API_KEY。',
        'table' => [
            'time' => '時間',
            'provider' => '供應商',
            'status' => '狀態',
            'prompt' => '提示詞',
        ],
    ],
];
