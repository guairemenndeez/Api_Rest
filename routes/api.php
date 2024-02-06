<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('registrar', function () {

    $credenciales = [
        'email' => "admin@email.com",
        'password' => "password"
    ];

    if (!Auth::attempt($credenciales)) {
        $user = new User();
        $user->name = "Admin";
        $user->email = $credenciales['email'];
        $user->password = Hash::make($credenciales['password']);
        $user->save();
    }

    if (Auth::attempt($credenciales)) {
        $user = Auth::user();
        $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
        $updateToken = $user->createToken('update-token', ['update']);
        $basicToken = $user->createToken('basic-token', []);

        return [
            'Administrador' => $adminToken->plainTextToken,
            'Actualizador' => $updateToken->plainTextToken,
            'Visor' => $basicToken->plainTextToken
        ];
    }

});


Route::post('registrar', [AuthController::class, 'registrar']);
 Route::get('usuarios', [AuthController::class, 'usuarios']);


Route::group(['prefix' => 'guaireml', 'middleware' => 'auth:sanctum'], function(){
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categorias', CategoriaController::class);
});
