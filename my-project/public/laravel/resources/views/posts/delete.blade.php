<?php
// データを送信するための処理
/**
  1.Formタグを作成（Postリクエストで実装する）
  2,Formタグ内に送信したいデータを設定する
*/
 ?>
@extends('layouts.master')

@section('title')
ブログ記事削除画面
@endsection

@section('content')
<h1>ブログ記事削除画面</h1>
<div>
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

<form id="form_{{ $post->id }}" method="post" style="display:inline">
{{ csrf_field() }}
{{ method_field('DELETE') }}

<div class="form-group">
  <input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger" type="submit">delete</button>
</div>
<div class="container text-center">
  <a href="../post">Blog_prac_laravel記事一覧へ</a>

</div>
</form>
@endsection
