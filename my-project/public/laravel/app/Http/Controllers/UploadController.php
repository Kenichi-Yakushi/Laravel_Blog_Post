<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Users;
use App\Posts;
use App\Http\Requests\PostRequest;
use Storage;

class UploadController extends Controller
{
    public function create($id){
      $post = Posts::findOrFail($id);

      return view('posts.upload')->with([
        'post' => $post,
      ]);

    }

    public function store($id,PostRequest $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 最小縦横30px 最大縦横1024px
                'dimensions:min_width=30,min_height=30,max_width=1024,max_height=1024',
            ]
        ]);
        if ($request->file('file')->isValid([])) {
            $post = Posts::findOrFail($id);
            $filename = $request->file('file')->store('images','public'); //アップロードしたファイル名を取得
            $post->image = basename($filename);
            $post->save();

            return redirect('/post?status=upload_complete')->with([
              'post' => $post,
            ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}
