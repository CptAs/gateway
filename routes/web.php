<?php

use App\Services;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FirebaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('get-firebase-data', [FirebaseController::class, 'auth'])->name('firebase.index');

    Route::get('/', function () {
        return view('gate');
    })->name('home');

    Route::get('/getLandmark/{lat}/{lng}', function (Request $request) {
        return redirect()->away(Services::MARKING_LANDMARKS_URL . '/landmark/' . $request->lat . '/' . $request->lng);
    });
    Route::get('/getAllLandmarks', function () {
        return redirect()->away(Services::MARKING_LANDMARKS_URL . '/getAllLandmarks');
    });
    Route::get('/getCommentsForLandmark/{landmarkId}', function (Request $request) {
        return redirect()->away(Services::MARKING_LANDMARKS_URL . '/getCommentsForLandmark/' . $request->landmarkId);
    });
    Route::post('/updateProperty', function (Request $request) {
        return Http::post(Services::MARKING_LANDMARKS_URL . '/landmark/updateProperty', [
            'property' => $request->property,
            'value' => $request->value,
            'idLandmark' => $request->idLandmark,
        ]);
    });
    Route::post('/addComment', function (Request $request) {
        return Http::post(Services::MARKING_LANDMARKS_URL . '/landmark/addComment', [
            'content' => $request->content,
            'landmarkId' => $request->landmarkId,
        ]);
    });

    Route::get('/getAllTours', function () {
        return redirect()->away(Services::TOURS_PLANNING_URL . '/getAllTours');
    });
    Route::post('/storeTour', function (Request $request) {
        return Http::post(Services::TOURS_PLANNING_URL . '/storeTour', [
            'landmarksList' => $request->landmarksList,
        ]);
    });

    Route::get('/getReservationsForUser/{user}', function () {
        return redirect()->away(Services::GUIDED_TOURS_URL . '/getReservationsForUser');
    });
    Route::post('/makeReservation', function (Request $request) {
        return Http::post(Services::GUIDED_TOURS_URL . '/makeReservation', [
            'idUser' => $request->userId,
            'idTour' => $request->tourId,
            'date' => $request->tour_datetime
        ]);
    });
// Route::post('/landmark/updateProperty', [LandmarkUserController::class, 'updateProperty']);
// Route::post('/landmark/addComment', [CommentController::class, 'addComment']);

// Route::post('/makeReservation', [ReservationController::class, 'makeReservation']);