<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
 
class FirebaseController extends Controller
{
    public function index()
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/integracja-2d7f6-firebase-adminsdk-k8lul-c3d02b26d9.json')
            ->withDatabaseUri('https://integracja-2d7f6-default-rtdb.firebaseio.com');
 
        $database = $firebase->createDatabase();
 
        $blog = $database
        ->getReference('test');
 
        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>';
    }
}