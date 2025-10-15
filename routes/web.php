<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index']);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');


#for the loadbalancer i put the health check route here : 
Route::get('/healthz', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/server', function () {
    return 'Hello from ' . gethostname();
});

Route::get('/articles', function () {
    return DB::table('articles')->get();
});

Route::get('/add-article', function () {
    DB::table('articles')->insert([
        'title' => 'Test Article from ' . gethostname(),
        'content' => 'This is a sample content.',
    ]);
    return 'Article added!';
});

