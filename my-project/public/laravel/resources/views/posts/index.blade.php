@extends('layouts.master')

@section('title')
ブログ記事一覧画面
@endsection

@section('content')
<h1>Blog_prac_laravel</h1>
{{ csrf_field() }}
<div>
  <h2><a href="post">ブログ記事一覧</a></h2>
  <ul>
    <li><a href="edit"><i class="glyphicon glyphicon-pencil"></i>ブログ新規作成</a></li>
  </ul>
</div>
<div>
  <ul>
    @forelse($posts as $post)
    <li><a href="post/{{ $post->id }}"><i class="glyphicon glyphicon-book"></i>{{ $post->title }}</a></li>
    <li><a href="post/{{ $post->id }}"><i class="glyphicon glyphicon-pencil"></i>{{ $post->body }}</a></li>
    <li><a href="upload/{{ $post->id }}"><i class="glyphicon glyphicon-file"></i>画像<br>
      @if($post->image)
        <img src="{!! asset('storage/images/' . $post->image) !!}" alt="アップロードされた画像" >
      @endif
    </a></li>
    <li><a href="edit/{{ $post->id }}"><i class="glyphicon glyphicon-edit"></i>ブログ編集</a></li>
    <li><a href="delete/{{ $post->id }}"><i class="glyphicon glyphicon-remove"></i>ブログ削除</a></li>
    <li>{{ $post->created_at }}</li>
    <br>
    @empty
    <li>No posts yet</li>
    @endforelse
  </ul>
</div>
<hr>
<div class="container">
  {{-- @foreach ($pagis as $pagi)
      {{ $pagi->title }}
  @endforeach --}}
</div>

{!! $pagis->render() !!}

<div class="container text-center">
  <a href="../public">ログアウト</a>
</div>
@endsection
