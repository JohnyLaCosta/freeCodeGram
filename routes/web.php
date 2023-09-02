<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    // return view('welcome');

    /* Buscar todos os users através de um Query Builder */
    /* $users = DB::table('users')->get();
    dd($users); */

    /*SELECT*/
    /* $users = DB::select('select * from users');
    dd($users); - Buscar todos os users.*/

    /*INSERT*/
    /* $user = DB::insert('insert into users (name, password, email) values (?,?,?)', [
    'Costa',
    'costinha',
    'costinha98@gmail.com',
    ]);
    dd($user); */

    /*UPDATE*/
    /* $user = DB::update("update users set email=? where id=?",['newcosta@gmail.com',2]);
    dd($user); */

    /*DELETE*/
    /* $user = DB::delete("delete from users where id = 2");
    dd($user); */


    /* USANDO QUERY BUILDER */
    /* Buscar o user com ID = 1, através de um Query Builder */
    /* $users = DB::table('users')->where('id', 1)->get();
    dd($users); */

    /* Insert na DB, através de um Query Builder */
    /* $user = DB::table('users')->insert([
        'name' => 'Laura',
        'email' => 'laura@gmail.com',
        'password' => 'password'
    ]); */

    /* Update na DB, através de um Query Builder */
    /* $user=DB::table('users')->where('id',3)->update(['email'=>'newlaura@gmail.com']); */

    /* Delete na DB, através de um Query Builder */
    /* $user=DB::table('users')->where('id',3)->delete(); */

    
    /* FUNÇÕES ÚTEIS PARA AJUDAR A FILTRAR CONTEÚDO NAS QUERYS */
    /* Função First */
    /* $users = DB::table('users')->first();
    dd($users); */

    /* Função Find (serve para encontrar um elemento por id na DB de forma facilitada) */
    /* $users = DB::table('users')->find(1);
    dd($users); */
    /* PS: Existe outras funções interessantes como a chunk, pluck, etc... ver a documentação: https://laravel.com/docs/10.x/collections*/
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
