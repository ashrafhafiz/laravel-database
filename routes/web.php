<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
//    // Create a database if not exists.
//    try {
//        $dbc = new PDO('mysql:host=' . env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'));
//        $charset = config('database.connections.mysql.charset');
//        $collation = config('database.connections.mysql.collation');
//        $query = "CREATE DATABASE IF NOT EXISTS " . env('DB_DATABASE') . " CHARACTER SET $charset COLLATE $collation;";
//        $dbc->exec($query);
//    } catch (PDOException $e) {
//        echo $e->getMessage();
//    }

//    $user = DB::select('select * from users where id = ?', [1]);
//    dump($user);
//
//    $users = DB::connection('sqlite')->select('select * from users');
//    dump($users);

//    // Query DB in laravel
//    // 1. Using php pdo
//    $pdo = DB::connection(/*'sqlite'*/)->getPdo();
//    $users = $pdo->query('select * from users')->fetchAll();
//    dump($users);

//    // 2. Using raw sql statement with DB Facade.
//    $users = DB::select('select * from users');
//    $user = DB::select('select * from users where id = :id', ['id' => 1]);
//    dump($user);

//    DB::insert('insert into users (name, email, password) values (?, ?, ?)',['Inserted Name', 'email@example.com', 'password']);
//    DB::update('update users set email = "updated@example.com" where email = ?', ['email@example.com']);
//    DB::delete('delete from users where id = ?', [1]);
//    DB::statement('truncate table users');

//    // 3. Laravel Query Builder
//    $users = DB::table('users')->select()->get();
//    dump($users);

//    // 4. Eloquent Model
//    $users = \App\Models\User::all();
//    dump($users);

//    DB::transaction(function (){
//        try {
//            DB::table('users')->delete();
//            $result = DB::table('users')
//                ->where('id', '=', '4')
//                ->update(['email' => "none@example.com"]);
//            // The following is not necessary, but safer.
//            // It will be done automatically.
//            if (!$result) {
//                throw new \Exception;
//            }
//        } catch (\Exception $e) {
//            echo $e->getMessage();
//            // The following is not necessary, but safer.
//            // It will be done automatically.
//            DB::rollBack();
//        }
//    });


//    $users = DB::table('users')->get();
//    $emails = DB::table('users')->pluck('email');
//    $user1 = DB::table('users')->where('name', 'Marques Stoltenberg')->first();
//    $user2 = DB::table('users')->find(['id' => 1]);
//    $user2 = DB::table('users')->find(1);
//    $comments = DB::table('comments')->get();
//    dump($users, $comments, $emails, $user1, $user2);

//    // 1. Getting results from the database SELECT
//    $comments1 = DB::table('comments')->select('content as "Post Comment"')->get();
//    $comments2 = DB::table('comments')->select('user_id')->distinct()->get();
//    $comments3 = DB::table('comments')->count();
//    $comments3 = DB::table('comments')->max('user_id');
//    $comments3 = DB::table('comments')->min('user_id');
//    $comments3 = DB::table('comments')->avg('user_id');
//    $comments3 = DB::table('comments')->sum('user_id');
//    $comments3 = DB::table('comments')->select('user_id')->distinct()->sum('user_id');
//    $result = DB::table('comments')->where('content', 'content')->exists();
//    $result = DB::table('comments')->where('content', 'content')->doesntExist();
//
//    dump($comments1, $comments2, $comments3, $result);

//    // 2. WHERE sql clause – part 1
//    $results1 = DB::table('rooms')->get();
//    $results1 = DB::table('rooms')->where('price', '>', '400')->get();
//    $results1 = DB::table('rooms')->where([
//        ['price', '>', '400'],
//        ['room_size', '<', '3']
//    ])->get();
//    $results1 = DB::table('rooms')
//        ->where('price', '>', '400')
//        ->orWhere('room_size', '2')
//        ->get();
//    $results1 = DB::table('rooms')
//        ->where('price', '>', '400')
//        ->orWhere(function ($query){
//            $query
//                ->where('room_size', '>', '1')
//                ->where('room_size', '<', '4');
//        })
//        ->get();
//    // The following is equivalent to the previous
//    $results1 = DB::table('rooms')
//        ->where('price', '>', '400')
//        ->orWhere([
//            ['room_size', '>', '1'],
//            ['room_size', '<', '4'],
//        ])
//        ->get();

    // 3. WHERE sql clause – part 2
    $results1 = DB::table('rooms')
        ->whereBetween('room_size', [1,3])
        ->get();
    $results1 = DB::table('rooms')
        ->whereNotBetween('room_size', [1,3])
        ->get();
    $results1 = DB::table('rooms')
        ->whereIn('room_size', [1, 2, 3])
        ->get();
    $results1 = DB::table('rooms')
        ->whereNotIn('room_size', [1, 2, 3])
        ->get();

    // whereNull('column')
    // whereNotNull('column')
    // whereDate('created_at', '2020-05-13')
    // whereMonth('created_at', '5')
    // whereDay('created_at', '11')
    // whereYear('created_at', '2022')
    // whereTime('created_at', '=', '12:25:00')
    // whereColumn('column1', '>', 'column2')
    // whereColumn([
    //      ['column1', '=', 'column2'],
    //      ['column3', '>', 'column4'],
    //])

    $results1 = DB::table('users')
        ->whereExists(function ($query){
            $query->select('id')
                ->from('reservations')
                ->whereRaw('reservations.user_id = users.id')
                ->where('check_in', '>', '2022-03-20')
                ->limit(1);
        })
        ->get();

    dump($results1);

    return view('welcome');
});
