<?php

return [
    'nav' => [
        'home' => 'Accueil',
        'about' => 'A propos',
        'services' => 'Services',
        'contact' => 'Contact',
        'ai' => 'Demo IA',
    ],
    'home' => [
        'title' => 'Accueil Demo',
        'heading' => 'Pages de Demo Laravel',
        'welcome_title' => 'Bienvenue',
        'welcome_text' => 'Ceci est une page de demonstration executee sur Laravel 13 dans Docker.',
    ],
    'about' => [
        'title' => 'A propos de la Demo',
        'heading' => 'A propos de cette Demo',
        'body_1' => 'Cette page montre le rendu Blade et la navigation par routes.',
        'body_2' => 'Stack: Laravel 13, MySQL, MongoDB, Redis et Docker.',
    ],
    'services' => [
        'title' => 'Demo des Services',
        'heading' => 'Services de Demo',
        'item_1' => 'Developpement web avec Laravel',
        'item_2' => 'Developpement d\'API REST',
        'item_3' => 'Integrations de base de donnees (MySQL + MongoDB)',
        'item_4' => 'Configuration du cache et des files avec Redis',
    ],
    'contact' => [
        'title' => 'Demo Contact',
        'heading' => 'Demo Contact',
        'email' => 'E-mail',
        'phone' => 'Telephone',
        'address' => 'Adresse',
        'address_value' => 'Kuala Lumpur, Malaisie',
    ],
    'ai' => [
        'title' => 'Demo IA',
        'heading' => 'Demo IA',
        'intro' => 'Testez le SDK IA Laravel avec Gemini en saisissant un prompt ci-dessous.',
        'missing_key_notice' => 'Gemini n\'est pas encore configure. Ajoutez GEMINI_API_KEY dans src/.env pour activer les reponses en direct.',
        'success_notice' => 'Gemini a renvoye une reponse avec succes.',
        'prompt_label' => 'Prompt',
        'prompt_placeholder' => 'Exemple: Redige un plan de voyage de 3 jours a Kuala Lumpur.',
        'submit_button' => 'Demander a Gemini',
        'response_title' => 'Reponse',
        'history_title' => 'Requetes IA Recentes',
        'history_empty' => 'Aucune requete IA n\'a encore ete enregistree.',
        'config_error' => 'Definissez GEMINI_API_KEY dans src/.env avant de tester la page de demo IA.',
        'table' => [
            'time' => 'Heure',
            'provider' => 'Fournisseur',
            'status' => 'Statut',
            'prompt' => 'Prompt',
        ],
    ],
];
