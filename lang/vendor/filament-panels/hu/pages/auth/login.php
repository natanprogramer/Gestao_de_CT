<?php

return [

    'title' => 'Bejelentkezés',

    'heading' => 'Bejelentkezés a fiókba',

    'actions' => [

        'register' => [
            'before' => 'vagy',
            'label' => 'regisztrálj egy fiókot',
        ],

        'request_password_reset' => [
            'label' => 'Elfelejtetted a jelszavad?',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Email cím',
        ],

        'password' => [
            'label' => 'Jelszó',
        ],

        'remember' => [
            'label' => 'Emlékezz rám',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'Bejelentkezés',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'Hibás email cím vagy jelszó.',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Túl sok próbálkozás',
            'body' => 'Kérjük, próbálja meg újra :second másodperc múlva.',
        ],

    ],

];
