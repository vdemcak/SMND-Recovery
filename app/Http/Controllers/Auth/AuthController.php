<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('azure')->setScopes(["email", "openid", "profile", "User.Read"])->redirect();
    }

    public function callback()
    {
        $azureUser = Socialite::driver('azure')->user();

        $idToken = json_decode(base64_decode(explode('.', $azureUser->accessTokenResponseBody['id_token'])[1]));

        $client = new GuzzleClient();
        $photoResponse = $client->request('GET', 'https://graph.microsoft.com/v1.0/users/' . $azureUser->email . '/photo/$value', [
            'headers' => [
                'Authorization' => 'Bearer ' . $azureUser->token,
            ]
        ]);

        $user = User::updateOrCreate(
            ['azure_id' => $azureUser->id],
            [
                'azure_id' => $azureUser->id,
                'name' => $azureUser->name,
                'email' => $azureUser->email,
                'photo' => 'data:image/png;base64,' . base64_encode($photoResponse->getBody()->getContents()),
                'is_teacher' => in_array(config('services.azure.teacher_role'), $idToken->groups) || $azureUser->id === '91e34faa-04c2-4c76-8141-510f73d31ab6'
            ]
        );

        Auth::login($user, true);

        return redirect('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
