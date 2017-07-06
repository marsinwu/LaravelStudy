<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = array(
            'pageTitle' => 'Posts',
            //'postData' => DB::select('select id, title from posts')
            'postData' => DB::table('posts')->select('id', 'title', 'author', 'created_at')->orderBy('id', 'desc')->get()
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
        $data = array(
            'pageTitle' => 'Add new post',
            'postData' => ''
        );

        if (isset($_POST['post'])) {
            $post = $_POST['post'];
            //$data['postData'] = DB::insert('insert into posts(title,body,author, created_at) values(?,?,?,?)', [$post['title'], $post['body'],$post['author'],date("Y-m-d H:i:s") ]);
            $data['postData'] = DB::table('posts')->insert([
                'title' => $post['title'],
                'body' => $post['body'],
                'author' => $post['author'],
                'created_at' => date("Y-m-d H:i:s")
            ]);

            return redirect('/posts')->with($data);

        } else {
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
        $data = array(
            'id' => $id,
            'pageTitle' => 'Post details',
            //'postData' => DB::select('select * from posts where id = ?',[$id])
            'postData' => DB::table('posts')->where('id', '=', $id)->get()
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
        DB::table('posts')->where('id', '=', $id)->delete();
        return redirect('/posts');
    }
}
