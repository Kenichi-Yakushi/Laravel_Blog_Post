@extends('layouts.master')

@section('title')
ブログ画像アップロード画面
@endsection

@section('content')
<h1>ブログ画像アップロード画面</h1>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Media Upload</div>
        <div class="panel-body">
          {!! Form::open(['url' => ['upload',$post->id], 'method' => 'post', 'files' => true]) !!}

          {{-- エラーメッセージ --}}
          @if ($errors->any())
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
                {!! Form::label('file', 'Blog_image_upload', ['class' => 'control-label']) !!}
                {!! Form::file('file',null) !!}
              <!-- <label for="image" class="control-label">Blog_image_upload</label>
              <input type="hidden" name="MAX_FILE_SIZE" value="">
              <input type="file" name="image"> -->
            </div>
          </div>
          <div class="form-group">
            {!! Form::submit('upload', ['class' => 'btn btn-default']) !!}
          </div>
          <p>※現在アップロードはまだ最新の１件までしか反映されません</p>

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
        @if($post->image)
          <img src="{!! asset('storage/images/' . $post->image) !!}" alt="アップロードされた画像" >
        @endif
        </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <a href="../post">Blog_prac_laravel記事一覧へ</a>

  </div>
</div>
@endsection
