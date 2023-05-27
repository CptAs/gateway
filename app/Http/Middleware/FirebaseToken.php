<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if(!$token) {
            echo 'fail - no token';
            abort(403);
        }
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/integracja-2d7f6-firebase-adminsdk-k8lul-c3d02b26d9.json')
            ->withDatabaseUri('https://integracja-2d7f6-default-rtdb.firebaseio.com');
        $auth = $firebase->createAuth();

        // $uid = 'HqIx7P3biBWKdahimOjPjo1QnSo1';
        // $user = $auth->getUser($uid);
        // $customToken = $auth->createCustomToken($uid);

        // $idTokenString = '...';

        try {
            $verifiedIdToken = $auth->verifyIdToken($token);
            echo 'sukces';
            return $next($request);
        } catch (FailedToVerifyToken $e) {
            echo 'fail';
            abort(403);
        }
    }
}
