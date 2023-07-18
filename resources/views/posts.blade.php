{{--@extends('components.layout')--}}

{{--@section('content')--}}
<x-layout>

    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if( $posts->count() )
            <x-posts-grid :posts="$posts" />
        @else
            <p>Not posts yet. Please Check Back Later</p>
        @endif
        {{--        <div class="lg:grid lg:grid-cols-3">--}}
        {{--            <x-post-card/>--}}
        {{--            <x-post-card/>--}}
        {{--            <x-post-card/>--}}
        {{--        <div>--}}

    </main>

    {{--    <x-slot name="content">--}}
    {{--        @foreach ($posts as $post)--}}
    {{--            <article>--}}
    {{--                <!----><? //= $post; ?><!---->--}}
    {{--                <h1>--}}
    {{--                    <a href="/posts/{{ $post->slug }}">--}}
    {{--                        {{ $post->title }}--}}
    {{--                    </a>--}}
    {{--                </h1>--}}
    {{--                <p>--}}
    {{--                    By <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>--}}
    {{--                </p>--}}
    {{--                <div>--}}
    {{--                    {{ $post->excerpt }}--}}
    {{--                </div>--}}
    {{--            </article>--}}
    {{--        @endforeach--}}
    {{--    </x-slot>--}}
</x-layout>
{{--@endsection--}}
