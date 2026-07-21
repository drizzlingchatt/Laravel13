<?php

return [
    'nav' => [
        'home' => 'Inicio',
        'about' => 'Acerca de',
        'services' => 'Servicios',
        'contact' => 'Contacto',
        'ai' => 'Demo de IA',
    ],
    'home' => [
        'title' => 'Inicio de Demo',
        'heading' => 'Paginas de Demo de Laravel',
        'welcome_title' => 'Bienvenido',
        'welcome_text' => 'Esta es una pagina de inicio de demostracion ejecutandose en Laravel 13 dentro de Docker.',
    ],
    'about' => [
        'title' => 'Acerca de la Demo',
        'heading' => 'Acerca de Esta Demo',
        'body_1' => 'Esta pagina demuestra el renderizado con Blade y la navegacion por rutas.',
        'body_2' => 'Stack: Laravel 13, MySQL, MongoDB, Redis y Docker.',
    ],
    'services' => [
        'title' => 'Demo de Servicios',
        'heading' => 'Servicios de Demo',
        'item_1' => 'Desarrollo web con Laravel',
        'item_2' => 'Desarrollo de API REST',
        'item_3' => 'Integraciones de base de datos (MySQL + MongoDB)',
        'item_4' => 'Configuracion de cache y colas con Redis',
    ],
    'contact' => [
        'title' => 'Demo de Contacto',
        'heading' => 'Demo de Contacto',
        'email' => 'Correo',
        'phone' => 'Telefono',
        'address' => 'Direccion',
        'address_value' => 'Kuala Lumpur, Malasia',
    ],
    'ai' => [
        'title' => 'Demo de IA',
        'heading' => 'Demo de IA',
        'intro' => 'Prueba Laravel AI SDK con Gemini ingresando un prompt abajo.',
        'missing_key_notice' => 'Gemini aun no esta configurado. Agrega GEMINI_API_KEY en src/.env para habilitar respuestas en vivo.',
        'success_notice' => 'Gemini devolvio una respuesta correctamente.',
        'prompt_label' => 'Prompt',
        'prompt_placeholder' => 'Ejemplo: Escribe un plan de viaje de 3 dias para Kuala Lumpur.',
        'submit_button' => 'Preguntar a Gemini',
        'response_title' => 'Respuesta',
        'history_title' => 'Solicitudes Recientes de IA',
        'history_empty' => 'Todavia no se han registrado solicitudes de IA.',
        'config_error' => 'Configura GEMINI_API_KEY en src/.env antes de probar la pagina de demo de IA.',
        'table' => [
            'time' => 'Hora',
            'provider' => 'Proveedor',
            'status' => 'Estado',
            'prompt' => 'Prompt',
        ],
    ],
];
