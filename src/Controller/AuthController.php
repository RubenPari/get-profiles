<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;

class AuthController extends AppController
{
    public function login()
    {
        $url = env('BASE_URL') . '/oauth/authorize'
            . '?client_id=' . env('CLIENT_ID')
            . '&redirect_uri=' . env('REDIRECT_URI')
            . '&response_type=code'
            . '&scope=' . env('SCOPE');

        $this->redirect($url);
    }

    public function callback()
    {
        $code = $this->request->getQuery('code');

        $url = env('BASE_URL') . '/oauth/access_token';

        $data = [
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => env('REDIRECT_URI'),
            'code' => $code,
        ];

        $http = new Client();

        $response = $http->post($url, $data);

        // save token in session
        $this->request->getSession()->write('token', $response->getJson()['access_token']);

        $this->set([
            'data' => $response->getJson(),
        ]);
    }
}
