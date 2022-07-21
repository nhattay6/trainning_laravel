<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\EmailTakenException;
use App\Models\OAuthProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        config([
            'services.github.redirect' => route('oauth.callback', 'github'),
        ]);
    }

    /**
     * Redirect the user to the provider authentication page.
     */
    public function handleRedirect(string $provider)
    {   
        // return response()->json([
        //     'url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
        // ]);

        //2
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     */
    public function handleCallback(string $provider)
    {
        $user = Socialite::driver($provider)->user();
        $user = $this->findOrCreateUser($provider, $user);

        $this->guard()->setToken(
            $token = $this->guard()->login($user)
        );

        return view('oauth/callback', [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->getPayload()->get('exp') - time(),
        ]);
    }

    /**
     * Find or create a user.
     */
    protected function findOrCreateUser(string $provider, SocialiteUser $sUser): User
    {
        $userExisted = OAuthProvider::where('provider', $provider)
            ->where('provider_user_id', $sUser->getId())
            // ->where('provider_user_id', $provider)
            ->first();

        if ($userExisted) {
            $userExisted->update([
                'access_token' => $sUser->token,
                'refresh_token' => $sUser->refreshToken,
            ]);

            return $userExisted->sUser;
        }

        if (User::where('email', $sUser->getEmail())->exists()) {
            throw new EmailTakenException;
        }

        return $this->createUser($provider, $sUser);
    }

    /**
     * Create a new user.
     */
    protected function createUser(string $provider, SocialiteUser $sUser): User
    {
        $newUser = User::create([
            'name' => $sUser->getName(),
            'email' => $sUser->getEmail(),
            'email_verified_at' => now(),
        ]);

        $newUser->oauthProviders()->create([
            'provider' => $provider,
            'provider_user_id' => $sUser->getId(),
            'access_token' => $sUser->token,
            'refresh_token' => $sUser->refreshToken,
        ]);

        return $newUser;
    }
}
