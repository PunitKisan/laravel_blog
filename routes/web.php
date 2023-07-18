<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Model;

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

Route::get( '/', function () {
//
//   $doc =  YamlFrontMatter::parseFile(
//        resource_path('posts/my-third-post.html')
//    );

//    $files = File::files(resource_path("posts/"));
//    $posts = [];


//    collect posts through array map
//    $posts = array_map(function($file) {
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post($document->title,$document->excerpt,$document->date,$document->body(),$document->slug);
//    }, $files);

//    foreach ($files as $file) {
//        $document = YamlFrontMatter::parseFile($file);
//        $posts[] = new Post($document->title,$document->excerpt,$document->date,$document->body(),$document->slug);
//    }
    $posts = Post::latest()->with('category', 'author')->get();
    return view( 'posts', [ 'posts' => $posts ] );
//    $posts = Post::all();
//    return view('posts',[
//        'posts' => $posts
//    ]);
} );

Route::get( 'posts/{post:slug}', function ( Post $post ) {

    return view( 'post', [
//        'post' => Post::findOrFail($id)
          'post' => $post
    ] );
} );
//    ->whereAlphaNumeric( 'post', );
// Also there are helper function called ->whereAlpha('post'); and more

Route::get('categories/{category:slug}', function(Category $category) {
    $posts = $category->posts->load(['category', 'author']); //Egar loading by using load
    return view( 'posts', [ 'posts' => $posts ] );
});

Route::get('author/{author:username}', function(User $author) {
    $posts = $author->posts->load(['category', 'author']); //Egar loading by using load
    return view( 'posts', [ 'posts' => $posts ] );
});
