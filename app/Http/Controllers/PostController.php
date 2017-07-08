<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*Importing Post model*/
use App\Post;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Displays a list of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Getting all the posts from the database */
        $posts = Post::all();
        $deletedPosts = Post::onlyTrashed()->get();
        /* Array that is going to be passed to the view */
        $data = array(
            'pageTitle' => 'Posts',
            'postData' => $posts,
            'trashedData' => $deletedPosts
            //'postData' => DB::select('select id, title from posts')
            //'postData' => DB::table('posts')->select('id', 'title', 'author', 'created_at')->orderBy('id', 'desc')->get()
        );

        return view('posts/show_post_list')->with($data);
    }

    /**
     * This is responsible for creating new posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Array that is going to be passed to the view */
        $data = array('pageTitle' => 'New post');
        return view('posts/add_post')->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Array that is going to be passed to the view */
        $data = array(
            'pageTitle' => 'Add new post',
            'postData' => ''
        );

        /*Checking if there is post*/
        if (isset($_POST['post']) && $_POST != null) {

            /*$post = $_POST['post'];
            //$data['postData'] = DB::insert('insert into posts(title,body,author, created_at) values(?,?,?,?)', [$post['title'], $post['body'],$post['author'],date("Y-m-d H:i:s") ]);
            $data['postData'] = DB::table('posts')->insert([
                'title' => $post['title'],
                'body' => $post['body'],
                'author' => $post['author'],
                'img' => $post['img'],
                'created_at' => date("Y-m-d H:i:s")
            ]);*/

            /*Creating new entry to the database vie Post model */
            $postInput = $_POST['post'];
            $post = new Post;
            $post->title = $postInput['title'];
            $post->body = $postInput['body'];
            $post->author = $postInput['author'];
            $post->img = $postInput['img'];
            $post->created_at = date("Y-m-d H:i:s");
            /* Post has to be committed(saved) to the databse */
            $post->save();

            return redirect('/posts')->with($data);

        } else {
            /*If for some reason there is problem with the $_POST data user is redirected here */
            return redirect('/posts/new')->with($data);
        }

        //DB::insert('insert into posts(title,body,author) values(?,?,?)', ['PHP Laravel', 'Laravel is cool','Pimpek Max']);
        //DB::insert('insert into posts(title,body,author) values(?,?,?)', ['Laravel vs Symfony', 'Is laravel better?','Pimpek Max']);
        //DB::insert('insert into posts(title,body,author, created_at) values(?,?,?,?)', ['Laravel vs NodeJs', 'Can nodeJs work better?','Pimpek Max',date("Y-m-d H:i:s") ]);

    }

    /**
     * Show particular post given particular id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*Array with the data that will be passed to the view */
        $data = array(
            'id' => $id,
            'pageTitle' => 'Post details',
            //'posts'=>Post::where('id',$id)->take(1)->get()
            'post' => Post::find($id)
            //'postData' => DB::select('select * from posts where id = ?',[$id])
            //'postData' => DB::table('posts')->where('id', '=', $id)->get()
        );
        //$postData = DB::select('select * from posts where id = ?',[$id]);

        return view('posts/show_post')->with($data);
    }

    /**
     * Edit particular post with given id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'Here we edit post number ' . $id;
    }

    /**
     * Update particular post with given id
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*Array with the data that will be passed to the view */
        $data = array(
            'id' => $id,
            'pageTitle' => 'Post details',
            'postData' => DB::table('posts')->where('id', '=', $id)->get()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Destroying entry from database */
//        DB::table('posts')->where('id', '=', $id)->delete();
        //$post = Post::find($id);
        Post::destroy($id);
        return redirect('/posts');
    }

    /**
     * Soft deletion of the post
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function softdestroy($id)
    {
        Post::find($id)->delete();
        return redirect('/posts');
    }

    public function destroySandbox($id)
    {

        Post::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect('/posts');
    }


    /** Method that restores item from the sandbox to the normal list
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeFromTrashAndAddToTheGeneralList($id)
    {

        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect('/posts');
    }
}
