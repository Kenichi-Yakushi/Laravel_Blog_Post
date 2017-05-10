@extends('layouts.master')

@section('title')
ブログ新規作成画面
@endsection

@section('content')
<h1>ブログ新規作成画面</h1>
<form action="" method="post">
{{ csrf_field() }}
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
<div class="form-inline form-group">
  <div class="form-group">
    <label for="title" class="control-label">Blog_title_name</label>
    <input type="text" name="title" class="form-control" placeholder="ブログのタイトルを記入してください" />
  </div>
</div>
<div class="form-inline form-group">
  <div class="form-group">
    <label for="body" class="control-label">Blog_excerpt_create</label>
    <textarea class="form-control" name="body" cols="40" rows="4" maxlength="160" placeholder="ブログの記事を記入してください"></textarea>
  </div>
</div>
<div class="form-group">
  <input type="submit" value="submit" class="btn btn-primary">
</div>

<div class="container text-center">
  <a href="post">Blog_prac_laravel記事一覧へ</a>
</div>
</form>
@endsection
