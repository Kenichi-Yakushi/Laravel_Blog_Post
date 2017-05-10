<?php
// データを送信するための処理
/**
  1.Formタグを作成（Postリクエストで実装する）
  2,Formタグ内に送信したいデータを設定する
*/
 ?>
@extends('layouts.master')

@section('title')
ブログ記事編集画面
@endsection

@section('content')
<h1>ブログ記事編集画面</h1>
<!-- バリデーションエラーメッセージ -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

<form method="post">
{{ csrf_field() }}
<div class="form-inline form-group">
  <div class="form-group">
    <label for="name" class="control-label">Blog_title_name</label>
    <input type="text" name="title" class="form-control" placeholder="ブログのタイトルを記入してください" />
  </div>
</div>
<div class="form-inline form-group">
  <div class="form-group">
    <label for="name" class="control-label">Blog_excerpt_edit</label>
    <textarea class="form-control" name="body" cols="40" rows="4" maxlength="160" placeholder="ブログの記事を記入してください"></textarea>
  </div>
</div>
<p>※画像の削除は、トップページのブログ削除機能から行ってください。</p>
<div class="form-group">
  <input type="submit" value="submit" class="btn btn-primary">
</div>
<div class="container text-center">
  <a href="../post">Blog_prac_laravel記事一覧へ</a>

</div>
</form>
@endsection
