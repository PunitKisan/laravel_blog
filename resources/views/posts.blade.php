{{--@extends('components.layout')--}}

{{--@section('content')--}}
<x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <!----><? //= $post; ?><!---->
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>
                <p>
                    <a href="#">{{ $post->category->name }}</a>
                </p>
                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
    </x-slot>
</x-layout>
{{--@endsection--}}
