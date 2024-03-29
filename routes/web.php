<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\postController;
use App\Http\Controllers\loginController;
use App\Http\Middleware\operationsMiddleware;
use App\Http\Middleware\sessionVerifyInMiddleware;
use App\Http\Middleware\sessionVerifyMiddleware;
use App\Http\Middleware\sessionVerifyAdminMiddleware;
use App\Http\Middleware\transfersMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Unprotected routes
Route::post('/login', [loginController::class, 'post']);
Route::get('/logout', [loginController::class, 'logout']); 
Route::post('/signup', [loginController::class, 'register']);
Route::get('/signup', [loginController::class, 'auth']); 

// Custom login redirect route
Route::middleware([sessionVerifyInMiddleware::class])->group(function () {   
    Route::get('/login', [loginController::class, 'get']);
});


// Normal protected routes
Route::middleware([sessionVerifyMiddleware::class])->group(function () {
    Route::get('/',  [postController::class, 'get'] );
    Route::get('/transfers',  [postController::class, 'getTransfers'] );
});

// Admin protected routes
Route::middleware([sessionVerifyAdminMiddleware::class])->group(function () {

    Route::get('/admin', [adminController::class, 'admin']);

    Route::get('/admin/addpost', [adminController::class, 'get'])->middleware(operationsMiddleware::class);
    Route::get('/admin/addpostTransfers', [adminController::class, 'getTransfers'])->middleware(transfersMiddleware::class);
    
    Route::post('/admin/addpost', [adminController::class, 'post'])->middleware(operationsMiddleware::class);
    Route::post('/admin/addpostTransfers', [adminController::class, 'postTransfers'])->middleware(transfersMiddleware::class);

    Route::get('/admin/addusers', [adminController::class, 'addusers'])->middleware(operationsMiddleware::class);
    Route::post('/admin/addusers', [adminController::class, 'adduserspost'])->middleware(operationsMiddleware::class);


    Route::get('/admin/listpost', [adminController::class, 'list'])->middleware(operationsMiddleware::class);
    Route::get('/admin/listpostTransfers', [adminController::class, 'listTransfers'])->middleware(transfersMiddleware::class);
    Route::get('/admin/listusers', [adminController::class, 'listusers'])->middleware(operationsMiddleware::class);

    Route::get('/admin/seepost/{id}', [adminController::class, 'see'])->middleware(operationsMiddleware::class);
    Route::get('/admin/seepostTransfers/{id}', [adminController::class, 'seeTransfers'])->middleware(transfersMiddleware::class);
    Route::get('/admin/seeusers/{id}', [adminController::class, 'seeusers'])->middleware(operationsMiddleware::class);

    Route::get('/admin/statuspost/{id}/{status}', [adminController::class, 'status']);
    Route::get('/admin/statususers/{id}/{status}', [adminController::class, 'statususers'])->middleware(operationsMiddleware::class);

    Route::get('/admin/isspecialpost/{id}/{isspecial}', [adminController::class, 'isspecial'])->middleware(operationsMiddleware::class);

    Route::get('/admin/deletepost/{id}', [adminController::class, 'delete']);  
    Route::get('/admin/deleteusers/{id}', [adminController::class, 'deleteusers'])->middleware(operationsMiddleware::class);  

    // Route::get('/admin/recoverypassword/{id}', [adminController::class, 'recoverypassword']);  


});




Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {

    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

})->middleware('guest')->name('password.email');




Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        '_token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect('/login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');