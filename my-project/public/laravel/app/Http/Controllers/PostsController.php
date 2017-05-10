<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Users;
use App\Posts;
use App\Http\Requests\PostRequest;
use Storage;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;

class PostsController extends Controller
{
  //$status = $_GET["status"];
  public function login(){//PostRequest $request){
    //$posts = Posts::all();
      // if($request->isMethod("post")){
      //
      //   $this->validate($request,[
      //     'name' => 'required',
      //     'password' => 'required',
      //   ]);
      //
      //   $post = new Users();
      //   $post->name = $request->name;
      //   $post->password = $request->password;
      //   $post->save();
      //
      //   return view('posts.index')->with('post',$post);
      // }
    //$posts = Posts::latest('created_at')->get();
    //dd($posts->toArray());  //dump die
    //return view('posts.login');
    // return view('posts.index', ['posts' => $posts]);
    return view('posts.login');//->with('post', $post);
  }

  public function index(){
    //$posts = Posts::all();
    //$postid = Posts::find($id);
    $status = isset($_GET['status']) ? $_GET['status'] : '' ;

    if ($status == 'delete_complete') {
      echo "削除が完了しました";
    }

    if ($status == 'upload_complete') {
      echo "アップロードが完了しました";
    }

    // if ($status == 'upload_complete') {
    //   echo "アップロードが完了しました";
    // }

    $post = Posts::latest('created_at')->get();
    $posts = Posts::latest('created_at')->paginate();
    $pagis = Posts::paginate();
    // $user = User::find(auth()->id());
    //$posts = [];
    //dd($posts->toArray());  //dump die
    return view('posts.index')->with([
      'post' => $post,
      'posts' => $posts,
      'status' => $status,
      'pagis' => $pagis,
      // 'user' => $user,
    ]);
    // return view('posts.index', ['posts' => $posts]);
    // return view('posts.index')->with('posts', $posts);
  }

  public function article($id){
    //$posts = Posts::all();
    $post = Posts::findOrFail($id);
    //$pagis = Posts::paginate();
    //$posts = Posts::latest('created_at')->get();
    //dd($posts->toArray());  //dump die
    return view('posts.article')->with([
      'post' => $post,
      //'pagis' => $pagis,
    ]);
    // return view('posts.index', ['posts' => $posts]);
    // return view('posts.index')->with('posts', $posts);
  }

  public function create(PostRequest $request){
    //$posts = Posts::all();
    if($request->isMethod("post")){
      echo "データがポストされました";

      $this->validate($request, [
        'title' => 'bail|required|unique:posts|max:255',
        'body' => 'required',
      ]);

      $post = new Posts();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
    }

    //$posts = Posts::latest('created_at')->get();
    //dd($posts->toArray());  //dump die
    return view('posts.create');
    // return view('posts.index', ['posts' => $posts]);
    // return view('posts.index')->with('posts', $posts);
  }

  public function edit($id,PostRequest $request){
    //$posts = Posts::all();
    $post = Posts::findOrFail($id);
    if($request->isMethod("post")){
      echo "データがポストされました";

      $this->validate($request, [
        'title' => 'bail|required|unique:posts|max:255',
        'body' => 'required',
      ]);

      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
    }
    //$posts = Posts::latest('created_at')->get();
    //dd($posts->toArray());  //dump die
    return view('posts.edit')->with('post',$post);
    // return view('posts.index', ['posts' => $posts]);
    // return view('posts.index')->with('posts', $posts);
  }

  /**
     * 新しいブログポストの保存
     *
     * @param  Request  $request
     * @return Response
     */
  // public function store(PostRequest $request){
  //     // ブログポストのバリデーションと保存コード…
  //     $this->validate($request, [
  //     'title' => 'required|unique:posts|max:255',
  //     'body' => 'required',
  //     ]);
  //
  //     $post = new Posts();
  //     $post->title = $request->title;
  //     $post->body = $request->body;
  //     $post->save();
  //
  //     // /**
  //     //  * 新ポストの保存
  //     //  *
  //     //  * @param  Request  $request
  //     //  * @return Response
  //     //  */
  //     //   $validator = Validator::make($request->all(), [
  //     //       'title' => 'required|unique:posts|max:255',
  //     //       'body' => 'required',
  //     //   ]);
  //     //
  //     //   if ($validator->fails()) {
  //     //       return redirect('post/create')
  //     //                   ->withErrors($validator)
  //     //                   ->withInput();
  //     //   }
  //     //
  //     //   // ブログポストの保存処理…
  //     return view('posts.store')->with('post',$post);
  // }

  public function delete($id){
    $post = Posts::findOrFail($id);
    //return view('posts.delete');
    return view('posts.delete')->with('post',$post);
  }

  public function destroy($id){
    Posts::findOrFail($id)->delete();
    //echo "データが削除されました";
    return redirect('/post?status=delete_complete');

  }
}
