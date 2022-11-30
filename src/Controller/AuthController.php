<?php

declare(strict_types=1);

namespace App\Controller;

class AuthController extends AppController
{
    public function login()
    {
        $this->set('data', [
            'message' => 'login',
        ]);
    }

    public function callback()
    {
        $this->set('data', [
            'message' => 'callback',
        ]);
    }
}
