@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="page-header">{{$post->title}}</h2>
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>
@endsection
