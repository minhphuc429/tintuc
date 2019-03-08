@extends('layouts.master')

@section('content')
    @foreach($posts as $post)
        <div class="single-latest-post row align-items-center">
            <div class="col-lg-5 post-left">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="{{ Storage::url($post->thumbnail) }}" alt="">
                </div>
                <ul class="tags">
                    <li><a href="#">Lifestyle</a></li>
                </ul>
            </div>
            <div class="col-lg-7 post-right">
                <a href="{{ route('singlePost', $post->id) }}">
                    <h4>{{ $post->title }}</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                </ul>
                <p class="excert">
                    {{ $post->description }}
                </p>
            </div>
        </div>
    @endforeach
    {{ $posts->appends(Request::only('query'))->links() }}
@endsection
