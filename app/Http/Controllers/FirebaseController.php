<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseController extends Controller
{
    public function index()
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/integracja-2d7f6-firebase-adminsdk-k8lul-c3d02b26d9.json')
            ->withDatabaseUri('https://integracja-2d7f6-default-rtdb.firebaseio.com');

        $database = $firebase->createDatabase();

        $blog = $database
            ->getReference('test');

        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>';
    }

    public function auth(Request $request)
    {
        echo 'WSIO DZIAŁA';
        // $token = $request->bearerToken();

        // $firebase = (new Factory)
        //     ->withServiceAccount(__DIR__ . '/integracja-2d7f6-firebase-adminsdk-k8lul-c3d02b26d9.json')
        //     ->withDatabaseUri('https://integracja-2d7f6-default-rtdb.firebaseio.com');
        // $auth = $firebase->createAuth();

        // $uid = 'HqIx7P3biBWKdahimOjPjo1QnSo1';
        // $user = $auth->getUser($uid);
        // $customToken = $auth->createCustomToken($uid);

        // $idTokenString = '...';

        // try {
        //     $verifiedIdToken = $auth->verifyIdToken($token);
        //     echo 'sukces';
        // } catch (FailedToVerifyToken $e) {
        //     echo 'The token is invalid: ' . $e->getMessage();
        // }

        // $uid = $verifiedIdToken->claims()->get('sub');

        // $user = $auth->getUser($uid);

        // const firebaseConfig = {
        //     apiKey: "AIzaSyDt5YycKMz85si5Gti0t_kf0JfthZ7gE4A",
        //     authDomain: "integracja-2d7f6.firebaseapp.com",
        //     databaseURL: "https://integracja-2d7f6-default-rtdb.firebaseio.com",
        //     projectId: "integracja-2d7f6",
        //     storageBucket: "integracja-2d7f6.appspot.com",
        //     messagingSenderId: "1016225162113",
        //     appId: "1:1016225162113:web:df9f92d9a8776ce961fe80",
        //     measurementId: "G-5H3FF5D799"
        //   };
    }
}
