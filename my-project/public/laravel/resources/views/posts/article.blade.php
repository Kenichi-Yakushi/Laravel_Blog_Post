@extends('layouts.master')

@section('title')
ブログ記事画面
@endsection

@section('content')
<header>
  <h1><a href="../post">Blog_prac_laravel記事一覧へ</a></h1>
</header>
<div class="article">
  <ul>
    <li><i class="glyphicon glyphicon-book"></i>{{ $post->title }}</li>
    <li><i class="glyphicon glyphicon-pencil"></i>{{ $post->body }}</li>
    <li><i class="glyphicon glyphicon-file"></i>画像<br>
      @if($post->image)
      <img src="{!! asset('storage/images/' . $post->image) !!}" alt="アップロードされた画像" >
      @endif
    </li>
  </ul>
</div>
@endsection
