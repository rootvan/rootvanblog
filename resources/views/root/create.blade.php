@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="page-header">Yeni Yazı Ekle</h2>

                {{-- Hata Durumu --}}

                @if(count($errors))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif

                <form action="/posts/create" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="post_title">Yazı Başlığı</label>
                        <input type="text" name="title" id="post_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Yazı İçeriği</label>
                        <textarea name="content" id="post_content" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="post_cover">Kapak Görseli</label>
                        <input type="text" name="cover" id="post_cover" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="post_category"></label>
                        <select name="category_id" id="post_category" class="form-control">
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Kaydet">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection