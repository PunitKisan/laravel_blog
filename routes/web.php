<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    $posts = Post::all();
    return view('posts', ['posts' => $posts]);
//    $posts = Post::all();
//    return view('posts',[
//        'posts' => $posts
//    ]);
});

Route::get('post/{post}', function ($slug) {

  $post = Post::find($slug);
//    $str = __DIR__ . "/../resources/posts/{$slug}.html";
//    if (!file_exists($str)) {
////       abort(404);
//        return redirect('/');
//    }
//
//    // Use of cache
//    $post = cache()->remember("post{$slug}", now()->addMinutes(20), function () use ($str) {
//        return file_get_contents($str);
//    });
//
//    // $post = file_get_contents($str);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');
// Also there are helper function called ->whereAlpha('post'); and more

