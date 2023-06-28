<?php

namespace App\Models;
use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    /**
     * @throws Exception
     */
    public static function find($slug) {
//    $str = resource_path("posts/{$slug}.html");
//    if (!file_exists($str)) {
//        throw new ModelNotFoundException();
//    }
//
//    // Use of cache
//    return cache()->remember("post{$slug}", now()->addMinutes(20), function () use ($str) {
//        return file_get_contents($str);
//    });
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);

    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function() {
            $files = File::files( resource_path( "posts/" ) );
            return collect( $files )
                ->map( function ( $file ) {
                    return YamlFrontMatter::parseFile( $file );
                } )
                ->map( function ( $document ) {
                    return new Post( $document->title, $document->excerpt, $document->date, $document->body(), $document->slug );
                } )
                ->sortByDesc( 'date' );
        });
//        return array_map(function ($file) {
//            return $file->getContents();
//        }, $files);
    }
}
