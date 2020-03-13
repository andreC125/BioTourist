<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Auth;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use DB;

    class PostController extends Controller {
      public function index(){
        $user_id = Auth::user()->id;
        $posts = DB::table('ads')->where('user_id' ,'=', $user_id)->get();
        return view('posts',compact('posts'));
      }


        public function view($id){
            $post = Post::where('id', $id)->firstOrFail();
            return view('post', compact('post'));
        }

        public function create(){
            $post = new Post();
            return view('post-edit', compact('post'));
        }

        public function insert(Request $request){
            if (Auth::check()){
                $post = new Post();
                $inputs = $request->input();
                $inputs['user_id'] = Auth::user()->id;
                $post = Post::create($inputs);
            }
            //$post = Post::create($request->input());
            return redirect()->back();
        }

        public function edit($id){
            $post = Post::where('id', $id)->firstOrFail();
            return view('post-edit', compact('post'));
        }

        public function update($id, Request $request){
            $post = Post::where('id', $id)->firstOrFail();
            $post->update($request->input());
            //$post->update($request->intersect(['title', 'texte']));
            return redirect()->back();
        }

        public function delete($id){
            Post::destroy($id);
            return redirect()->action('PostController@index');
        }
}
