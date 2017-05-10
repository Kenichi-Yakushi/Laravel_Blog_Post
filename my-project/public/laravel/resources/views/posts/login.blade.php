@extends('layouts.master')

@section('title')
ユーザーログイン画面
@endsection

@section('content')
<h1>ユーザーログイン画面</h1>
<form method="post">
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
    <label for="name" class="control-label">Username</label>
    <input type="text" class="form-control" />
  </div>
</div>
<div class="form-inline form-group">
  <div class="form-group">
    <label for="password" class="control-label">Password</label>
    <input type="password" class="form-control" />
  </div>
</div>
<div class="form-group">
  <input type="submit" value="submit" class="btn btn-primary">
</div>
</form>
@endsection
