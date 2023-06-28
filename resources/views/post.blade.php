{{--@extends('components.layout')--}}

{{--@section('content')--}}
<x-layout>
    <x-slot name="content" >
    {{--<article>--}}
    {{--    <h1>--}}
    {{--        <a href="/post">My First Posts</a>--}}
    {{--    </h1>--}}
    {{--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi est natus necessitatibus neque quaerat--}}
    {{--        reprehenderit ullam voluptatibus? Architecto assumenda consectetur cumque explicabo fuga in laborum libero non--}}
    {{--        officiis, sit. Qui?</p>--}}
    <?php //echo $post; ?>
    {{--</article>--}}

    <article>
        <!----><? //= $post; ?><!---->
        <h1>
            {{--        <a href="/post/<?= $post->slug ;?>">--}}
            <?= $post->title; ?>
            {{--        </a>--}}
        </h1>
        <div>
            {{-- <?=  $post->body; ?> --}}
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Go Back</a>
    </x-slot>
</x-layout>
{{--@endsection--}}
