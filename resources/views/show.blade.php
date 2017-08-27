@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="page-header">{{$post->title}}</h2>
                <p>{{$post->content}}</p>
                <hr>
                <p>{{$post->category->category_name}}</p>
                <h3>Yorumlar</h3>
                @foreach($post->comments as $comment)
                    <h4>{{$comment->username}}</h4>
                    <p>{{$comment->comment}} <small>{{$comment->created_at->diffForHumans()}}</small></p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
