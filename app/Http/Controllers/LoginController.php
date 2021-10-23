<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('account.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $valid = $this->attemptLogin($credentials);

        if ($valid['success']) {
            $request->session()->regenerate();
            $request->session()->put('user', $valid['data']);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'error' => $valid['message'],
        ]);
    }

    public function attemptLogin(array $credentials = [])
    {
        try
        {
            $http = new \GuzzleHttp\Client;
            $response = $http->post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn', [
                'headers'=> [
                    'Content-Type'=>'application/json'
                ],
                'body' => json_encode($credentials),
                'verify' => false
            ]);

            $data = json_decode((string) $response->getBody(), true);

            return [
                'success' => true,
                'data' => $data
            ];
        }
        catch(\GuzzleHttp\Exception\ClientException $e)
        {
            $response = json_decode((string) $e->getResponse()->getBody(true));

            return [
                'success' => false,
                'message' => $response->message
            ];
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/account/login');
    }
}