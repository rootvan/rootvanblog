@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">
            @foreach($posts as $post)
                <h2><a href="posts/{{$post->id}}">{{$post->title}}</a> <small>{{$post->created_at->diffForHumans()}}</small></h2>
                @endforeach
        </div>
    </div>
</div>
@endsection
